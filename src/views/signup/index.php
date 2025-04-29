<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
</head>
<body>
    <form action="/multiservicios-melgar2/register" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="lastname" placeholder="Lastname" required>
        <input type="text" name="password" placeholder="Password" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone" required>
        <input type="text" name="birthdate" placeholder="Birthdate" required>

        <button type="submit">Register</button>
    </form>
</body>
</html>