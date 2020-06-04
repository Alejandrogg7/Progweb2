<?php

    $id_denuncia_para_editar = $_GET['id_para_editar'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "listatareas_bd";
                
        $conn = new mysqli($servername, $username, $password, $dbname);
           if($conn->connect_error)
           {
              //echo "mi conexión con la bd falló";
              die("la conexión falló " . $conn->connect_error);
            }
            else
            {
               //echo "conexión establecida entre php y mysql</br>";
            }
                //crear sentencia sql
        $sql = "SELECT * from tareas where id_pk={$id_denuncia_para_editar}";
                //lanzar la sentencia sql
                $respuesta = $conn->query($sql);

                while($row=$respuesta->fetch_array())
                {
                   //echo $row['lugar']."/".$row['placa'];
                    $nombre= $row['nombre'];
                    $descrip= $row['descrip'];
                    $fecha= $row['fecha'];
                    $priorid= $row['priorid'];
                    $respon= $row['respon'];
                }

?>


<form action="EditarTarea.php" method="POST">
<input type="hidden" name="input_id" value="<?php echo $id_denuncia_para_editar ?>">
<div class="form-group row">
    <label for="input" class="col-sm-2 col-form-label">Nombre de la tarea</label>
    <input value="<?php echo $nombre; ?>" type="text" name="nombreTa" id="" required>
</div>
<div class="form-group row">
    <label for="input" class="col-sm-2 col-form-label">Descripciòn de la tarea</label>
    <input value="<?php echo $descrip; ?>" type="textarea" name="descripTa" id="" required>
</div>
<div class="form-group row">
    <label for="input" class="col-sm-2 col-form-label">Fecha de vencimiento para entregar la tarea</label>
    <input value="<?php echo $fecha; ?>" type="date" name="venciTa" id="" required>
</div>
<div class="item-form">
<div class="form-group col-md-4">
      <label for="inputState">Prioridad de la tarea</label>
    <input value="<?php echo $priorid; ?>" type="text" name="prioridad" id="" required>
</div>
<div class="form-group row">
    <label for="input" class="col-sm-2 col-form-label">Persona responsable de la tarea</label>
    <input value="<?php echo $respon; ?>" type="text" name="responTa" id="" required>
</div>
<div class="item-form">
    <input type="submit" value="Guardar Tarea">
    </div>                
</form>