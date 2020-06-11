<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Registro Tareas</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <style>
            html
            {
                height: 100%;
            
            }
            body
            {
                height: 100%;
                background-color: gray;
            }
            .seccion
            {
                height: 70%;
              
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
              padding: 30px;
              color: #999;
              padding-right: 50px;
            }
            input, textarea{
			      border: 0;
			      outline: none;
            width: 100%;
	        	}

            .tabla{
              background-color: white;
              color: black;
              text-align: left;
              border-collapse: collapse;
              width: 100%;
              margin-left: 80px;
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
      <form action="crearTarea.php" method="POST" class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-md-10 mb-3">
      <label for="validationTooltip01">Nombre de la tarea</label>
      <input type="text" class="form-control" id="validationTooltip01" name="nombreTa" required>
      <div class="valid-tooltip">
        Registro correcto!
      </div>
    </div>
    <div class="col-md-10 mb-3">
      <label for="validationTooltip02">Descripción Tarea</label>
      <input type="text" class="form-control" id="validationTooltip02" name="descripTa" required>
      <div class="valid-tooltip">
        Registro correcto!
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationTooltip03">Fecha maxima de entrega</label>
      <input type="date" class="form-control" id="validationTooltip03" name="venciTa" required>
      <div class="invalid-tooltip">
        Registre la información correctamente!
      </div>
    </div>
    <div class="col-md-10 mb-3">
      <label for="validationTooltip04">Prioridad de tarea</label>
      <select class="custom-select" id="validationTooltip04" name="prioridad" required>
        <option selected disabled value="">Alta</option>
        <option>Media</option>
        <option>Baja</option>
      </select>
      <div class="invalid-tooltip">
        Registre la información correctamente!
      </div>
    </div>
    <div class="col-md-10 mb-3">
      <label for="validationTooltip05">Responsable tarea</label>
      <input type="text" class="form-control" id="validationTooltip05" name="responTa" required>
      <div class="invalid-tooltip">
        Registre la información correctamente!
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Guardar tarea</button>
</form>
</div>
<br>
<br>
<br>
            <table border="2" class="tabla">
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>
