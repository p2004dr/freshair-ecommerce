<?php
    function getCategoryById($connection, $category_id) {

        if ($category_id === null) {
            die("No se ha passado la categoria por parametro");
        }
    
        $category_id = pg_escape_string($connection, $category_id);
    
        $sql_categoria = "SELECT id, nom, img, direccio FROM Categoria WHERE id = '$category_id'";
        $consulta_categoria = pg_query($connection, $sql_categoria);
    
        if (!$consulta_categoria) {
            die("Error en la consulta de categoría");
        }
    
        $result_categoria = pg_fetch_assoc($consulta_categoria);
        pg_close($connection);
    
        return $result_categoria;
    }