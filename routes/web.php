<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;
use App\Models\Usuarios;

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
    $usuarios = Usuarios::all();
    $data = [];
    foreach ($usuarios as $usuario) {
        $data[] = ["name" => $usuario["name"], "assessment" => $usuario["assessment"],];
    }
    return view('dashboard', ["data" => $data]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/Usuarios/delete/{id}', [UsuariosController::class, 'delete'])->name('Usuarios.delete');
});
Route::resource('Usuarios', UsuariosController::class)->middleware('auth');




require __DIR__ . '/auth.php';