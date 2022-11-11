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
        <li class="registro-active"><a class="btn">Actualizar cliente <?php echo $this->cliente->id_cliente; ?></a></li>
      </ul>
    </div>
    <div ng-app ng-init="checked = false">

        <form class="form-registro" action="<?php echo constant('URL'); ?>clientec/actualizarCliente/" method="POST">
       
            <label for="">Nombres</label>
            <input class="form-styling" type="text"  name="nombres" id="" required value="<?php echo $this->cliente->nombres; ?>">
            <label  for="">Descripcion</label>
            <input class="form-styling" type="text" name="descripcion" id="" value="<?php echo $this->cliente->descripcion; ?>">
            <label for="">Telefono</label>
            <input class="form-styling" type="number" name="telefono" id=""required value="<?php echo $this->cliente->telefono; ?>">
            <label for="">Tipo identificacion</label><br>
           <select class="form-styling" name="tipo_ide" id=""required >
           <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                                <option value="Cédula de extranjería">Cédula de extranjería</option>
                                <option value="NIT">NIT</option>
                                <option value="Pasaporte">Pasaporte</option>
                                <option value="Tarjeta identidad">Tarjeta identidad</option>
           </select>
            <label for="">Número de documento</label>
            <input class="form-styling" type="number" name="n_documento" id="" required value="<?php echo $this->cliente->n_documento; ?>">
         
          <div class="btn-animate">
            <input type="submit" class="btn-registro" value="Actulizar Cliente">
          </div>
          </form>
      </div>
         
  </div>   
</div>
 

 
</body>
</html>