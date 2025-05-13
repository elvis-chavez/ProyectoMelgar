<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    <?php
        $user = $this->d['user'];
        $roles = $this->d['roles'];
    ?>

    <?php require_once 'src/components/menu.php' ?>

    <div class="container">
        <h1>Usuario <?php echo $this->d['user']->getUsername(); ?></h1>
        <h2>Lista de Roles</h2>
        <a href="/ProyectoMelgar/role/form" class="btn btn-primary">Ingresar nuevo Rol al Sistema</a>
        
        <div class="">
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Tipo</th>
                    <th>Editar</th>
                </thead>
                <tbody>
                    <?php
                        foreach ($roles as $r) {
                    ?>
                        <tr>
                            <td><?php echo $r->getId(); ?></td>
                            <td><?php echo $r->getType(); ?></td>
                            <td>
                                <a href="/ProyectoMelgar/role/edit/<?php echo $r->getId(); ?>" class="btn btn-warning">Editar</a>
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