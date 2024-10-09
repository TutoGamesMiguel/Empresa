<?php
require('db.php');
header('Content-Type: application/json');

$conexion = Conectarse();
if (!$conexion) {
    echo json_encode(['success' => false, 'message' => 'Error al conectar a la base de datos']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $query = "SELECT * FROM productos";
    $result = $conexion->query($query);

    if (!$result) {
        echo json_encode(['success' => false, 'message' => 'Error en la consulta a la base de datos']);
        exit;
    }

    $productos = array();
    while ($row = $result->fetch_array()) {
        $producto = array(
            'id' => $row['IdProd'],
            'nombre' => $row['NomProd'],
            'precio' => $row['CostoProd'],
            'cantidad' => $row['CantProd']
        );
        array_push($productos, $producto);
    }

    echo json_encode($productos);
    $conexion->close();
}
?>