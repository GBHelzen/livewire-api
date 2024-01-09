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

// Controller Artista Livewire
Route::get('/', IndexArtistas::class)->name('artistas.index');
Route::get('/artistas/{constituentID}', [IndexArtistas::class, 'show'])->name('artistas.show');

// Controller Artes Livewire
Route::get('/artes', IndexArtes::class)->name('artes.index');
Route::get('/artes/{objectID}', [IndexArtes::class, 'show'])->name('artes.show');
