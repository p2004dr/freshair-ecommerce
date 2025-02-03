<?php
    function getProductsByCategory($connection, $category_id)
    {
        $sql_productos = "SELECT id, nom, img, preu, descripcio FROM Producte WHERE id_categoria = $1";
        $consulta_productos = pg_query_params($connection, $sql_productos, [$category_id]);
    
        if (!$consulta_productos) {
            die("Error en la consulta de categorías");
        }

        $result_products = pg_fetch_all($consulta_productos);
        pg_close($connection);

        return $result_products;
    }

    function getProductsByName($connection, $product_name)
    {
        if (empty($product_name))
        {
            return [];
        }

        $product_name = pg_escape_string($connection, $product_name);
    
        $sql = "SELECT id, nom, img, preu, descripcio FROM Producte WHERE nom ILIKE '%' || $1 || '%'";
    
        $consulta = pg_prepare($connection, "get_products_by_name", $sql);
        if (!$consulta) {
            die("Error al preparar la consulta");
        }
    
        $consulta_result = pg_execute($connection, "get_products_by_name", array($product_name));
        if (!$consulta_result) {
            die("Error al ejecutar la consulta");
        }
    
        $result_products = pg_fetch_all($consulta_result);
            pg_close($connection);
    
        return $result_products;
    }

    function getProduct($connection, $product_id)
    {
        $product_id = pg_escape_string($connection, $product_id);
    
        $sql_product = "SELECT id, nom, img, preu, descripcio FROM Producte WHERE id = '$product_id'";
        $consulta_product = pg_query($connection, $sql_product);
    
        if (!$consulta_product) {
            die("Error en la consulta del producto");
        }
    
        $result_product = pg_fetch_assoc($consulta_product);
        pg_close($connection);
    
        return $result_product;
    }
    
    