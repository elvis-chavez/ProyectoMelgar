<?php
// Valores por defecto
$isEdit = isset($this->d['provider']);
$action = $isEdit ? "/ProyectoMelgar/provider/update" : "/ProyectoMelgar/provider/register";
$buttonText = $isEdit ? "Actualizar proveedor" : "Ingresar proveedor al sistema";
$provider = $isEdit ? $this->d['provider'] : null;
?>

<div class="form-provider" id="form-provider">
    <form action="<?php echo $action ?>" method="POST">
        <?php if ($isEdit): ?>
            <input type="hidden" name="id" value="<?php echo $provider->getId(); ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label class="form-label">Proveedor</label>
            <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                placeholder="Ingrese el nombre del Proveedor"
                value="<?php echo $isEdit ? $provider->getName() : ''; ?>"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contacto</label>
            <input
                type="text"
                class="form-control"
                id="contact"
                name="contact"
                placeholder="Ingrese un número de Contacto"
                value="<?php echo $isEdit ? $provider->getContact() : ''; ?>"
                required>
        </div>
        <button type="submit" class="btn btn-primary"><?php echo $buttonText ?></button>
    </form>
</div>