<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    </head>
<body>
    <div class=" text-center">
        <h1>Login</h1>
        <div class="row text-start">
            <form action="../Controlador/controlador_login.php" method="POST"> 
                <div class=" col-sm-6 offset-sm-3">
                    <label for="exampleFormControlInput1" class="form-label">Usuario</label>
                    <input class="form-control" type="text" name="usuario" class="form-control" >
                </div>
                <div class=" col-sm-6 offset-sm-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Contrasena</label>
                    <input class="form-control" type="password" name="password" >
                </div>
                <div class=" col-sm-6 offset-sm-3">
                    <button type="submit" class="btn btn-outline-success" name="login_usuario">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>