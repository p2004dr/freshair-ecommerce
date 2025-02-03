<?php
    function processPurchase($connection, $user_id, $product_ids) {
        if (empty($user_id) || empty($product_ids)) {
            error_log("Error: Usuari o productes no vàlids.");
            return false;
        }

        pg_query($connection, "BEGIN");

        try {
            $order_query = "INSERT INTO comanda (id_usuari, data, total) VALUES ($1, NOW(), $2) RETURNING id";
            $total = calculateTotal($connection, $product_ids);
            error_log("Total calculat: $total");

            $order_result = pg_prepare($connection, "insert_order", $order_query);
            if (!$order_result) {
                throw new Exception('Error al preparar la consulta per a la taula comanda.');
            }

            $order_result = pg_execute($connection, "insert_order", [$user_id, $total]);
            if (!$order_result) {
                throw new Exception('Error al executar la consulta per a la taula comanda.');
            }

            $order_id = pg_fetch_result($order_result, 0, 'id');
            error_log("Comanda creada amb ID: $order_id");

            $product_query = "INSERT INTO comanda_producte (id_comanda, id_producte, quantitat) VALUES ($1, $2, $3)";
            $product_stmt = pg_prepare($connection, "insert_order_item", $product_query);

            $quantities = array_count_values($product_ids);

            foreach ($quantities as $product_id => $quantity) {
                $product_result = pg_execute($connection, "insert_order_item", [$order_id, $product_id, $quantity]);
                if (!$product_result) {
                    throw new Exception("Error al afegir producte $product_id amb quantitat $quantity a la comanda.");
                }
            }

            pg_query($connection, "COMMIT");
            error_log("Compra completada correctament.");
            return true;

        } catch (Exception $e) {
            pg_query($connection, "ROLLBACK");
            error_log("Error durant la compra: " . $e->getMessage());
            return false;
        }
    }

    function calculateTotal($connection, $product_ids) {
        $quantities = array_count_values($product_ids);
        $total = 0.0;
    
        foreach ($quantities as $product_id => $quantity) {
            $query = "SELECT preu FROM producte WHERE id = $1";
            $result = pg_prepare($connection, "select_price_$product_id", $query);
            $result = pg_execute($connection, "select_price_$product_id", [$product_id]);
    
            if ($row = pg_fetch_assoc($result)) {
                $total += $row['preu'] * $quantity;
            } else {
                throw new Exception("Error al obtenir el preu del producte amb ID $product_id.");
            }
        }
    
        return $total;
    }