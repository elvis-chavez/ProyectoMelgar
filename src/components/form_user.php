<?php
$isEdit = isset($this->d['get_user']);
$action = $isEdit ? "/ProyectoMelgar/users/update" : "/ProyectoMelgar/users/register";
$buttonText = $isEdit ? "Actualizar usuario" : "Ingresar usuario al sistema";
$user_data = $isEdit ? $this->d['get_user'] : null;
?>

<div class="form-user" id="form-user">
    <form action="<?php echo $action ?>" method="POST">
        <?php if ($isEdit): ?>
            <input type="hidden" name="id" value="<?php echo $user_data->getId(); ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label class="form-label">Usuario</label>
            <input
                type="text"
                class="form-control"
                id="username"
                name="username"
                placeholder="Ingrese el nombre del Usuario"
                value="<?php echo $isEdit ? $user_data->getUsername() : ''; ?>"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">Apellido</label>
            <input
                type="text"
                class="form-control"
                id="lastname"
                name="lastname"
                placeholder="Ingrese el apellido del Usuario"
                value="<?php echo $isEdit ? $user_data->getLastname() : ''; ?>"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input
                type="text"
                class="form-control"
                id="password"
                name="password"
                placeholder="Ingrese la contraseña del Usuario"
                value="<?php echo $isEdit ? $user_data->getPassword() : ''; ?>"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Ingrese el email del Usuario"
                value="<?php echo $isEdit ? $user_data->getEmail() : ''; ?>"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">Teléfono</label>
            <input
                type="text"
                class="form-control"
                id="phone"
                name="phone"
                placeholder="Ingrese el teléfono del Usuario"
                value="<?php echo $isEdit ? $user_data->getPhone() : ''; ?>"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de nacimiento</label>
            <input
                type="text"
                class="form-control"
                id="birthdate"
                name="birthdate"
                placeholder="Ingrese la fecha de nacimiento del Usuario"
                value="<?php echo $isEdit ? $user_data->getBirthdate() : ''; ?>"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">Rol</label>
            <input
                type="text"
                class="form-control"
                id="role"
                name="role"
                placeholder="Ingrese el rol del Usuario"
                value="<?php echo $isEdit ? $user_data->getRoleId() : ''; ?>"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">Activo</label>
            <input
                type="text"
                class="form-control"
                id="active"
                name="active"
                placeholder="Ingrese 1 para activar o 0 para desactivar el Usuario"
                value="<?php echo $isEdit ? $user_data->getActive() : ''; ?>"
                required>
        </div>
        <button type="submit" class="btn btn-primary"><?php echo $buttonText ?></button>
    </form>
</div>