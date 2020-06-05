
<?php
include_once('conexionbd.php');

$id = $_POST['input_id'];
$lugar = $_POST['input_lugar'];
$fecha = $_POST['input_fecha'];
$hora = $_POST['input_hora'];
$tipoVehiculo = $_POST['cars'];
$placa = $_POST['input_placa'];
$denuncia = $_POST['input_denuncia'];

// echo $lugar;
// echo "</br>";
// echo $fecha;
// echo "</br>";
// echo $hora;
// echo "</br>";
// echo $tipoVehiculo;
// echo "</br>";
// echo $placa;
// echo "</br>";
// echo $denuncia;
// echo "</br>";

//1. conexión entre nuestra app(php) y el servidor de bases de datos(mysql)

//2. sentencia sql (CRUD: Create, Read, Update, Delete)
//$sql = "INSERT INTO denuncias (lugar, fecha, hora, tipo, placa, denuncia) VALUES ('".$lugar."', '".$fecha."', '".$hora."', '".$tipoVehiculo."', '".$placa."','".$denuncia."')";
$sql = "UPDATE  denuncias SET lugar='{$lugar}', fecha='{$fecha}', hora='{$hora}', tipo='{$tipoVehiculo}', placa='{$placa}', denuncia='{$denuncia}' WHERE id_pk='{$id}'";

// VALUES ('".$lugar."', '".$fecha."', '".$hora."', '".$tipoVehiculo."', '".$placa."','".$denuncia."')";

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