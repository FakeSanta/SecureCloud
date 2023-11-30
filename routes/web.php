<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\RepertoireController;
use App\Http\Controllers\DockerController;

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

    Route::get('/data/{path?}', [RepertoireController::class, 'show'])
    ->where('path', '.*') // Accepte tout le reste de l'URL
    ->name('directory.show');

    Route::post('/create-file', [DockerController::class, 'createFile'])->name('create.docker.file');
    Route::post('/create-folder', [DockerController::class, 'createFolder'])->name('create.docker.folder');

    Route::post('/delete-file', [DockerController::class, 'deleteFile'])->name('delete.docker.file');
    Route::get('/edit/{path}/{name}', [DockerController::class, 'editFile'])->name('edit.file');
});

require __DIR__.'/auth.php';
