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
 <body>
      <center>
        <div class="header">
            <h1>Parte para editar las tareas tareas</h1>
            
          </div>
        
        <div class="seccion">
            <h3>Edite aquí las tareas que ya registro anteriormente</h3>
<center>
<form action="EditarTarea.php" method="POST">
<input type="hidden" name="input_id" value="<?php echo $id_denuncia_para_editar ?>">
<div class="form-group row">
    <label for="input" class="col-sm-2 col-form-label">Nombre de la tarea</label>
    <div class="col-sm-10">
      <input value="<?php echo $nombre; ?>" type="text" class="form-control" id="inputE" name="nombreTa" type="text" required> 
    </div>
</div>
<br>
<div class="form-group row">
    <label for="input" class="col-sm-2 col-form-label">Descripciòn de la tarea</label>
    <div class="col-sm-10">
      <input value="<?php echo $descrip; ?>" type="textarea" class="form-control" id="inputP" name="descripTa" required>
    </div>
  </div>
<br>
<div class="form-group row">
    <label for="input" class="col-sm-2 col-form-label">Fecha de vencimiento para entregar la tarea</label>
    <div class="col-sm-10">
      <input value="<?php echo $fecha; ?>" type="date" class="form-control" id="inputF" name="venciTa" required>
    </div>
  </div>
<br>
<div class="form-group row">
      <label>Prioridad de la tarea</label>
      <br>
    <select value="<?php echo $priorid; ?>" name="prioridad" class="form-control" required>
        <option>Alta</option>
        <option>Media</option>
        <option>Baja</option>
      </select>
</div>
<br>
<div class="form-group row">
    <label for="input" class="col-sm-2 col-form-label">Persona responsable de la tarea</label>
    <div class="col-sm-10">
      <input value="<?php echo $respon; ?>" type="text" class="form-control" id="inputR" name="responTa" required>
    </div>
  </div>
<br>
<div class="item-form">
    <input type="submit" value="Guardar Tarea">
    </div>                
</form>

<style>

body
            {
                height: 100%;
                background: gray;
            }
            .seccion
            {
                height: 70%;
                background-color:gray;
                border: whitesmoke solid 2px gray;
            }
            .header
            {
                height:20%
            }  
                .formu{
              background-color: white;
              border-radius: 3px;
              font-size: 0.8em;
              margin: 0 auto;
              width: 300px;
              padding: 10px;
              height: 300px;
              color: #999;
            }
            input, textarea{
			      border: 0;
			      outline: none;
            width: 280px;
	        	}

		        .form-control{
		      	border: solid 1px #ccc;
		      	padding: 10px;
	        	}

		        .form-control:focus{
		      	border-color: #18A383;
	        	}

                .center-content{
		    	text-align: center;
	        	}
</style>