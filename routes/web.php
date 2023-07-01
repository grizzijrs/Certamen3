<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\http\Controllers\ArtistaController;
use App\http\Controllers\ImagenController;
use App\http\Controllers\CuentaController;
use App\http\Controllers\AdministradorController;

Route::fallback(function(){
    return redirect()->route('home.index');
});

Route::get('/', [HomeController::class,'index'])->name('home.index');
Route::get('/login', [HomeController::class,'login'])->name('home.login');
Route::get('/registrarse',[ArtistaController::class,'index'])->name('artista.index');
Route::post('/registrarse', [ArtistaController::class,'store'])->name('artista.store');
Route::get('/perfil/{cuenta}', [ArtistaController::class,'perfil'])->name('artista.perfil');
Route::post('/subirImagen', [ImagenController::class,'store'])->name('imagen.store');
Route::post('/cuenta/login',[CuentaController::class,'autenticar'])->name('cuenta.autenticar');
Route::get('/cuenta/logout',[CuentaController::class,'logout'])->name('usuarios.logout');
Route::get('/perfiles',[AdministradorController::class,'index'])->name('administrador.index');
Route::put('/perfiles/editar/{cuenta}',[CuentaController::class,'update'])->name('cuenta.update');
Route::get('/perfiles/editar/{cuenta}',[CuentaController::class,'editar'])->name('cuenta.editar');
Route::delete('/perfiles/delete/{cuenta}',[CuentaController::class,'destroy'])->name('cuenta.delete');
Route::put('/inicio/banear/{imagen}',[ImagenController::class,'update'])->name('imagen.update');
Route::get('/perfil/fotos/baneadas/{cuenta}',[ImagenController::class,'baneadas'])->name('baneadas.index');
Route::get('/perfiles/{cuenta}',[ArtistaController::class,'perfiles'])->name('cuenta.perfiles');
Route::get('/inicio/baneadas',[AdministradorController::class,'fotosBaneadas'])->name('fotos.baneadas');
Route::put('/inicio/desbanear/{imagen}',[ImagenController::class,'desbanear'])->name('imagen.desbanear');
Route::put('perfil/cambiarTitulo/{imagen}',[ImagenController::class,'cambiarTitulo'])->name('imagen.titulo');
Route::get('/search', [HomeController::class,'search']);
Route::delete('/perfi/delete/{imagen}',[ImagenController::class,'destroy'])->name('imagen.delete');

