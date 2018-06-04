<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Administrador</title>

    <link rel="stylesheet" href="librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <script src="librerias/jquery-3.3.1.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header text-white text-center bg-dark">
                        Registrar Administrador
                    </div>
                    <div class="card-body">
                        <form action="" id="frmRegistro">
                            <div class="form-group mt-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" id="" name="" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Apellidos" aria-label="Apellidos" aria-describedby="basic-addon2">
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Usuario / Email" aria-label="Usuario / Email" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon4"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="basic-addon4s">
                                </div>
                            </div>
                    </div>
                    <div class="card-footer text-white bg-dark">
                            <div class="row justify-content-end mr-3">
                                <span class="btn btn-success btn-sm" id="registrar">Registrar</span>
                                <a href="index.php" class="btn btn-danger btn-sm ml-2">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>