<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="style">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Sección de Alquileres</h1>
        <a href="<?php echo constant('URL'); ?>alquiler"><button class="btn-style1">CREAR UN ALQUILER</button></a>

        <table width="100%" id="tabla" class="content-table">
            <thead>
                <tr><th>ID Alquiler</th>
                    <th>Codigo</th>
                    <th>Número dias</th>
                    <th>Observacion</th>
                    <th>Correo</th>
                    <th>Fecha alquiler</th>
                    <th>Fecha devolucion</th>
                    <th>Tamaño vehiculo</th>
                    <th>Valor alquiler</th>
                    <th>Nombre cliente</th>
                    
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="tbody-clientes">
            
        <?php
            include_once 'models/alquiler.php';
            foreach ($this->alquiler as $row) {
                $alquiler= new Alquileres();
                $alquiler = $row;
        ?>
                <tr id="fila-<?php echo $alquiler->id_alquiler; ?>">
                     <td><?php echo $alquiler->id_alquiler; ?></td>
                    <td><?php echo $alquiler->codigo; ?></td>
                    <td><?php echo $alquiler->n_dias; ?></td>
                    <td><?php echo $alquiler->observacion; ?></td>
                    <td><?php echo $alquiler->correo_empresa; ?></td>
                    <td><?php echo $alquiler->fecha_alquiler; ?></td>
                    <td><?php echo $alquiler->fecha_devolucion; ?></td>
                    <td><?php echo $alquiler->vehiculo; ?></td>
                    <td><?php echo $alquiler->valor_alquiler; ?></td>
                    <td><?php echo $alquiler->nombres; ?></td>
                    <td><a href="<?php echo constant('URL') .'alquilerc/verAlquiler/'. $alquiler->id_alquiler; ?>"><button class="boton_personalizado">Actualizar</button></a></td>
                    <td><a href="<?php echo constant('URL') .'alquilerc/eliminarAlquiler/'. $alquiler->id_alquiler; ?>"><button class="boton_eliminar">Eliminar</button></a></td> 
                </tr>
        <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>