<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    

<div class=" text-center">
    <h1>Registro</h1>
    <div class="row text-start">
        <form action="../Controlador/controlador_registro.php" method="POST">
            <div class=" col-sm-6 offset-sm-3">
                <label for="exampleFormControlInput1" class="form-label">Usuario</label>
                <input class="form-control" type="text" name="usuario" required>
            </div>

            <div class=" col-sm-6 offset-sm-3">
                <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                <input class="form-control" type="email" name="email"  required >
            </div>

            <div class=" col-sm-6 offset-sm-3">
                <label for="exampleFormControlTextarea1" class="form-label">Contrasena</label>
                <input class="form-control" type="password" name="contrasena"  required>
            </div>

            <div class=" col-sm-6 offset-sm-3">
                <button type="submit" class="btn btn-outline-success" name="registrar">Registrar usuario nuevo</button>
            </div>
        </form>

    </div>

    <div class="row text-end">
        <div class="col-sm-6 offset-sm-3">
            <a href="./login.php" class="btn btn-outline-primary">Login</a> 
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>