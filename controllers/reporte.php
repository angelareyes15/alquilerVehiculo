<?php

class Reporte extends Controller{


    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
        
    }

    function mostrar(){
        $this->view->mostrar('reporte/index');
    }

    function reporte(){    
        $FechaInicio= date('Y-m-d', strtotime( $_POST['fecha_inicio']));
        $FechaFinal= date('Y-m-d', strtotime( $_POST['fecha_final']));

            $alquiler = $this->view->datos = $this->model->listar($FechaInicio,$FechaFinal);
            $this->view->alquiler = $alquiler;
            $this->view->mostrar('reporte/reporte');
        
    
      }
    }