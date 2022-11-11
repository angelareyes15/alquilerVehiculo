<?php

class AlquilerC extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "";
    }

    function mostrar(){
        $alquiler = $this->view->datos = $this->model->listar();
        $this->view->alquiler = $alquiler;
        $this->view->mostrar('alquilerc/index');
    
    }

    function verAlquiler($param = null){
        $idAlquiler = $param[0];
        $alquiler = $this->model->Obtener_Id($idAlquiler);

        session_start();
        $_SESSION["id_verAlquiler"] = $alquiler->id_alquiler;

        $this->view->alquiler = $alquiler;
        $this->view->mostrar('alquilerc/detallealquiler');
    }

    function actualizarAlquiler($param = null){
        session_start();
        $id_alquilers= $_SESSION["id_verAlquiler"];

        $codigo = $_POST['codigo'];
        $n_dias = $_POST['n_dias'];
        $observacion = $_POST['observacion'];
        $fecha_alquiler= date('Y-m-d', strtotime( $_POST['fecha_alquiler']));
        $correo_empresa = $_POST['correo_empresa'];
        $fecha_devolucion= date('Y-m-d H:i:s', strtotime( $_POST['fecha_devolucion']));
        $valor_alquiler  = $_POST['valor_alquiler'];
        $vehiculo  = $_POST['vehiculo'];
        $id_cliente = $_POST['id_cliente'];


        unset($_SESSION['id_verAlquiler']);

        if($this->model->actualizar(['id_alquiler' => $id_alquilers,'codigo' => $codigo,'n_dias' => $n_dias, 'observacion' => $observacion, 'fecha_alquiler' => $fecha_alquiler, 'correo_empresa' => $correo_empresa ,'fecha_devolucion' => $fecha_devolucion, 'valor_alquiler' => $valor_alquiler, 'vehiculo' => $vehiculo, 'id_cliente' => $id_cliente])){
            
            $alquiler = $this->model->alquilerc($id_alquilers);
            $id_alquiler = $alquiler->id_alquiler;
            $nombres = $alquiler->nombres;
            $descripcion = $alquiler->descripcion;
            $telefono = $alquiler->telefono;
            $n_documento = $alquiler->n_documento;
            
            $listado= array(
               
                "datos" => array("id_alquiler"=> $id_alquiler,
                "codigo"=> $codigo,
                "n_dias"=> $n_dias,
                "observacion"=> $observacion,
                "id_cliente"=> $id_cliente,
                "fecha_alquiler"=> $fecha_alquiler,
                "correo_empresa"=>$correo_empresa,
                "fecha_devolucion"=>$fecha_devolucion,
                "vehiculo"=>$vehiculo,
                "valor_alquiler"=>$valor_alquiler,
                "Cliente"=> array("id_cliente"=> $id_cliente,"Nombre cliente"=> $nombres,"descripcion"=> $descripcion,"telefono"=> $telefono,"n_documento"=> $n_documento)),
                "message"=> "Alquiler actualizado con exito"
           );
           echo json_encode($listado,true);
         
        }else{
            $this->view->mensaje = "No se pudo actualizar al Alquiler ";
        }
    }

    function eliminarAlquiler($param = null){
            $id_alquiler = $param[0];

            $alquiler = $this->model->alquilerc($id_alquiler);
            $id_alquiler = $alquiler->id_alquiler;
            $codigo = $alquiler->codigo;
            $n_dias = $alquiler->n_dias;
            $observacion = $alquiler->observacion;
            $id_cliente = $alquiler->id_cliente;
            $fecha_alquiler = $alquiler->fecha_alquiler;
            $correo_empresa = $alquiler->correo_empresa;
            $fecha_devolucion = $alquiler->fecha_devolucion;
            $vehiculo = $alquiler->vehiculo;
            $valor_alquiler= $alquiler->valor_alquiler;

            $nombres = $alquiler->nombres;
            $descripcion = $alquiler->descripcion;
            $telefono = $alquiler->telefono;
            $n_documento = $alquiler->n_documento;
    
        if($this->model->eliminar($id_alquiler)){
           $listado= array(
               
                "datos" => array("id_alquiler"=> $id_alquiler,
                "codigo"=> $codigo,
                "n_dias"=> $n_dias,
                "observacion"=> $observacion,
                "id_cliente"=> $id_cliente,
                "fecha_alquiler"=> $fecha_alquiler,
                "correo_empresa"=>$correo_empresa,
                "fecha_devolucion"=>$fecha_devolucion,
                "vehiculo"=>$vehiculo,
                "valor_alquiler"=>$valor_alquiler,
                "Cliente"=> array("id_cliente"=> $id_cliente,"Nombre cliente"=> $nombres,"descripcion"=> $descripcion,"telefono"=> $telefono,"n_documento"=> $n_documento)),
                "message"=> "Alquiler eliminado con exito"
           );
           echo json_encode($listado,true);
           
        }else{
            $this->view->mensaje = "No se pudo eliminar al Alquiler ";
        }

    }

    public function obt_cliente(){
        include_once('./models/alquilercmodel.php');
        $reg = new AlquilercModel();
        
        foreach ($reg->obt_clientes() as $key => $value) {
            #echo $value;
            echo '<option value="'. $value->id_cliente .'">'.$value->Nombres .'</option>';
        }

       
    }

    
}

?>