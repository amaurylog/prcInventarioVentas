<?php
    require_once "clases/Conexion.php";
    $obj = new Conexion();
    $conexion = $obj->Conectar();

    $sql = "SELECT * FROM usuarios WHERE email = 'admin'";
    $result = mysqli_query($conexion, $sql);
    $validar = 0;
    if(mysqli_num_rows($result) > 0)
    {
        $validar = 1;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión</title>

    <link rel="stylesheet" href="librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <script src="librerias/jquery-3.3.1.js"></script>
    <script src="js/funciones.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header text-white text-center bg-dark">
                        Iniciar Sesión
                    </div>
                    <div class="card-body">
                        <img src="img/logo.png" alt="" class="img-fluid mx-auto d-block" width="300px">
                        <form action="" id="frmLogin">    
                        <div class="form-group mt-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" aria-label="Usuario" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="basic-addon2">
                                </div>
                            </div>
                    </div>
                    <div class="card-footer text-white bg-dark">
                            <div class="row justify-content-end mr-3">
                                <span class="btn btn-success btn-sm" id="login">Iniciar Sesión</span>
                                <?php if(!$validar):?>
                                    <a href="registro.php" class="btn btn-danger btn-sm ml-2">Registrar</a>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function(){
        $("#login").click(function(){

            vacios = validarFormVacio("#frmLogin");

            if (vacios > 0)
            {
                alert("Debes llenar todos los campos");
                return false;
            }

            datos = $("#frmLogin").serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "procesos/regLogin/login.php",
                success: function(r) {
                    if (r == 1)
                        window.location = "vistas/inicio.php";
                    else  
                        alert("Credenciales Incorrectas, verifica de nuevo");
                }
            });
        });
    });
</script>