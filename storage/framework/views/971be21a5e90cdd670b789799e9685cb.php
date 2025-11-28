<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Ejercicios MVC Laravel'); ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #495057;
            background-color: #F8F9FA;
            padding: 24px;
        }

        h1, h2, h3, h4, h5, h6 {
            color: #1E3A5F;
            margin-bottom: 16px;
            font-weight: 600;
            line-height: 1.2;
        }

        h1 {
            font-size: 28px;
            padding-bottom: 12px;
            margin-bottom: 24px;
        }

        h2 {
            font-size: 22px;
            margin-top: 24px;
        }

        h3 {
            font-size: 18px;
            color: #495057;
        }

        p {
            margin-bottom: 16px;
            color: #6C757D;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #FFFFFF;
            padding: 32px;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .card {
            background-color: #FFFFFF;
            border: 1px solid #DEE2E6;
            border-radius: 6px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            font-weight: 500;
            color: #495057;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        input[type="time"],
        input[type="password"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #DEE2E6;
            border-radius: 6px;
            font-size: 15px;
            font-family: inherit;
            color: #495057;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #2E5C8A;
            box-shadow: 0 0 0 3px rgba(46, 92, 138, 0.1);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .checkbox-group {
            margin-bottom: 12px;
        }

        .checkbox-group label {
            display: inline-flex;
            align-items: center;
            font-weight: 400;
            cursor: pointer;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
            margin-right: 8px;
        }

        button,
        .btn {
            display: inline-block;
            padding: 12px 24px;
            font-size: 15px;
            font-weight: 500;
            font-family: inherit;
            text-align: center;
            text-decoration: none;
            color: #FFFFFF;
            background-color: #2E5C8A;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.1s;
        }

        button:hover,
        .btn:hover {
            background-color: #1E3A5F;
            transform: translateY(-1px);
        }

        button:active,
        .btn:active {
            transform: translateY(0);
        }

        .btn-completar,
        button[type="submit"].btn-completar {
            background-color: #5A8C6F;
        }

        .btn-completar:hover {
            background-color: #4A7A5D;
        }

        .btn-eliminar {
            background-color: #B85450;
        }

        .btn-eliminar:hover {
            background-color: #9A3E3B;
        }

        .btn-cancelar {
            background-color: #C9A65C;
        }

        .btn-cancelar:hover {
            background-color: #B4954F;
        }

        .btn-volver {
            background-color: #6C757D;
            margin-top: 24px;
        }

        .btn-volver:hover {
            background-color: #495057;
        }

        .btn-copiar {
            background-color: #4A90E2;
        }

        .btn-copiar:hover {
            background-color: #2E5C8A;
        }

        .tarea-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px;
            margin-bottom: 12px;
            background-color: #F8F9FA;
            border: 1px solid #DEE2E6;
            border-radius: 6px;
            transition: background-color 0.2s;
        }

        .tarea-item:hover {
            background-color: #E9ECEF;
        }

        .tarea-item.completada {
            opacity: 0.7;
            background-color: #E8F4F1;
        }

        .tarea-item.completada .tarea-texto {
            text-decoration: line-through;
            color: #6C757D;
        }

        .tarea-texto {
            flex: 1;
            font-size: 15px;
            color: #495057;
        }

        .tarea-acciones {
            display: flex;
            gap: 8px;
        }

        .tarea-acciones button {
            padding: 8px 16px;
            font-size: 14px;
        }

        .sin-tareas {
            text-align: center;
            padding: 32px;
            color: #6C757D;
            font-style: italic;
        }

        .resultado {
            background-color: #F8F9FA;
            border: 1px solid #DEE2E6;
            border-radius: 6px;
            padding: 24px;
            margin-top: 24px;
        }

        .resultado h3 {
            color: #2E5C8A;
            margin-bottom: 16px;
        }

        .resultado-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #DEE2E6;
        }

        .resultado-item:last-child {
            border-bottom: none;
            font-weight: 600;
        }

        .password-result {
            background-color: #F8F9FA;
            border: 2px solid #2E5C8A;
            border-radius: 6px;
            padding: 24px;
            margin-top: 24px;
            text-align: center;
        }

        .password-display {
            font-family: 'Courier New', monospace;
            font-size: 20px;
            background-color: #FFFFFF;
            padding: 16px;
            border: 1px solid #DEE2E6;
            border-radius: 6px;
            margin: 16px 0;
            word-break: break-all;
            color: #1E3A5F;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 16px 0;
        }

        thead {
            background-color: #2E5C8A;
            color: #FFFFFF;
        }

        th {
            padding: 16px;
            text-align: left;
            font-weight: 600;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #DEE2E6;
        }

        tbody tr:hover {
            background-color: #F8F9FA;
        }

        .resumen {
            background-color: #FFFFFF;
            border: 1px solid #DEE2E6;
            border-radius: 6px;
            padding: 16px;
        }

        .resumen-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #DEE2E6;
        }

        .resumen-item:last-child {
            border-bottom: none;
        }

        .resumen-item.total {
            font-weight: 600;
            font-size: 18px;
            color: #2E5C8A;
            border-top: 2px solid #2E5C8A;
            padding-top: 16px;
            margin-top: 12px;
        }

        .notas-grid,
        .recetas-grid,
        .encuestas-lista {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 16px;
            margin-top: 16px;
        }

        .nota-card,
        .receta-card,
        .encuesta-item,
        .evento-item {
            background-color: #FFFFFF;
            border: 1px solid #DEE2E6;
            border-radius: 6px;
            padding: 16px;
            transition: box-shadow 0.2s, transform 0.2s;
        }

        .nota-card:hover,
        .receta-card:hover,
        .encuesta-item:hover,
        .evento-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .nota-titulo,
        .receta-nombre,
        .encuesta-titulo {
            font-size: 18px;
            font-weight: 600;
            color: #1E3A5F;
            margin-bottom: 12px;
        }

        .nota-contenido,
        .receta-seccion {
            color: #6C757D;
            margin-bottom: 12px;
        }

        .nota-meta {
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            color: #6C757D;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid #DEE2E6;
        }

        .receta-tipo {
            display: inline-block;
            background-color: #2E5C8A;
            color: #FFFFFF;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            margin-bottom: 12px;
        }

        .navegacion {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .calendario {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
            margin-top: 16px;
        }

        .dia-semana {
            background-color: #2E5C8A;
            color: #FFFFFF;
            text-align: center;
            padding: 12px;
            font-weight: 600;
            font-size: 14px;
        }

        .dia {
            background-color: #FFFFFF;
            border: 1px solid #DEE2E6;
            min-height: 80px;
            padding: 8px;
            transition: background-color 0.2s;
        }

        .dia:hover {
            background-color: #F8F9FA;
        }

        .dia.otro-mes {
            background-color: #F8F9FA;
            opacity: 0.5;
        }

        .dia-numero {
            font-weight: 600;
            color: #495057;
            margin-bottom: 4px;
        }

        .evento {
            font-size: 11px;
            background-color: #4A90E2;
            color: #FFFFFF;
            padding: 2px 4px;
            border-radius: 3px;
            margin-bottom: 2px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .eventos-lista {
            margin-top: 16px;
        }

        .disponibilidad {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 16px;
        }

        .slot {
            padding: 12px;
            border-radius: 6px;
            text-align: center;
            min-width: 80px;
        }

        .slot.disponible {
            background-color: #E8F4F1;
            border: 1px solid #5A8C6F;
            color: #5A8C6F;
        }

        .slot.ocupado {
            background-color: #F8E9E9;
            border: 1px solid #B85450;
            color: #B85450;
        }

        .controles {
            display: flex;
            gap: 16px;
            margin-bottom: 16px;
            align-items: center;
        }

        .controles select {
            flex: 1;
        }

        .estadisticas {
            display: flex;
            justify-content: space-around;
            background-color: #F8F9FA;
            padding: 16px;
            border-radius: 6px;
            margin-bottom: 16px;
            font-weight: 600;
            color: #1E3A5F;
        }

        .tablero {
            display: grid;
            gap: 12px;
            margin: 24px auto;
            max-width: 600px;
        }

        .tablero.facil {
            grid-template-columns: repeat(4, 1fr);
        }

        .tablero.medio {
            grid-template-columns: repeat(4, 1fr);
        }

        .tablero.dificil {
            grid-template-columns: repeat(4, 1fr);
        }

        .carta {
            aspect-ratio: 1;
            background-color: #2E5C8A;
            color: #FFFFFF;
            border: 2px solid #1E3A5F;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.2s;
        }

        .carta:hover {
            transform: scale(1.05);
        }

        .carta.revelada {
            background-color: #FFFFFF;
            border-color: #2E5C8A;
        }

        .carta.emparejada {
            background-color: #5A8C6F;
            border-color: #5A8C6F;
        }

        .cronometro {
            font-family: 'Courier New', monospace;
            font-size: 48px;
            text-align: center;
            background-color: #F8F9FA;
            padding: 32px;
            border-radius: 6px;
            margin: 24px 0;
            color: #1E3A5F;
            border: 2px solid #2E5C8A;
        }

        .vueltas {
            background-color: #FFFFFF;
            border: 1px solid #DEE2E6;
            border-radius: 6px;
            padding: 24px;
            margin-top: 24px;
        }

        .vuelta-item {
            padding: 12px;
            border-bottom: 1px solid #DEE2E6;
            font-family: 'Courier New', monospace;
        }

        .vuelta-item:last-child {
            border-bottom: none;
        }

        .encuesta-acciones {
            display: flex;
            gap: 12px;
            margin-top: 16px;
        }

        .encuesta-acciones button {
            flex: 1;
        }

        .pregunta-item {
            margin-bottom: 16px;
            padding: 16px;
            background-color: #F8F9FA;
            border-radius: 6px;
        }

        .opcion-resultado {
            margin-bottom: 16px;
        }

        .barra {
            background-color: #2E5C8A;
            color: #FFFFFF;
            padding: 4px 12px;
            border-radius: 6px;
            text-align: right;
            font-weight: 600;
            font-size: 14px;
            transition: width 0.3s;
        }

        .mensaje {
            padding: 16px;
            border-radius: 6px;
            margin-bottom: 16px;
        }

        .mensaje.exito {
            background-color: #E8F4F1;
            border: 1px solid #5A8C6F;
            color: #5A8C6F;
        }

        .mensaje.error {
            background-color: #F8E9E9;
            border: 1px solid #B85450;
            color: #B85450;
        }

        .filtros {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
        }

        .filtros input,
        .filtros select {
            flex: 1;
        }

        @media (max-width: 768px) {
            .container {
                padding: 16px;
            }
            
            .notas-grid,
            .recetas-grid {
                grid-template-columns: 1fr;
            }
            
            .calendario {
                gap: 2px;
            }
            
            .dia {
                min-height: 60px;
                font-size: 12px;
            }
            
            .cronometro {
                font-size: 32px;
            }
            
            .tarea-item {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .tarea-acciones {
                margin-top: 12px;
                width: 100%;
            }
            
            .tarea-acciones button {
                flex: 1;
            }
        }

        .text-center {
            text-align: center;
        }

        .mt-lg {
            margin-top: 24px;
        }

        .mb-lg {
            margin-bottom: 24px;
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>

<?php /**PATH /Users/kevinvilla/Downloads/trabajo/ejercicios-mvc-laravel/resources/views/layouts/app.blade.php ENDPATH**/ ?>