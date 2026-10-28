<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $genero = $_POST['genero'];

    $password_segura = password_hash($password_plano, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO usuarios (nombre, email, telefono, fecha_nacimiento, genero) 
                VALUES (:nombre, :email,  :telefono, :fecha_nacimiento, :genero)";

        $stmt = $conexion->prepare($sql);
        $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':telefono' => $telefono,
            ':fecha_nacimiento' => $fecha_nacimiento,
            ':genero' => $genero
        ]);

        echo "<h3>¡Registro de usuario exitoso!</h3>";
        echo "<br><a href='index.html'>Ir a la tienda</a>";

    } catch (PDOException $e) {
        echo "Error al registrar: " . $e->getMessage();
    }
}
?>