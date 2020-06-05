<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Denuncias Web De Transito</title>
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
            .footer
            {
                height:10%
            }
        </style>
    </head>
    <body>
        <div class="header">
            <h1>Denuncias Web App</h1>
            <p>Aplicacion que nos permite realizar una denuncia sobre alguna infracción de transito de cualquier ciudadano.</p>
            <p>Permite el control y la veduría pública</p>
        </div>
        <div class="seccion">
            <h3>Registre aquí las denuncias que desea realizar</h3>
            <form action="crearDenuncia.php" method="POST">
                <div class="item-form">
                    <label for="">Lugar:</label>
                    <input type="text" name="input_lugar" id="" required>
                </div>
                <div class="item-form">
                    <label for="">Fecha:</label>
                    <input type="date" name="input_fecha" id="" required>
                </div>
                <div class="item-form">
                    <label for="">Hora:</label>
                    <input type="time" name="input_hora" id="" required>
                </div>
                <div class="item-form">
                    <label for="">Tipo de Vehículo:</label>
                    <!-- <input type="text" name="input_tipo" id="" required> -->
                    <select name="cars" id="">
                        <option value="Camión">Camión</option>
                        <option value="Carro particular">Carro particular</option>
                        <option value="Volqueta">Volqueta</option>
                        <option value="Motos">Motos</option>
                        <option value="Transporte público">Transporte público</option>
                    </select>
                </div>
                <div class="item-form">
                    <label for="">Placa:</label>
                    <input type="text" name="input_placa" id="" required>
                </div>
                <div class="item-form">
                    <label for="">Denuncia:</label>
                    <input type="textarea" name="input_denuncia" id="" required>
                </div>
                <div class="item-form">
                    <input type="submit">
                </div>                
            </form>
            <table border="1">
                <tr>
                    <th>id</th>
                    <th>Lugar</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Tipo</th>
                    <th>Placa</th>
                    <th>Denuncia</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php

                include_once('conexionbd.php');
                //crear sentencia sql
                $sql = "SELECT * from denuncias";
                //lanzar la sentencia sql
                $respuesta = $conn->query($sql);
                while($row=$respuesta->fetch_array())
                {
                ?>
                <tr>
                    <td> <?php echo $row['id_pk']; ?></td>
                    <td> <?php echo $row['lugar']; ?></td>
                    <td> <?php echo $row['fecha']; ?></td>
                    <td> <?php echo $row['hora']; ?></td>
                    <td> <?php echo $row['tipo']; ?></td>
                    <td> <?php echo $row['placa']; ?></td>
                    <td> <?php echo $row['denuncia']; ?></td>
                    <td><a href="verDenuncia.php?id_para_editar=<?php echo $row['id_pk']; ?>">Editar</a></td>
                    <td><a href="eliminarDenuncia.php?id_para_borrar=<?php echo $row['id_pk']; ?>">eliminar</a></td>
                </tr>
                <?php
                }
                // cierra la conexión
                $conn->close();
                ?>
            </table>
            
        </div>
        <div class="footer">
            Realizado por AGG
        </div>
    </body>
</html>