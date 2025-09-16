<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MuebleController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\CortinaController;
use App\Http\Controllers\AireAcondicionadoController;
use App\Http\Controllers\FocoController;

// Ruta de inicio
Route::get('/', function () {
    return view('welcome');
});

// Rutas para Docentes
Route::prefix('docentes')->group(function () {
    Route::get('/', [DocenteController::class, 'index'])->name('docentes.index');
    Route::get('/create', [DocenteController::class, 'create'])->name('docentes.create');
    Route::post('/', [DocenteController::class, 'store'])->name('docentes.store');
    Route::get('/{id}', [DocenteController::class, 'show'])->name('docentes.show');
    Route::get('/{id}/edit', [DocenteController::class, 'edit'])->name('docentes.edit');
    Route::put('/{id}', [DocenteController::class, 'update'])->name('docentes.update');
    Route::post('/{id}/iniciar', [DocenteController::class, 'iniciarClase'])->name('docentes.iniciar');
    Route::post('/{id}/finalizar', [DocenteController::class, 'finalizarClase'])->name('docentes.finalizar');
    Route::delete('/{id}', [DocenteController::class, 'destroy'])->name('docentes.destroy');
    
    // Ruta para poblar datos de prueba
    Route::post('/poblar-datos-prueba', [DocenteController::class, 'poblarDatosPrueba'])
        ->name('docentes.poblar-datos');
});

// Ruta de debug para probar la base de datos
Route::get('/debug-db', function () {
    try {
        $docentesCount = App\Models\Docente::count();
        $todosDocentes = App\Models\Docente::all();
        
        echo "<h1>Estado de la Base de Datos</h1>";
        echo "<p>Total de docentes en BD: <strong>{$docentesCount}</strong></p>";
        
        if ($docentesCount > 0) {
            echo "<h2>Docentes en BD:</h2>";
            echo "<pre>";
            print_r($todosDocentes->toArray());
            echo "</pre>";
        } else {
            echo "<p style='color: orange;'>⚠️ No hay docentes en la base de datos</p>";
        }
        
        // Verificar conexión
        echo "<h2>Configuración de BD:</h2>";
        echo "DB_HOST: " . env('DB_HOST') . "<br>";
        echo "DB_DATABASE: " . env('DB_DATABASE') . "<br>";
        echo "DB_USERNAME: " . env('DB_USERNAME') . "<br>";
        
    } catch (Exception $e) {
        echo "<h1 style='color: red;'>❌ Error de conexión</h1>";
        echo "<p><strong>Mensaje:</strong> " . $e->getMessage() . "</p>";
        echo "<p><strong>Verifica que:</strong></p>";
        echo "<ul>";
        echo "<li>MySQL esté ejecutándose</li>";
        echo "<li>Las credenciales en .env sean correctas</li>";
        echo "<li>La base de datos exista</li>";
        echo "</ul>";
    }
});

// Rutas para Materias
Route::prefix('materias')->group(function () {
    Route::get('/', [MateriaController::class, 'index'])->name('materias.index');
    Route::get('/create', [MateriaController::class, 'create'])->name('materias.create');
    Route::post('/', [MateriaController::class, 'store'])->name('materias.store');
    Route::get('/{id}/edit', [MateriaController::class, 'edit'])->name('materias.edit');
    Route::put('/{id}', [MateriaController::class, 'update'])->name('materias.update');
    Route::delete('/{id}', [MateriaController::class, 'destroy'])->name('materias.destroy');
});

// Rutas para Horarios
Route::prefix('horarios')->group(function () {
    Route::get('/', [HorarioController::class, 'index'])->name('horarios.index');
    Route::get('/create', [HorarioController::class, 'create'])->name('horarios.create');
    Route::post('/', [HorarioController::class, 'store'])->name('horarios.store');
    Route::get('/{id}/edit', [HorarioController::class, 'edit'])->name('horarios.edit');
    Route::put('/{id}', [HorarioController::class, 'update'])->name('horarios.update');
    Route::delete('/{id}', [HorarioController::class, 'destroy'])->name('horarios.destroy');
});

