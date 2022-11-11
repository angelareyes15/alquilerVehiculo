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
        <h1 class="center">Sección Clientes</h1>

        <a href="<?php echo constant('URL'); ?>cliente"><button class="btn-style">CREAR UN CLIENTE</button></a>

        <table width="100%" class="content-table">
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Descripcion</th>
                    <th>Telefono</th>
                    <th>Tipo identificacion</th>
                    <th>N_documento</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="tbody-clientes">
            
        <?php
            include_once 'models/cliente.php';
            foreach ($this->clientes as $row) {
                $cliente = new Cliente();
                $cliente = $row;
        ?>
                <tr id="fila-<?php echo $cliente->id_cliente; ?>">
                    <td><?php echo $cliente->nombres; ?></td>
                    <td><?php echo $cliente->descripcion; ?></td>
                    <td><?php echo $cliente->telefono; ?></td>
                    <td><?php echo $cliente->tipo_ide; ?></td>
                    <td><?php echo $cliente->n_documento; ?></td>
                    <td><a href="<?php echo constant('URL') .'clientec/verCliente/'. $cliente->id_cliente; ?>"><button class="boton_personalizado">Actualizar</button></a></td>
                    <td><a href="<?php echo constant('URL') .'clientec/eliminarCliente/'. $cliente->id_cliente; ?>"><button class="boton_eliminar">Eliminar</button></a></td> 
                </tr>
        <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>