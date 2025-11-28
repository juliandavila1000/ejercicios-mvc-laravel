# Ejercicios MVC en Laravel

11 ejercicios prácticos implementados con el patrón **MVC (Modelo-Vista-Controlador)** en **Laravel**.

**Autor Original:** Julian Alberto Davila Machado  

---

## Instalación y Ejecución

### Requisitos

- **PHP 8.2 o superior**
- **Composer**

### Paso 1: Navegar al Proyecto

```bash
cd ejercicios-mvc-laravel
```

### Paso 2: Instalar Dependencias

```bash
composer install
```

### Paso 3: Configurar el Entorno

```bash
php artisan key:generate
```

### Paso 4: Iniciar el Servidor

```bash
php artisan serve
```

### Paso 5: Abrir en el Navegador

Visita: **[http://localhost:8000](http://localhost:8000)**

---

## Lista de Ejercicios

1. **Lista de Tareas** - Agregar, eliminar y marcar tareas como completadas
2. **Calculadora de Propinas** - Calcular propinas automáticamente
3. **Generador de Contraseñas** - Generar contraseñas seguras aleatorias
4. **Gestor de Gastos** - Registrar y categorizar gastos mensuales
5. **Sistema de Reservas** - Reservar citas con disponibilidad en tiempo real
6. **Gestor de Notas** - Crear notas con categorías y búsqueda
7. **Calendario de Eventos** - Agregar y gestionar eventos
8. **Plataforma de Recetas** - Buscar y filtrar recetas de cocina
9. **Juego de Memoria** - Juego con diferentes niveles de dificultad
10. **Plataforma de Encuestas** - Crear y responder encuestas
11. **Cronómetro Online** - Cronómetro con registro de vueltas

---

## Estructura del Proyecto

```
ejercicios-mvc-laravel/
├── app/
│   ├── Http/Controllers/        # Controladores
│   └── Models/                  # Modelos de lógica de negocio
├── resources/views/
│   ├── layouts/app.blade.php    # Layout principal con CSS embebido
│   ├── home.blade.php           # Página de inicio con menú
│   └── exercise1-11/            # Vistas de cada ejercicio
├── routes/web.php               # Configuración de rutas
└── README.md                    # Este archivo
```