// Rutas para Muebles
Route::prefix('muebles')->group(function () {
    Route::get('/', [MuebleController::class, 'index'])->name('muebles.index');
    Route::get('/create', [MuebleController::class, 'create'])->name('muebles.create');
    Route::post('/', [MuebleController::class, 'store'])->name('muebles.store');
    Route::get('/{id}/edit', [MuebleController::class, 'edit'])->name('muebles.edit');
    Route::put('/{id}', [MuebleController::class, 'update'])->name('muebles.update');
    Route::delete('/{id}', [MuebleController::class, 'destroy'])->name('muebles.destroy');
});

// Rutas para Reservas
Route::prefix('reservas')->group(function () {
    Route::get('/', [ReservaController::class, 'index'])->name('reservas.index');
    Route::get('/create', [ReservaController::class, 'create'])->name('reservas.create');
    Route::post('/', [ReservaController::class, 'store'])->name('reservas.store');
    Route::get('/{id}/edit', [ReservaController::class, 'edit'])->name('reservas.edit');
    Route::put('/{id}', [ReservaController::class, 'update'])->name('reservas.update');
    Route::delete('/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
});

// Rutas para Cortinas
Route::prefix('cortinas')->group(function () {
    Route::get('/', [CortinaController::class, 'index'])->name('cortinas.index');
    Route::get('/create', [CortinaController::class, 'create'])->name('cortinas.create');
    Route::post('/', [CortinaController::class, 'store'])->name('cortinas.store');
    Route::get('/{id}/edit', [CortinaController::class, 'edit'])->name('cortinas.edit');
    Route::put('/{id}', [CortinaController::class, 'update'])->name('cortinas.update');
    Route::delete('/{id}', [CortinaController::class, 'destroy'])->name('cortinas.destroy');
});

// Rutas para Aire Acondicionado
Route::prefix('aire-acondicionado')->group(function () {
    Route::get('/', [AireAcondicionadoController::class, 'index'])->name('aire.index');
    Route::get('/create', [AireAcondicionadoController::class, 'create'])->name('aire.create');
    Route::post('/', [AireAcondicionadoController::class, 'store'])->name('aire.store');
    Route::post('/{id}/encender', [AireAcondicionadoController::class, 'encender'])->name('aire.encender');
    Route::post('/{id}/apagar', [AireAcondicionadoController::class, 'apagar'])->name('aire.apagar');
    Route::get('/{id}/edit', [AireAcondicionadoController::class, 'edit'])->name('aire.edit');
    Route::put('/{id}', [AireAcondicionadoController::class, 'update'])->name('aire.update');
    Route::delete('/{id}', [AireAcondicionadoController::class, 'destroy'])->name('aire.destroy');
});

// Rutas para Focos
Route::prefix('focos')->group(function () {
    Route::get('/', [FocoController::class, 'index'])->name('focos.index');
    Route::get('/create', [FocoController::class, 'create'])->name('focos.create');
    Route::post('/', [FocoController::class, 'store'])->name('focos.store');
    Route::post('/{id}/encender', [FocoController::class, 'encender'])->name('focos.encender');
    Route::post('/{id}/apagar', [FocoController::class, 'apagar'])->name('focos.apagar');
    Route::get('/{id}/edit', [FocoController::class, 'edit'])->name('focos.edit');
    Route::put('/{id}', [FocoController::class, 'update'])->name('focos.update');
    Route::delete('/{id}', [FocoController::class, 'destroy'])->name('focos.destroy');
});

// Rutas para Historiales
Route::prefix('historial')->group(function () {
    Route::get('/aire', [AireAcondicionadoController::class, 'historial'])->name('aire.historial');
    Route::get('/focos', [FocoController::class, 'historial'])->name('focos.historial');
});

// Ruta de dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Ruta de reportes
Route::get('/reportes', function () {
    return view('reportes.index');
})->name('reportes');

// Ruta de fallback para páginas 404
Route::fallback(function () {
    return view('errors.404');
});

use App\Http\Controllers\MickeyController;

Route::get('/mickey', [MickeyController::class, 'index'])->name('mickey');