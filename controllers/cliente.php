<?php

class Cliente extends Controller{


    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
        
    }

    function mostrar(){
        $this->view->mostrar('cliente/index');
    }

    function crear(){
        $nombres = $_POST['nombres'];
        $descripcion = $_POST['descripcion'];
        $telefono  = $_POST['telefono'];
        $tipo_ide  = $_POST['tipo_ide'];
        $n_documento  = $_POST['n_documento'];
       

        if($this->model->insertar(['nombres' => $nombres, 'descripcion' => $descripcion, 'telefono' => $telefono ,'tipo_ide' => $tipo_ide, 'n_documento' => $n_documento])){
            
            $cliente = $this->model->clientec($n_documento);
            $id_cliente = $cliente->id_cliente;
            
            $listado= array(
               
                "datos" => array("id_cliente"=> $id_cliente,
                "nombres"=> $nombres,
                "descripcion"=> $descripcion,
                "telefono"=> $telefono,
                "tipo_ide"=> $tipo_ide,
                "numero documento"=>$n_documento),
                "message"=> "Cliente insertado con exito"
           );
           echo json_encode($listado,true);
           
        }else{
            $this->view->mensaje = "La el número del cliente ya está registrada";
            $this->view->mostrar('cliente/index');
        }
    }

}

?>