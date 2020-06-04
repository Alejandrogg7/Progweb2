


<?php

$id = $_POST['input_id'];
$nombre = $_POST['nombreTa'];
$descrip = $_POST['descripTa'];
$fecha = $_POST['venciTa'];
$priorid = $_POST['prioridad'];
$respon = $_POST['responTa'];


//1. conexión entre nuestra app(php) y el servidor de bases de datos(mysql)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "listatareas_bd";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error)
{
    echo "mi conexión con la bd falló";
    die("la conexión falló " . $conn->connect_error);
}
else
{
    echo "conexión establecida entre php y mysql</br>";
}

//2. sentencia sql (CRUD: Create, Read, Update, Delete)
$sql = "UPDATE  tareas SET nombre='{$nombre}', descrip='{$descrip}', fecha='{$fecha}', priorid='{$priorid}', respon='{$respon}' WHERE id_pk='{$id}'";


 //se lanza la consulta en la base de datos
 $respuesta = $conn->query($sql);

//3. procesa la respuesta
if($respuesta === TRUE) {
    echo "Registro actualizado correctamente";
} else {
    echo "el error al actualizar es: " . $conn->error;
}

//4. cierra la conexión
$conn->close();
header("Location: index.php");

?>