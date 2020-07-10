<?php 
    //include('database.php');

    class Desarrolladores extends Database{
        
        public $nombre;
        public $cargo;
        public $correo;
        public $url_portafolio;

        public function listar(){
            $query = "SELECT * FROM desarrolladores";

            $resultado = $this->conectar()->query($query);
            
            if(!$resultado){
                die("Error al realizar busqueda");
            } else {
                while ($row = $result->fetch_assoc()) {
                    $data = $row;
                }
                return $data;
            } 
        }
    }

?>