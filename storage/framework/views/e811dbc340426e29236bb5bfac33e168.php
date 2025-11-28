<?php $__env->startSection('title', 'Generador de Contraseñas Seguras'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Generador de Contraseñas Seguras</h1>

    <form method="POST" action="<?php echo e(route('exercise3.index')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="longitud">Longitud de la contraseña (4-128):</label>
            <input type="number" id="longitud" name="longitud" min="4" max="128" value="<?php echo e(old('longitud', 12)); ?>" required>
        </div>

        <div class="checkbox-group">
            <label>
                <input type="checkbox" name="mayusculas" <?php echo e(old('mayusculas', true) ? 'checked' : ''); ?>>
                Incluir mayúsculas (A-Z)
            </label>
        </div>

        <div class="checkbox-group">
            <label>
                <input type="checkbox" name="minusculas" <?php echo e(old('minusculas', true) ? 'checked' : ''); ?>>
                Incluir minúsculas (a-z)
            </label>
        </div>

        <div class="checkbox-group">
            <label>
                <input type="checkbox" name="numeros" <?php echo e(old('numeros', true) ? 'checked' : ''); ?>>
                Incluir números (0-9)
            </label>
        </div>

        <div class="checkbox-group">
            <label>
                <input type="checkbox" name="especiales" <?php echo e(old('especiales', true) ? 'checked' : ''); ?>>
                Incluir caracteres especiales (!@#$...)
            </label>
        </div>

        <button type="submit">Generar Contraseña</button>
    </form>

    <?php if($password): ?>
        <div class="password-result">
            <h3>Tu contraseña generada:</h3>
            <div class="password-display" id="password"><?php echo e($password); ?></div>
            <button class="btn-copiar" onclick="copiarPassword()">Copiar al portapapeles</button>
        </div>
    <?php elseif($password === null && request()->isMethod('post')): ?>
        <div class="mensaje error">
            Por favor, selecciona al menos un tipo de carácter y una longitud válida (4-128).
        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('home')); ?>">
        <button class="btn-volver">Volver al Menú</button>
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
function copiarPassword() {
    const passwordElement = document.getElementById('password');
    const text = passwordElement.textContent;
    
    navigator.clipboard.writeText(text).then(() => {
        alert('Contraseña copiada al portapapeles');
    }).catch(() => {
        alert('Error al copiar la contraseña');
    });
}
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/kevinvilla/Downloads/trabajo/ejercicios-mvc-laravel/resources/views/exercise3/index.blade.php ENDPATH**/ ?>