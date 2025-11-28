<?php $__env->startSection('title', 'Gestor de Notas'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Gestor de Notas</h1>

    <h2>Nueva Nota</h2>
    <form method="POST" action="<?php echo e(route('exercise6.crear')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
        </div>

        <div class="form-group">
            <label for="contenido">Contenido:</label>
            <textarea id="contenido" name="contenido" required></textarea>
        </div>

        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($cat !== 'Todas'): ?>
                        <option value="<?php echo e($cat); ?>"><?php echo e($cat); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <button type="submit">Crear Nota</button>
    </form>

    <h2>Buscar y Filtrar</h2>
    <form method="GET" action="<?php echo e(route('exercise6.index')); ?>" class="filtros">
        <select name="categoria">
            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cat); ?>" <?php echo e($categoria === $cat ? 'selected' : ''); ?>><?php echo e($cat); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        
        <input type="text" name="busqueda" placeholder="Buscar en título o contenido..." value="<?php echo e($busqueda); ?>">
        
        <button type="submit">Filtrar</button>
    </form>

    <h2>Mis Notas</h2>
    <?php if(empty($notas)): ?>
        <div class="sin-tareas">No hay notas que coincidan con tu búsqueda.</div>
    <?php else: ?>
        <div class="notas-grid">
            <?php $__currentLoopData = $notas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="nota-card">
                    <div class="nota-titulo"><?php echo e($nota['titulo']); ?></div>
                    <div class="nota-contenido"><?php echo e(substr($nota['contenido'], 0, 100)); ?><?php echo e(strlen($nota['contenido']) > 100 ? '...' : ''); ?></div>
                    <div class="nota-meta">
                        <span><?php echo e($nota['categoria']); ?></span>
                        <span><?php echo e(date('d/m/Y', strtotime($nota['fechaCreacion']))); ?></span>
                    </div>
                    <form method="POST" action="<?php echo e(route('exercise6.eliminar')); ?>" style="margin-top: 12px;">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($nota['id']); ?>">
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


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/kevinvilla/Downloads/trabajo/ejercicios-mvc-laravel/resources/views/exercise6/index.blade.php ENDPATH**/ ?>