<?php

    class Usuarios
    {
        public function registrarUsuario($datos)
        {
            $c = new Conexion();
            $conexion = $c->Conectar();

            $fecha = date("Y-m-d");
            $pass = sha1($datos[3]);

            $sql = "INSERT INTO usuarios(nombre,apellido,email,password,fechaCaptura) VALUES('$datos[0]','$datos[1]','$datos[2]','$pass','$fecha')";

            return mysqli_query($conexion, $sql);
        }
    }