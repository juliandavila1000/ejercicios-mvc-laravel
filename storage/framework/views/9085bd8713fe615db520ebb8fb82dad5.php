<?php $__env->startSection('title', 'Plataforma de Encuestas'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Plataforma de Encuestas</h1>
    
    <div class="card">
        <a href="<?php echo e(route('exercise10.crear')); ?>"><button>Crear Nueva Encuesta</button></a>
    </div>
    
    <div class="card">
        <h2>Encuestas Disponibles</h2>
        <?php if(empty($encuestas)): ?>
            <p>No hay encuestas. ¡Crea una nueva!</p>
        <?php else: ?>
            <div class="encuestas-lista">
                <?php $__currentLoopData = $encuestas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $encuesta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="encuesta-item">
                        <div class="encuesta-titulo"><?php echo e($encuesta['titulo']); ?></div>
                        <p>Preguntas: <?php echo e(count($encuesta['preguntas'])); ?> | Respuestas: <?php echo e(count($encuesta['respuestas'])); ?></p>
                        <div class="encuesta-acciones">
                            <a href="<?php echo e(route('exercise10.responder', ['id' => $encuesta['id']])); ?>">
                                <button>Responder</button>
                            </a>
                            <a href="<?php echo e(route('exercise10.resultados', ['id' => $encuesta['id']])); ?>">
                                <button>Resultados</button>
                            </a>
                            <form method="POST" action="<?php echo e(route('exercise10.eliminar')); ?>" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($encuesta['id']); ?>">
                                <button type="submit" class="btn-eliminar">Eliminar</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
    
    <a href="<?php echo e(route('home')); ?>"><button class="btn-volver">Volver al Menú</button></a>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/kevinvilla/Downloads/trabajo/ejercicios-mvc-laravel/resources/views/exercise10/index.blade.php ENDPATH**/ ?>