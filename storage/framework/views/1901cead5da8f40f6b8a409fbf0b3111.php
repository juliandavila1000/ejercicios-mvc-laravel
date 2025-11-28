<?php $__env->startSection('title', 'Calculadora de Propinas'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Calculadora de Propinas</h1>

    <form method="POST" action="<?php echo e(route('exercise2.index')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="monto">Monto de la cuenta ($):</label>
            <input type="number" id="monto" name="monto" step="0.01" min="0" required value="<?php echo e(old('monto', $resultado['monto'] ?? '')); ?>">
        </div>

        <div class="form-group">
            <label for="porcentaje">Porcentaje de propina (%):</label>
            <input type="number" id="porcentaje" name="porcentaje" step="1" min="0" max="100" required value="<?php echo e(old('porcentaje', $resultado['porcentaje'] ?? '')); ?>">
        </div>

        <button type="submit">Calcular</button>
    </form>

    <?php if($resultado): ?>
        <div class="resultado">
            <h3>Resultado</h3>
            <div class="resultado-item">
                <span>Monto de la cuenta:</span>
                <span>$<?php echo e(number_format($resultado['monto'], 2)); ?></span>
            </div>
            <div class="resultado-item">
                <span>Porcentaje de propina:</span>
                <span><?php echo e($resultado['porcentaje']); ?>%</span>
            </div>
            <div class="resultado-item">
                <span>Propina:</span>
                <span>$<?php echo e(number_format($resultado['propina'], 2)); ?></span>
            </div>
            <div class="resultado-item">
                <span><strong>Total a pagar:</strong></span>
                <span><strong>$<?php echo e(number_format($resultado['total'], 2)); ?></strong></span>
            </div>
        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('home')); ?>">
        <button class="btn-volver">Volver al Menú</button>
    </a>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/kevinvilla/Downloads/trabajo/ejercicios-mvc-laravel/resources/views/exercise2/index.blade.php ENDPATH**/ ?>