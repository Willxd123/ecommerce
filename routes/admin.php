<?php
//use Illuminate\Http\Request;

use App\Http\Controllers\Admin\FamiliaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::resource('familias', FamiliaController::class);