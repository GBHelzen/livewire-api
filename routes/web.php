<?php

use App\Livewire\Artes\IndexArtes;
use App\Livewire\Artistas\IndexArtistas;
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

Route::get('/teste/{constituentID}', [IndexArtistas::class, 'teste2'])->name('artistas.tshow');
Route::get('/teste', [IndexArtistas::class, 'teste'])->name('artistas.teste');


Route::get('/teste2/{objectID}', [IndexArtes::class, 'teste2'])->name('artes.tshow');
Route::get('/teste2', [IndexArtes::class, 'teste'])->name('artes.teste');

// Controller Artista Livewire
Route::get('/', IndexArtistas::class)->name('artistas.index');
Route::get('/artistas/{constituentID}', [IndexArtistas::class, 'show'])->name('artistas.show');

// Controller Artes Livewire
Route::get('/artes', IndexArtes::class)->name('artes.index');
Route::get('/artes/{objectID}', [IndexArtes::class, 'show'])->name('artes.show');
