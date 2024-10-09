<?php
    $data = file_get_contents("php://input");
    require "db.php";
    $conexion = Conectarse();
    $data = json_decode($data);
    $id = $data->id;
    $query = "DELETE FROM productos WHERE IdProd = $id";
    if ($conexion->query($query) === TRUE) {
        echo "Producto eliminado";
    } else {
        echo "Error: " . $query . "<br>" . $conexion->error;
    }
?>