<?php
    function getOrders($connection, $user_id)
    {
        $sql_orders = "SELECT id, id_usuari, data, total FROM comanda WHERE id_usuari = $1";
        $consulta_orders = pg_query_params($connection, $sql_orders, [$user_id]);

        if (!$consulta_orders) {
            die("Error en la consulta de órdenes: " . pg_last_error($connection));
        }

        $orders = pg_fetch_all($consulta_orders);

        foreach ($orders as &$order) {
            $order_id = $order['id'];
            $sql_products = "
                SELECT p.id, p.nom, p.img, p.preu, p.descripcio, cp.quantitat
                FROM comanda_producte cp
                JOIN producte p ON cp.id_producte = p.id
                WHERE cp.id_comanda = $1";
            $consulta_products = pg_query_params($connection, $sql_products, [$order_id]);

            if (!$consulta_products) {
                $order['products'] = [];
                error_log("Error en la consulta de productos para la orden $order_id: " . pg_last_error($connection));
            } else {
                $order['products'] = pg_fetch_all($consulta_products);
            }
        }

        pg_close($connection);

        return $orders;
    }

    function getLastOrder($connection, $user_id)
    {
        $sql_last_order = "SELECT id, id_usuari, data, total FROM comanda WHERE id_usuari = $1 ORDER BY data DESC LIMIT 1";
        $consulta_last_order = pg_query_params($connection, $sql_last_order, [$user_id]);

        if (!$consulta_last_order) {
            die("Error en la consulta de la última orden: " . pg_last_error($connection));
        }

        $last_order = pg_fetch_assoc($consulta_last_order);

        if ($last_order) {
            $order_id = $last_order['id'];
            $sql_products = "
                SELECT p.id, p.nom, p.img, p.preu, p.descripcio, cp.quantitat
                FROM comanda_producte cp
                JOIN producte p ON cp.id_producte = p.id
                WHERE cp.id_comanda = $1";
            $consulta_products = pg_query_params($connection, $sql_products, [$order_id]);

            if (!$consulta_products) {
                $last_order['products'] = [];
                error_log("Error en la consulta de productos para la última orden $order_id: " . pg_last_error($connection));
            } else {
                $last_order['products'] = pg_fetch_all($consulta_products);
            }
        }

        pg_close($connection);

        return $last_order;
    }