<?php
    session_start();
    if (isset($_SESSION["usuario"]))
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    <?php require_once "menu.php"; ?>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4">
                <form action="" id="frmUsuarios">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre(s)" aria-label="Nombre(s)" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido(s)" aria-label="Apellido(s)" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" aria-label="Usuario" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="basic-addon1">
                    </div>
                    <span class="btn btn-primary btn-block" id="btnAgregarUsuario">Registrar Usuario</span>
                </form>
            </div>
            <div class="col-md-8">
                <div id="tablaUsuariosLoad"></div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function() {

        $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");

        $("#btnAgregarUsuario").click(function(){
            
            vacios = validarFormVacio("#frmUsuarios");

            if (vacios > 0)
            {
                alertify.alert("Debes llenar todos los campos");
                return false;
            }

            datos = $("#frmUsuarios").serialize();

            $.ajax({
                type: "POST",
                data: datos,
                url: "../procesos/usuarios/agregarUsuarios.php",
                success: function(r) {
                    if (r == 1)
                        alertify.success("Usuario registrado Correctamente");
                    else
                        alertify.error("Error al registrar el usuario");
                }
            });

        });
    });
</script>

<?php
    }
    else
        header("location:../index.php");
?>