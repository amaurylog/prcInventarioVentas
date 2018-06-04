<?php 

    class Conexion {

        private $servidor = "localhost";
        private $usuario = "root";
        private $password = "";
        private $bd = "ventas";

        public function Conectar()
        {
            $conectar = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->bd);

            return $conectar;
        }
    }