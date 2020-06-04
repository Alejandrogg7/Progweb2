<?php

$id_registro_seleccionado = $_GET['id_para_borrar'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "listatareas_bd";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
    echo "Conección establecida con la base de datos...";
}

$sql = "DELETE FROM tareas WHERE id_pk={$id_registro_seleccionado}";
$respuesta = $conn->query($sql);

if($respuesta === TRUE) {
    echo "Registro eliminado correctamente";
} else {
    echo "el error es: " . $conn->error;
}

$conn->close();
header("Location: index.php");





?>