<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro Tareas</title>
        <style>
            html
            {
                height: 100%;
                background: gray;
            }
            body
            {
                height: 100%;
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
            .tabla{
              color: black;
              background-color: white;
              text-align: left;
              border-collapse: collapse;
              width: 100%;
            }

            th, td{
              padding: 20px;
            }

            thead{
              background-color: #246355;
              color: white;
            }

            tr:nth-child(even){
              background-color: #ddd;
            }
            tr:hover td{
              background-color: #369681;
              color: white;
            }
            .contenedor{
              display: flex;
              flex-wrap: nowrap;
            }
        </style>
    </head>
    <body>
      <center>
        <div class="header">
            <h1>Aplicación para agendar tareas</h1>
            
          </div>
        
        <div class="seccion">
            <h3>Registre aquí las tareas que tiene pendientes para realizar con su fecha de entrega</h3>
            </center>
            <br>
            <br>
            <div class="contenedor">
      <div class="formu">
    <form action="crearTarea.php" method="POST" >
  <div class="form-group row">
    <label for="input" class="col-sm-2 col-form-label">Nombre de la tarea</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputE" name="nombreTa">
    </div>
  </div>
  <div class="form-group row">
    <label for="input" class="col-sm-2 col-form-label">Descripciòn de la tarea</label>
    <div class="col-sm-10">
      <input type="textarea" class="form-control" id="inputP" name="descripTa">
    </div>
  </div>
  <div class="form-group row">
    <label for="input" class="col-sm-2 col-form-label">Fecha de vencimiento para entregar la tarea</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputF" name="venciTa">
    </div>
  </div>
    <div class="form-group row">
      <label>Prioridad de la tarea</label>
      <br>
      <select name="prioridad" class="form-control">
        <option>Alta</option>
        <option>Media</option>
        <option>Baja</option>
      </select>
    </div>
  <div class="form-group row">
    <label for="input" class="col-sm-2 col-form-label">Persona responsable de la tarea</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputR" name="responTa">
    </div>
  </div>
    <br>
    <div class="item-form">
    <input type="submit" value="Guardar Tarea">
    </div>   
</form>
</div>
<br>
<br>
<br>
            <table border="2" class="tabla" >
              <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre de la tarea</th>
                    <th>Descripcion de la tarea</th>
                    <th>Fecha vencimiento de la tarea</th>
                    <th>Prioridad de la tarea</th>
                    <th>Responsable de la tarea</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <?php
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
                }
                //crear sentencia sql
                $sql = "SELECT * from tareas ORDER BY fecha DESC";
                //lanzar la sentencia sql
                $respuesta = $conn->query($sql);
                while($row=$respuesta->fetch_array())
                {
                ?>
                <tr>
                    <td> <?php echo $row['id_pk']; ?></td>
                    <td> <?php echo $row['nombre']; ?></td>
                    <td> <?php echo $row['descrip']; ?></td>
                    <td> <?php echo $row['fecha']; ?></td>
                    <td> <?php echo $row['priorid']; ?></td>
                    <td> <?php echo $row['respon']; ?></td>
                    <td><a href="verTarea.php?id_para_editar=<?php echo $row['id_pk']; ?>">Editar</a></td>
                    <td><a href="eliminarTarea.php?id_para_borrar=<?php echo $row['id_pk']; ?>">Eliminar</a></td>
                </tr>
                <?php
                }
                // cierra la conexión
                $conn->close();
                ?>
            </table>
            </div>
        </div>
    </body>
</html>
