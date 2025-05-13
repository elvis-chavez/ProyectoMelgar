<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <div class="container w-25 mt-5">
        <h2>Login</h2>
        
        <form action="/ProyectoMelgar/auth" method="POST">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de Usuario">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Contraseña del Usuario">
            </div>
            <div class="mb-3">
                <a href="/ProyectoMelgar/signup" class="link-primary">¿Todavía no tienes una cuenta? Crea una nueva aquí</a>
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>