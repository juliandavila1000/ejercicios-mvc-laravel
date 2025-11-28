<?php $__env->startSection('title', 'Crear Encuesta'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Crear Nueva Encuesta</h1>
    
    <form method="POST" action="<?php echo e(route('exercise10.crear')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="titulo">Título de la Encuesta:</label>
            <input type="text" id="titulo" name="titulo" required>
        </div>
        
        <h3>Preguntas</h3>
        <div id="preguntas-container">
            <div class="form-group">
                <label>Pregunta 1:</label>
                <input type="text" name="preguntas[]" required>
            </div>
        </div>
        
        <button type="button" onclick="agregarPregunta()">Agregar Pregunta</button>
        <button type="submit">Crear Encuesta</button>
    </form>
    
    <a href="<?php echo e(route('exercise10.index')); ?>"><button class="btn-volver">Volver</button></a>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    let numeroPregunta = 1;
    
    function agregarPregunta() {
        numeroPregunta++;
        const container = document.getElementById('preguntas-container');
        const div = document.createElement('div');
        div.className = 'form-group';
        div.innerHTML = `
            <label>Pregunta ${numeroPregunta}:</label>
            <input type="text" name="preguntas[]" required>
        `;
        container.appendChild(div);
    }
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/kevinvilla/Downloads/trabajo/ejercicios-mvc-laravel/resources/views/exercise10/crear.blade.php ENDPATH**/ ?>