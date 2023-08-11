<?php

use App\Http\Controllers\CasocController;
use App\Http\Controllers\CasoController;
use App\Http\Controllers\CategoriacController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EventocController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\FormulaController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeguimientocController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\TareacController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UtilController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClienteMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('casos', CasoController::class);
    Route::resource('tareas', TareaController::class);
    Route::resource('inventarios', InventarioController::class);
    Route::resource('formulas', FormulaController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('seguimientos', SeguimientoController::class);
    Route::resource('eventos', EventoController::class);
    Route::resource('usuarios', UsuarioController::class);

});
require __DIR__.'/auth.php';

Route::middleware([AdminMiddleware::class])->group(function () {
});

Route::middleware([ClienteMiddleware::class])->group(function () {
    Route::resource('casosc', CasocController::class);
    Route::resource('seguimientosc', SeguimientocController::class);
    Route::resource('categoriasc', CategoriacController::class);
    Route::resource('eventosc', EventocController::class);
    Route::resource('tareasc', TareacController::class);
});

Route::get('phpmyinfo', function () {
    phpinfo(); 
})->name('phpmyinfo');

Route::post('/updateestilo', [UtilController::class, 'updateestilo'])->name('updateestilo');
Route::post('/updatemodo', [UtilController::class, 'updatemodo'])->name('updatemodo');
Route::post('/updatefuente', [UtilController::class, 'updatefuente'])->name('updatefuente');
Route::get('/comparehora', [UtilController::class, 'compareHora'])->name('comparehora');

Route::get('/buscar', [UtilController::class, 'buscar'])->name('buscar');
Route::get('/stats', [UtilController::class, 'stats'])->name('stats');

Route::get('/unauthorized', [UtilController::class, 'unauthorized'])->name('unauthorized');
Route::get('/reportes', [UtilController::class, 'reportes'])->name('reportes');
Route::post('/report', [UtilController::class, 'report'])->name('report');

Route::get('generate-pdf', [UtilController::class, 'generatePDF']);