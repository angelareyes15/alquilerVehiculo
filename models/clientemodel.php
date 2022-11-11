<?php



class ClienteModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insertar($datos){
     
        $query = $this->db->connect()->prepare('INSERT INTO cliente (Nombres,Descripcion, Telefono,Tipo_ide,N_documento) VALUES (:nombres, :descripcion, :telefono,:tipo_ide,:n_documento)');
        try{
            $query->execute([
                'nombres' => $datos['nombres'],
                'descripcion' => $datos['descripcion'],
                'telefono' => $datos['telefono'],
                'tipo_ide' => $datos['tipo_ide'],
                'n_documento' => $datos['n_documento']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
        
        
    }

    public function clientec($id){

        $item = new Cliente();
        try{
            $query = $this->db->connect()->prepare("SELECT * FROM cliente  WHERE N_documento= :id");

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