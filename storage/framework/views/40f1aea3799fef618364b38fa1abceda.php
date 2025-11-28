<?php $__env->startSection('title', 'Lista de Tareas'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Lista de Tareas</h1>

    <form method="POST" action="<?php echo e(route('exercise1.agregar')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <input type="text" name="descripcion" placeholder="Nueva tarea..." required>
        </div>
        <button type="submit">Agregar Tarea</button>
    </form>

    <br>

    <?php if(empty($tareas)): ?>
        <div class="sin-tareas">No hay tareas. ¡Agrega una nueva!</div>
    <?php else: ?>
        <?php $__currentLoopData = $tareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="tarea-item <?php echo e($tarea['completada'] ? 'completada' : ''); ?>">
                <span class="tarea-texto"><?php echo e($tarea['descripcion']); ?></span>
                
                <div class="tarea-acciones">
                    <form method="POST" action="<?php echo e(route('exercise1.completar')); ?>" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($tarea['id']); ?>">
                        <button type="submit" class="btn-completar">
                            <?php echo e($tarea['completada'] ? 'Desmarcar' : 'Completar'); ?>

                        </button>
                    </form>
                    
                    <form method="POST" action="<?php echo e(route('exercise1.eliminar')); ?>" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($tarea['id']); ?>">
                        <button type="submit" class="btn-eliminar">Eliminar</button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <a href="<?php echo e(route('home')); ?>">
        <button class="btn-volver">Volver al Menú</button>
    </a>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/kevinvilla/Downloads/trabajo/ejercicios-mvc-laravel/resources/views/exercise1/index.blade.php ENDPATH**/ ?>