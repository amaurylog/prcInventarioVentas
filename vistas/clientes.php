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
    <title>Clientes</title>
    <?php require_once "menu.php"; ?>
</head>
<body>
    
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-4">
                <form action="" id="frmClientes">
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
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-compass"></i></span>
                        </div>
                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección" aria-label="Dirección" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                        </div>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" id="telefono" name="telefono" class="form-control" placeholder="Teléfono" aria-label="Teléfono" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                        </div>
                        <input type="text" id="rfc" name="rfc" class="form-control" placeholder="RFC" aria-label="RFC" aria-describedby="basic-addon1">
                    </div>
                    <span class="btn btn-primary btn-block" id="btnAgregarCliente">Registrar Clientes</span>
                </form>
            </div>
            <div class="col-md-8">
                <div id="tablaClientesLoad"></div>
            </div>
        </div>
    </div>

</body>
</html>

<script>

        $(document).ready(function(){
            
            $("#tablaClientesLoad").load("clientes/tablaClientes.php");

            $("#btnAgregarCliente").click(function(){

                vacios = validarFormVacio("#frmClientes");

                if(vacios > 0)
                {
                    alertify.alert("Debes llenar todos los campos.");
                    return false;
                }

                datos = $("#frmClientes").serialize();

                $.ajax({
                    type: "POST",
                    data: datos,
                    url: "../procesos/clientes/agregaCliente.php",
                    success: function(r) {
                        if(r == 1)
                            alertify.success("Cliente registrado correctamente");
                        else
                            alertify.error("Error al registrar");
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