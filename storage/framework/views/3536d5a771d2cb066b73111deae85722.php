<?php $__env->startSection('title', 'Plataforma de Recetas'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Plataforma de Recetas</h1>

    <h2>Nueva Receta</h2>
    <form method="POST" action="<?php echo e(route('exercise8.crear')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="nombre">Nombre de la receta:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo" required>
                <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($t !== 'Todos'): ?>
                        <option value="<?php echo e($t); ?>"><?php echo e($t); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group">
            <label for="ingredientes">Ingredientes:</label>
            <textarea id="ingredientes" name="ingredientes" required placeholder="Lista los ingredientes separados por comas o líneas"></textarea>
        </div>

        <div class="form-group">
            <label for="instrucciones">Instrucciones:</label>
            <textarea id="instrucciones" name="instrucciones" required placeholder="Escribe el paso a paso de la receta"></textarea>
        </div>

        <button type="submit">Guardar Receta</button>
    </form>

    <h2>Buscar Recetas</h2>
    <form method="GET" action="<?php echo e(route('exercise8.index')); ?>" class="filtros">
        <select name="tipo">
            <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($t); ?>" <?php echo e($tipo === $t ? 'selected' : ''); ?>><?php echo e($t); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        
        <input type="text" name="ingrediente" placeholder="Buscar por ingrediente..." value="<?php echo e($ingrediente); ?>">
        
        <button type="submit">Filtrar</button>
    </form>

    <h2>Mis Recetas</h2>
    <?php if(empty($recetas)): ?>
        <div class="sin-tareas">No hay recetas que coincidan con tu búsqueda.</div>
    <?php else: ?>
        <div class="recetas-grid">
            <?php $__currentLoopData = $recetas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="receta-card">
                    <span class="receta-tipo"><?php echo e($receta['tipo']); ?></span>
                    <div class="receta-nombre"><?php echo e($receta['nombre']); ?></div>
                    
                    <div class="receta-seccion">
                        <strong>Ingredientes:</strong>
                        <p><?php echo e(substr($receta['ingredientes'], 0, 100)); ?><?php echo e(strlen($receta['ingredientes']) > 100 ? '...' : ''); ?></p>
                    </div>
                    
                    <div class="receta-seccion">
                        <strong>Instrucciones:</strong>
                        <p><?php echo e(substr($receta['instrucciones'], 0, 100)); ?><?php echo e(strlen($receta['instrucciones']) > 100 ? '...' : ''); ?></p>
                    </div>
                    
                    <form method="POST" action="<?php echo e(route('exercise8.eliminar')); ?>" style="margin-top: 12px;">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($receta['id']); ?>">
                        <button type="submit" class="btn-eliminar" style="width: 100%;">Eliminar</button>
                    </form>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('home')); ?>">
        <button class="btn-volver">Volver al Menú</button>
    </a>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/kevinvilla/Downloads/trabajo/ejercicios-mvc-laravel/resources/views/exercise8/index.blade.php ENDPATH**/ ?>