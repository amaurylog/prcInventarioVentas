<?php

    require_once "../../clases/Conexion.php";
    require_once "../../clases/Usuarios.php";

    $obj = new Usuarios();
    
    $datos = array($_POST["nombre"], $_POST["apellido"], $_POST["usuario"], $_POST["password"]);

    echo $obj->registrarUsuario($datos);