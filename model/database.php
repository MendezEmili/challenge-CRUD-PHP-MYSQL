<?php

$conexion = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_mysql'
);

    /*class Database{
        private $nombreServer;
        private $nombreUsuario;
        private $password;
        private $nombreDB;

        public function conectar(){
            $this->nombreServer = 'localhost';
            $this->nombreUsuario = 'root';
            $this->password = '';
            $this->nombreDB = 'php_mysql';

            $conexion = new mysqli($this->nombreServer, $this->nombreUsuario, $this->password, $this->nombreDB);

            return $conexion;
        }
    }*/

?>