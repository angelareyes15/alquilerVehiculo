<?php

class Alquiler extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
        
    }

    function mostrar(){
        $this->view->mostrar('alquiler/index');
    }

    function crear(){
        $codigo = $_POST['codigo'];
        $n_dias = $_POST['n_dias'];
        $observacion = $_POST['observacion'];
        $fecha_alquiler= date('Y-m-d', strtotime( $_POST['fecha_alquiler']));
        $correo_empresa = $_POST['correo_empresa'];
        $fecha_devolucion= date('Y-m-d H:i:s', strtotime( $_POST['fecha_devolucion']));
        $valor_alquiler  = $_POST['valor_alquiler'];
        $vehiculo  = $_POST['vehiculo'];
        $id_cliente = $_POST['id_cliente'];


        if($this->model->insertar(['codigo' => $codigo,'n_dias' => $n_dias, 'observacion' => $observacion, 'fecha_alquiler' => $fecha_alquiler, 'correo_empresa' => $correo_empresa ,'fecha_devolucion' => $fecha_devolucion, 'valor_alquiler' => $valor_alquiler, 'vehiculo' => $vehiculo, 'id_cliente' => $id_cliente])){
            
            $alquiler = $this->model->clientec($codigo);
            $id_alquiler = $alquiler->id_alquiler;
            $nombres = $alquiler->nombres;
            $descripcion = $alquiler->descripcion;
            $telefono = $alquiler->telefono;
            $n_documento = $alquiler->n_documento;
            
            $listado= array(
               
                "data" => array("id_alquiler"=> $id_alquiler,
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
                "message"=> "Registro insertarado satisfactoriamente"
           );
           $dat= json_encode($listado,true);
           echo "$dat";
        }else{
            $this->view->mensaje = "EL número del Alquiler ya está registrada";
            $this->view->mostrar('alquiler/index');
        }
    }

    public function obt_cliente(){
        include_once('./models/alquilermodel.php');
        $reg = new AlquilerModel();
        
        foreach ($reg->obt_clientes() as $key => $value) {
          
            echo '<option value="'. $value->id_cliente .'">'.$value->Nombres .'</option>';
        }

      
    }

}

?>