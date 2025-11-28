<?php $__env->startSection('title', 'Gestor de Gastos'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Gestor de Gastos</h1>

    <h2>Agregar Nuevo Gasto</h2>
    <form method="POST" action="<?php echo e(route('exercise4.agregar')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="monto">Monto ($):</label>
            <input type="number" id="monto" name="monto" step="0.01" min="0" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" required>
        </div>

        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="Alimentación">Alimentación</option>
                <option value="Transporte">Transporte</option>
                <option value="Vivienda">Vivienda</option>
                <option value="Entretenimiento">Entretenimiento</option>
                <option value="Salud">Salud</option>
                <option value="Educación">Educación</option>
                <option value="Otros">Otros</option>
            </select>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" value="<?php echo e(date('Y-m-d')); ?>" required>
        </div>

        <button type="submit">Agregar Gasto</button>
    </form>

    <h2>Resumen del Mes Actual</h2>
    <div class="resumen">
        <?php if(!empty($resumen['porCategoria'])): ?>
            <?php $__currentLoopData = $resumen['porCategoria']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria => $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="resumen-item">
                    <span><?php echo e($categoria); ?></span>
                    <span>$<?php echo e(number_format($total, 2)); ?></span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="resumen-item total">
                <span>Total:</span>
                <span>$<?php echo e(number_format($resumen['total'], 2)); ?></span>
            </div>
        <?php else: ?>
            <p class="sin-tareas">No hay gastos registrados este mes.</p>
        <?php endif; ?>
    </div>

    <h2>Lista de Gastos</h2>
    <?php if(empty($gastos)): ?>
        <div class="sin-tareas">No hay gastos registrados. ¡Agrega uno nuevo!</div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Monto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = array_reverse($gastos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gasto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($gasto['fecha']); ?></td>
                        <td><?php echo e($gasto['descripcion']); ?></td>
                        <td><?php echo e($gasto['categoria']); ?></td>
                        <td>$<?php echo e(number_format($gasto['monto'], 2)); ?></td>
                        <td>
                            <form method="POST" action="<?php echo e(route('exercise4.eliminar')); ?>" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($gasto['id']); ?>">
                                <button type="submit" class="btn-eliminar">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>

    <a href="<?php echo e(route('home')); ?>">
        <button class="btn-volver">Volver al Menú</button>
    </a>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/kevinvilla/Downloads/trabajo/ejercicios-mvc-laravel/resources/views/exercise4/index.blade.php ENDPATH**/ ?>