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

        public function iniciarSesion($datos)
        {
            $c = new Conexion();
            $conexion = $c->Conectar();

            $_SESSION["usuario"] = $datos[0];
            $_SESSION["idusuario"] = self::traeID($datos);

            $pass = sha1($datos[1]);

            $sql = "SELECT * FROM usuarios WHERE email = '$datos[0]' AND password = '$pass'";

            $result = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($result) > 0)
                return 1;
            else
                return 0;
        }

        public function traeID($datos)
        {
            $c = new Conexion();
            $conexion = $c->Conectar();

            $pass = sha1($datos[1]);

            $sql = "SELECT id_usuario FROM usuarios WHERE email = '$datos[0]' AND password = '$pass'";

            $result = mysqli_query($conexion, $sql);

            return mysqli_fetch_row($result)[0];
        }
    }