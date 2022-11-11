<?php

require 'models/cliente.php';

class ClienteCModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT * FROM cliente');
            
            while($row = $query->fetch()){
                $item = new Cliente();
                $item->id_cliente = $row['id_cliente'];
                $item->nombres = $row['Nombres'];
                $item->descripcion=$row['Descripcion'];
                $item->telefono= $row['Telefono'];
                $item->tipo_ide=$row['Tipo_ide'];
                $item->n_documento=$row['N_documento'];

                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    public function obtener_id($id){
        $item = new Cliente();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM cliente WHERE id_cliente= :id');

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
                $item->id_cliente = $row['id_cliente'];
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

    public function actualizar($item){
        $query = $this->db->connect()->prepare('UPDATE cliente SET Nombres = :nombres, Descripcion=:descripcion, Telefono =:telefono, Tipo_ide =:tipo_ide, N_documento=:n_documento WHERE id_cliente = :id_cliente');
        try{
            $query->execute([
                'id_cliente' => $item['id_cliente'],
                'nombres' => $item['nombres'],
                'descripcion' => $item['descripcion'],
                'telefono' => $item['telefono'],
                'tipo_ide' => $item['tipo_ide'],
                'n_documento' => $item['n_documento']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare('DELETE  FROM cliente WHERE id_cliente = :id_cliente');
        try{
            $query->execute([
                'id_cliente' => $id
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function clientec($id){

        $item = new Cliente();
        try{
            $query = $this->db->connect()->prepare("SELECT * FROM cliente  WHERE id_cliente= :id");

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
                $item->id_cliente = $row['id_cliente'];
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