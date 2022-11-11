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
        <li class="registro-active"><a class="btn">Reporte por fecha alquiler</a></li>
      </ul>
    </div>
    <div ng-app ng-init="checked = false">

        <form class="form-registro" action="<?php echo constant('URL'); ?>reporte/reporte" method="POST">
            <label  for="">Fecha inicio</label>
            <input class="form-styling" type="date" name="fecha_inicio" id="" required>
            <label for="">Fecha final</label>
            <input class="form-styling" type="date" name="fecha_final" id="">

            <div class="btn-animate">
            <input type="submit" class="btn-registro" value="ver reporte">
          </div>
          </form>
      </div>
         
  </div>   
</div>
    
    
</body>
</html>