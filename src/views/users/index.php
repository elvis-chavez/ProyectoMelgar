<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <?php
        $user = $this->d['user'];
        $users = $this->d['users'];
    ?>

    <?php require_once 'src/components/menu.php' ?>

    <div class="container">
        <h1>Usuario <?php echo $this->d['user']->getUsername(); ?></h1>
        <h2>Lista de Usuarios</h2>
        <a href="/ProyectoMelgar/users/form" class="btn btn-primary">Ingresar nuevo Usuario al Sistema</a>
        <?php ?>
        <div class="">
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Rol</th>
                    <th>Activo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    <?php
                        foreach ($users as $u) {
                    ?>
                        <tr>
                            <td><?php echo $u->getId(); ?></td>
                            <td><?php echo $u->getUsername(); ?></td>
                            <td><?php echo $u->getLastname(); ?></td>
                            <td><?php echo $u->getEmail(); ?></td>
                            <td><?php echo $u->getPhone(); ?></td>
                            <td><?php echo $u->getBirthdate(); ?></td>
                            <td><?php echo $u->getRoleId(); ?></td>
                            <td><?php echo $u->getActive(); ?></td>
                            <td>
                                <a href="/ProyectoMelgar/users/edit/<?php echo $u->getId(); ?>" class="btn btn-warning">Editar</a>
                            </td>
                            <td>
                                <a href="/ProyectoMelgar/users/delete/<?php echo $u->getId(); ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php        
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>