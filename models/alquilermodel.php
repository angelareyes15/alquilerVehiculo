<?php

require 'models/alquiler.php';

class AlquilerModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insertar($datos){
        // insertarar
        $query = $this->db->connect()->prepare('INSERT INTO alquiler(codigo,n_dias, observacion, fecha_alquiler,correo_empresa,fecha_devolucion,valor_alquiler,vehiculo,id_cliente) VALUES (:codigo,:n_dias, :observacion, :fecha_alquiler, :correo_empresa, :fecha_devolucion,:valor_alquiler,:vehiculo,:id_cliente)');
        try{
            $query->execute([
                'codigo' => $datos['codigo'],
                'n_dias' => $datos['n_dias'],
                'observacion' => $datos['observacion'],
                'fecha_alquiler' => $datos['fecha_alquiler'],
                'correo_empresa' => $datos['correo_empresa'],
                'fecha_devolucion' => $datos['fecha_devolucion'],
                'valor_alquiler' => $datos['valor_alquiler'],
                'vehiculo' => $datos['vehiculo'],
                'id_cliente' => $datos['id_cliente']
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
    
    public function clientec($id){

        $item = new Alquileres();
        try{
            $query = $this->db->connect()->prepare("SELECT alq.id_alquiler,cli.Nombres,cli.Descripcion,cli.Telefono,cli.Tipo_ide,cli.N_documento  FROM alquiler alq  INNER JOIN cliente cli ON alq.id_cliente = cli.id_cliente WHERE codigo= :id");

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
                $item->id_alquiler = $row['id_alquiler'];
                $item->nombres = $row['Nombres'];
                $item->descripcion=$row['Descripcion'];
                $item->telefono =$row['Telefono'];
                $item->tipo_ide=$row['Tipo_ide'];
                $item->n_documento=$row['N_documento'];
            }
            return $item;
        }catch(PDOException $e){
            return null;
        }
	
	}

    
}

?>