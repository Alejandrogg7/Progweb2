<?php

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

$sql = "INSERT INTO tareas (nombre, descrip, fecha, priorid, respon) VALUES ('{$nombre}', '{$descrip}', '{$fecha}', '{$priorid}', '{$respon}')";


 //se lanza la consulta en la base de datos
 $respuesta = $conn->query($sql);

//3. procesa la respuesta
if($respuesta === TRUE) {
    echo "Registro creado correctamente";
} else {
    echo "el error es: " . $conn->error;
}

//4. cierra la conexión
$conn->close();
header("Location: index.php");


// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "denuncias_bd";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// else
// {
//     echo "Conección establecida con la base de datos...";
// }

// $sql = "INSERT INTO denuncias (lugar, fecha, hora, tipo, placa, denuncia)
// VALUES ('".$lugar."', '".$fecha."', '".$hora."', '".$tipoVehiculo."', '".$placa."','".$denuncia."')";

// if ($conn->query($sql) === TRUE) {
//     echo "Registro creado correctamente";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }


// $conn->close();
// header("Location: index.php");

?>