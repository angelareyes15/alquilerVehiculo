<?php

require 'models/alquiler.php';

class ReporteModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function listar($FechaInicio,$FechaFinal){
        $arreglos = [];
        try{
            $query = $this->db->connect()->query("SELECT alq.id_alquiler,alq.codigo ,alq.n_dias ,alq.observacion ,alq.correo_empresa ,alq.fecha_alquiler ,alq.fecha_devolucion,alq.valor_alquiler,alq.vehiculo,cli.id_cliente,cli.Nombres,cli.Descripcion,cli.Telefono,cli.Tipo_ide,cli.N_documento FROM alquiler alq  INNER JOIN cliente cli ON alq.id_cliente = cli.id_cliente WHERE fecha_alquiler BETWEEN '$FechaInicio' AND '$FechaFinal';");
           
            while($row = $query->fetch()){
                $arreglo = new Alquileres();
                $arreglo->id_alquiler= $row['id_alquiler'];
                $arreglo->codigo= $row['codigo'];
                $arreglo->n_dias = $row['n_dias'];
                $arreglo->observacion = $row['observacion'];
                $arreglo->correo_empresa= $row['correo_empresa'];
                $arreglo->fecha_alquiler = $row['fecha_alquiler'];
                $arreglo->fecha_devolucion= $row['fecha_devolucion'];
                $arreglo->valor_alquiler = $row['valor_alquiler'];
                $arreglo->vehiculo = $row['vehiculo'];
                $arreglo->id_cliente = $row['id_cliente'];
                $arreglo->nombres = $row['Nombres'];
                $arreglo->descripcion=$row['Descripcion'];
                $arreglo->telefono =$row['Telefono'];
                $arreglo->tipo_ide=$row['Tipo_ide'];
                $arreglo->n_documento=$row['N_documento'];
                array_push($arreglos, $arreglo);
            }
            return $arreglos;
        }catch(PDOException $e){
            return [];
        }
    }

}
?>