<?php $__env->startSection('title', 'Responder Encuesta'); ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($encuesta['titulo'] ?? 'Encuesta no encontrada'); ?></h1>
    
    <?php if($encuesta): ?>
        <form method="POST" action="<?php echo e(route('exercise10.responder', ['id' => $encuesta['id']])); ?>">
            <?php echo csrf_field(); ?>
            <?php $__currentLoopData = $encuesta['preguntas']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pregunta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="pregunta-item">
                    <label><strong><?php echo e($index + 1); ?>. <?php echo e($pregunta); ?></strong></label>
                    <input type="text" name="respuestas[<?php echo e($index); ?>]" required>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <button type="submit">Enviar Respuestas</button>
        </form>
    <?php else: ?>
        <p class="sin-tareas">La encuesta no existe.</p>
    <?php endif; ?>
    
    <a href="<?php echo e(route('exercise10.index')); ?>"><button class="btn-volver">Volver</button></a>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/kevinvilla/Downloads/trabajo/ejercicios-mvc-laravel/resources/views/exercise10/responder.blade.php ENDPATH**/ ?>