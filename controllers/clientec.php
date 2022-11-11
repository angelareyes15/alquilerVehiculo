<?php



class ClienteC extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function mostrar(){
        $clientes = $this->view->datos = $this->model->get();
        $this->view->clientes = $clientes;
        $this->view->mostrar('clientec/index');
        
    }

    function verCliente($param = null){
        $idCliente = $param[0];
        $cliente = $this->model->obtener_id($idCliente);

        session_start();
        $_SESSION["id_verCliente"] = $cliente->id_cliente;

        $this->view->cliente = $cliente;
        $this->view->mostrar('clientec/detalle');
    }

    function actualizarCliente($param = null){
        session_start();
        $id_clientes= $_SESSION["id_verCliente"];

        $nombres = $_POST['nombres'];
        $descripcion = $_POST['descripcion'];
        $telefono  = $_POST['telefono'];
        $tipo_ide  = $_POST['tipo_ide'];
        $n_documento  = $_POST['n_documento'];

        unset($_SESSION['id_verCliente']);

        if($this->model->actualizar(['id_cliente'=> $id_clientes,'nombres' => $nombres, 'descripcion' => $descripcion, 'telefono' => $telefono ,'tipo_ide' => $tipo_ide, 'n_documento' => $n_documento ])){
             
            $listado= array(
               
                "datos" => array("id_cliente"=> $id_clientes,
                "nombres"=> $nombres,
                "descripcion"=> $descripcion,
                "telefono"=> $telefono,
                "tipo_ide"=> $tipo_ide,
                "numero documento"=>$n_documento),
                "message"=> "Cliente actualizado con exito"
           );
           echo json_encode($listado,true);
           
        }else{
            $this->view->mensaje = "No se pudo actualizar al Cliente";
        }
        
    }

    function eliminarCliente($param = null){
        $idCliente = $param[0];

        $cliente = $this->model->clientec($idCliente);
        $nombres = $cliente->nombres;
        $descripcion = $cliente->descripcion;
        $telefono = $cliente->telefono;
        $tipo_ide = $cliente->tipo_ide;
        $n_documento = $cliente->n_documento;
       
        if($this->model->delete($idCliente)){
     
            $listado= array(
               
                "datos" => array("id_cliente"=> $idCliente,
                "nombres"=> $nombres,
                "descripcion"=> $descripcion,
                "telefono"=> $telefono,
                "tipo_ide"=> $tipo_ide,
                "numero documento"=>$n_documento),
                "message"=> "Cliente eliminado con exito"
           );
           echo json_encode($listado,true);
           
        }else{
            $mensaje = "No se pudo eliminar al cliente";
        }
        
    }

    
}

?>