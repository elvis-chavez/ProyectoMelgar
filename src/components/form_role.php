<?php
// Valores por defecto
$isEdit = isset($this->d['role']);
$action = $isEdit ? "/ProyectoMelgar/role/update" : "/ProyectoMelgar/role/register";
$buttonText = $isEdit ? "Actualizar rol" : "Ingresar rol al sistema";
$role = $isEdit ? $this->d['role'] : null;
?>

<div class="form-role" id="form-role">
    <form action="<?php echo $action ?>" method="POST">
        <?php if ($isEdit): ?>
            <input type="hidden" name="role_id" value="<?php echo $role->getId(); ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <input
                type="text"
                class="form-control"
                id="role_type"
                name="role_type"
                placeholder="Ingrese el nombre del Rol"
                value="<?php echo $isEdit ? $role->getType() : ''; ?>"
                required>
        </div>
        <button type="submit" class="btn btn-primary"><?php echo $buttonText ?></button>
    </form>
</div>