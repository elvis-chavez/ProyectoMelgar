<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h1>Login</h1>
    <form action="/multiservicios-melgar2/auth" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="password" placeholder="Password" required>

        <input type="submit" value="Ingresar">
    </form>
</body>
</html>