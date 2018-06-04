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
    <title>Artículos</title>
    <?php require_once "menu.php"; ?>
</head>
<body>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-4">
                <form action="" id="frmArticulo">
                    <caption>Seleccionar Categoría</caption>
                    <select class="custom-select" name="categoria" id="categoria">
                        <option value="A">Seleccionar Categoría</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <caption>Ingresar nombre del producto</caption>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                        </div>
                        <input type="text" id="nombre" name="nombre" class="form-control form-control-sm" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1">
                    </div>
                    <caption>Ingresar descripción</caption>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-info"></i></span>
                        </div>
                        <input type="text" id="descripcion" name="descripcion" class="form-control form-control-sm" placeholder="Descripción" aria-label="Descripción" aria-describedby="basic-addon1">
                    </div>
                    <caption>Ingresar cantidad</caption>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-box-open"></i></span>
                        </div>
                        <input type="text" id="cantidad" name="cantidad" class="form-control form-control-sm" placeholder="Cantidad" aria-label="Cantidad" aria-describedby="basic-addon1">
                    </div>
                    <caption>Ingresar precio</caption>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" id="precio" name="precio" class="form-control form-control-sm" placeholder="Precio" aria-label="Precio" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group">
                        <caption>Seleccionar Imagen</caption>
                        <input type="file" class="form-control form-control-sm" name="imagen" id="imagen">
                    </div>
                    <span class="btn btn-info btn-sm btn-block" id="btnRegistrarArticulo">Registrar</span>
                </form>
            </div>
            <div class="col-md-8">
                <div id="tablaArticuloLoad"></div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function(){
        $("#tablaArticuloLoad").load("articulos/tablaArticulos.php");

        $("#btnRegistrarArticulo").click(function(){

            vacios = validarFormVacio("#frmArticulo");

            if (vacios > 0)
            {
                alertify.alert("Debes llenar todos los campos");
                return false;
            }

            datos = $("#frmArticulo").serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "../procesos/articulos/agregarArticulo.php",
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