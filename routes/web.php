<?php

use App\Http\Controllers\EstateController;
use App\Livewire\Home;
use App\Livewire\StoreEstate;
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


Route::get('/', Home::class)->lazy()->name('home');
Route::get('/estate/create', StoreEstate::class)->lazy()->name('create.estate');
