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
    <title>Categorías</title>
    <?php require_once "menu.php"; ?>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4">
                <form action="" id="frmCategoria">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-tag"></i></span>
                        </div>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Categoría" aria-label="Categoría" aria-describedby="basic-addon1">
                    </div>
                    <span class="btn btn-primary btn-block" id="btnAgregarCategoria">Registrar Categoría</span>
                </form>
            </div>
            <div class="col-md-6 offset-md-1">
                <div id="tablaCategoriaLoad"></div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function(){

        $("#tablaCategoriaLoad").load("categoria/tablaCategorias.php");

        $("#btnAgregarCategoria").click(function(){

            vacios = validarFormVacio("#frmCategoria");

            if (vacios > 0)
            {
                alertify.alert("Debes llenar todos los campos");
                return false;
            }

            datos = $("#frmCategoria").serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "../procesos/categorias/agregaCategoria.php",
                success: function(r) {
                    if (r == 1)
                        alertify.success("Se registró correctamente");
                    else
                        alertify.error("Se encontró un error al registrar la información");
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