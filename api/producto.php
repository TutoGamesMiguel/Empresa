<?php
require_once('db.php');
$conexion = Conectarse();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    if(empty($nombre) || empty($precio) || empty($cantidad)){
        echo "Faltan datos";
        return;
    }

    $query = "INSERT INTO productos (NomProd, CostoProd, CantProd) VALUES ('$nombre', '$precio', '$cantidad')";

    if ($conexion->query($query) === TRUE) {
        echo "Producto registrado";
    } else {
        echo "Error: " . $query . "<br>" . $conexion->error;
    }
}
?>