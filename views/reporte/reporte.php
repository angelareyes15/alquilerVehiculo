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
        <h1 class="center">Sección reporte</h1>

        

        <table width="100%" class="content-table">
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
                    <th>Número de documento</th>
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
                    <td><?php echo $alquiler->n_documento; ?></td>
          
                </tr>
        <?php } ?>
            </tbody>
        </table>
    </div>


</body>
</html>