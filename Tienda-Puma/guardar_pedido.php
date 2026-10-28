<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto = $_POST['producto'];
    $talla = $_POST['talla'];
    $cantidad = $_POST['cantidad'];

    try {
        $sql = "INSERT INTO pedidos (producto, talla, cantidad) VALUES (:producto, :talla, :cantidad)";
        
        $stmt = $conexion->prepare($sql);
        $stmt->execute([
            ':producto' => $producto,
            ':talla' => $talla,
            ':cantidad' => $cantidad
        ]);

        echo "<h3>¡Pedido realizado con éxito! Gracias por tu compra en PUMA.</h3>";
        echo "<br><a href='index.html'>Volver a la tienda</a>";

    } catch (PDOException $e) {
        echo "Error al guardar el pedido: " . $e->getMessage();
    }
}
?>