<?php $__env->startSection('title', 'Sistema de Reservas'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Sistema de Reservas</h1>

    <?php if($mensaje === 'reservado'): ?>
        <div class="mensaje exito">¡Reserva realizada con éxito!</div>
    <?php elseif($mensaje === 'error'): ?>
        <div class="mensaje error">El horario seleccionado no está disponible. Por favor, elige otro.</div>
    <?php endif; ?>

    <h2>Nueva Reserva</h2>
    <form method="POST" action="<?php echo e(route('exercise5.reservar')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" min="<?php echo e(date('Y-m-d')); ?>" required>
        </div>

        <div class="form-group">
            <label for="hora">Hora:</label>
            <select id="hora" name="hora" required>
                <?php $__currentLoopData = $disponibilidad[array_key_first($disponibilidad)] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hora => $disponible): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($hora); ?>"><?php echo e($hora); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre completo:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <button type="submit">Reservar</button>
    </form>

    <h2>Disponibilidad (Próximos 7 días)</h2>
    <?php $__currentLoopData = $disponibilidad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fecha => $horarios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <h3><?php echo e(date('l, d \d\e F \d\e Y', strtotime($fecha))); ?></h3>
        <div class="disponibilidad">
            <?php $__currentLoopData = $horarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hora => $disponible): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="slot <?php echo e($disponible ? 'disponible' : 'ocupado'); ?>">
                    <?php echo e($hora); ?><br>
                    <small><?php echo e($disponible ? 'Disponible' : 'Ocupado'); ?></small>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <h2>Mis Reservas</h2>
    <?php if(empty($reservas)): ?>
        <div class="sin-tareas">No tienes reservas registradas.</div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = array_reverse($reservas); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserva): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($reserva['fecha']); ?></td>
                        <td><?php echo e($reserva['hora']); ?></td>
                        <td><?php echo e($reserva['nombre']); ?></td>
                        <td><?php echo e($reserva['email']); ?></td>
                        <td>
                            <?php if($reserva['cancelada']): ?>
                                <span style="color: #B85450;">Cancelada</span>
                            <?php else: ?>
                                <span style="color: #5A8C6F;">Activa</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(!$reserva['cancelada']): ?>
                                <form method="POST" action="<?php echo e(route('exercise5.cancelar')); ?>" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($reserva['id']); ?>">
                                    <button type="submit" class="btn-cancelar">Cancelar</button>
                                </form>
                            <?php endif; ?>
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


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/kevinvilla/Downloads/trabajo/ejercicios-mvc-laravel/resources/views/exercise5/index.blade.php ENDPATH**/ ?>