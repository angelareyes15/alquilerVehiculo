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

    <div class="container">
  <div class="frame">
    <div class="nav">
      <ul class="links">
        <li class="registro-active"><a class="btn">Actualizar Alquiler <?php echo $this->alquiler->id_alquiler; ?></a></li>
      </ul>
    </div>
    <div ng-app ng-init="checked = false">

        <form class="form-registro" action="<?php echo constant('URL'); ?>alquilerc/actualizarAlquiler/" method="POST">
        <label for="">Codigo</label>
            <input class="form-styling" type="text" name="codigo" id=""  value="<?php echo $this->alquiler->codigo; ?>">
            <label for="">Número de dias</label>
            <input class="form-styling" type="number" name="n_dias" id=""  value="<?php echo $this->alquiler->n_dias; ?>" required>
            <label for="">Observacion</label>
            <input class="form-styling" type="text" name="observacion" id=""  value="<?php echo $this->alquiler->observacion; ?>" >
            <label for="">Fecha alquiler</label>
            <input class="form-styling" type="date" name="fecha_alquiler" id=""  value="<?php echo $this->alquiler->fecha_alquiler; ?>" required>
            <label for="">Correo Empresa</label>
            <input class="form-styling" type="email" name="correo_empresa" id=""  value="<?php echo $this->alquiler->correo_empresa; ?>" >
            <label for="">Fecha devolucion</label>
            <input class="form-styling" type="datetime-local" name="fecha_devolucion" id=""  value="<?php echo $this->alquiler->fecha_devolucion; ?>" required>
            <label >Tamaño Vehiculo:</label>
                  
                            <input class="form-check-input" type="radio" name="vehiculo" id="exampleRadios1" value="Grande" checked>
                            <label class="select" for="exampleRadios1">
                              Grande
                            </label>
                            <input class="form-check-input" type="radio" name="vehiculo" id="exampleRadios2" value="Mediano">
                            <label class="select" for="exampleRadios2">
                              Mediano
                            </label>
                            <input class="form-check-input" type="radio" name="vehiculo" id="exampleRadios2" value="Pequeño">
                            <label class="select" for="exampleRadios2">
                             Pequeño
                            </label>
                            <br>
          <label for="">Valor alquiler</label>
          <input class="form-styling" type="text" name="valor_alquiler" id="" value="<?php echo $this->alquiler->valor_alquiler; ?>" required>
           <label for="">Cliente</label>
           <select class="form-styling" name="id_cliente" id="" required>
           <?php
                       require_once './controllers/alquiler.php';
                       $registro = new AlquilerC();
                       $registro->obt_cliente();
                ?>
           </select>
           <div class="btn-animate">
            <input type="submit" class="btn-registro" value="Crear alquiler">
          </div>
      </form>
      </div>
         
  </div>   
</div>
 

    
</body>
</html>