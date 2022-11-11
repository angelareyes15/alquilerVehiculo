<?php

require 'models/alquiler.php';

class AlquilercModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function listar(){
        $arreglos = [];
        try{
            $query = $this->db->connect()->query('SELECT alq.id_alquiler,alq.codigo ,alq.n_dias ,alq.observacion ,alq.correo_empresa ,alq.fecha_alquiler ,alq.fecha_devolucion,alq.valor_alquiler,alq.vehiculo,cli.id_cliente,cli.Nombres,cli.Descripcion,cli.Telefono,cli.Tipo_ide,cli.N_documento FROM alquiler alq  INNER JOIN cliente cli ON alq.id_cliente = cli.id_cliente');
            
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

    public function Obtener_Id($id){
        $arreglos= new Alquileres();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM alquiler WHERE id_alquiler= :id');

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
                $arreglos->id_alquiler= $row['id_alquiler'];
                $arreglos->codigo= $row['codigo'];
                $arreglos->n_dias = $row['n_dias'];
                $arreglos->observacion = $row['observacion'];
                $arreglos->correo_empresa= $row['correo_empresa'];
                $arreglos->fecha_alquiler = $row['fecha_alquiler'];
                $arreglos->fecha_devolucion= $row['fecha_devolucion'];
                $arreglos->valor_alquiler = $row['valor_alquiler'];
                $arreglos->vehiculo = $row['vehiculo'];
                $arreglos->id_cliente = $row['id_cliente'];
            }
            return $arreglos;
        }catch(PDOException $e){
            return null;
        }
    }

    public function actualizar($arreglos){
        $query = $this->db->connect()->prepare('UPDATE alquiler SET codigo = :codigo, n_dias = :n_dias, observacion =:observacion, correo_empresa =:correo_empresa, fecha_alquiler=:fecha_alquiler,fecha_devolucion=:fecha_devolucion,valor_alquiler=:valor_alquiler,vehiculo=:vehiculo,id_cliente=:id_cliente WHERE id_alquiler = :id_alquiler');
        try{
            $query->execute([
                'id_alquiler' => $arreglos['id_alquiler'],
                'codigo' => $arreglos['codigo'],
                'n_dias' => $arreglos['n_dias'],
                'observacion' => $arreglos['observacion'],
                'correo_empresa' => $arreglos['correo_empresa'],
                'fecha_alquiler' => $arreglos['fecha_alquiler'],
                'fecha_devolucion' => $arreglos['fecha_devolucion'],
                'valor_alquiler' => $arreglos['valor_alquiler'],
                'vehiculo' => $arreglos['vehiculo'],
                'id_cliente' => $arreglos['id_cliente']
                
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function eliminar($id){
        $query = $this->db->connect()->prepare('DELETE FROM alquiler WHERE id_alquiler = :id_alquiler');
        try{
            $query->execute([
                'id_alquiler' => $id
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function obt_clientes(){

		$stmt = $this->db->connect()->prepare("SELECT * FROM cliente");	
		$stmt->execute([]);

		$obj = $stmt->fetchALL(PDO::FETCH_OBJ);

		return $obj;
	
	}

    public function alquilerc($id){

        $arreglo = new Alquileres();
        try{
            $query = $this->db->connect()->prepare("SELECT alq.id_alquiler,alq.codigo ,alq.n_dias ,alq.observacion ,alq.correo_empresa ,alq.fecha_alquiler ,alq.fecha_devolucion,alq.valor_alquiler,alq.vehiculo,cli.id_cliente,cli.Nombres,cli.Descripcion,cli.Telefono,cli.Tipo_ide,cli.N_documento FROM alquiler alq  INNER JOIN cliente cli ON alq.id_cliente = cli.id_cliente WHERE id_alquiler= :id");

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
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
            }
            return $arreglo;
        }catch(PDOException $e){
            return null;
        }
	
	}

 
}
?>