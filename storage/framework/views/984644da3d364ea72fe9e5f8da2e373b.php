<?php $__env->startSection('title', 'Resultados de Encuesta'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Resultados: <?php echo e($encuesta['titulo'] ?? 'Encuesta no encontrada'); ?></h1>
    
    <?php if($encuesta && $resultados): ?>
        <p>Total de respuestas: <?php echo e(count($encuesta['respuestas'])); ?></p>
        
        <?php $__currentLoopData = $resultados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $resultado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
                <h3><?php echo e($index + 1); ?>. <?php echo e($resultado['pregunta']); ?></h3>
                
                <?php if(empty($resultado['opciones'])): ?>
                    <p>No hay respuestas para esta pregunta.</p>
                <?php else: ?>
                    <?php $__currentLoopData = $resultado['opciones']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opcion => $cantidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="opcion-resultado">
                            <strong><?php echo e($opcion); ?></strong>: <?php echo e($cantidad); ?> respuesta(s)
                            <?php
                                $total = count($encuesta['respuestas']);
                                $porcentaje = $total > 0 ? ($cantidad / $total) * 100 : 0;
                            ?>
                            <div class="barra" style="width: <?php echo e($porcentaje); ?>%"><?php echo e(number_format($porcentaje, 1)); ?>%</div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <p class="sin-tareas">La encuesta no existe o no hay resultados.</p>
    <?php endif; ?>
    
    <a href="<?php echo e(route('exercise10.index')); ?>"><button class="btn-volver">Volver</button></a>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/kevinvilla/Downloads/trabajo/ejercicios-mvc-laravel/resources/views/exercise10/resultados.blade.php ENDPATH**/ ?>