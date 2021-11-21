<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Middleware\UserRedirect;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.page.profil');
})->middleware(['auth'])->name('profil');

Route::get('/data-pegawai', function () {
    return view('layouts.page.pegawai');
})->middleware(['auth','auth.user'])->name('pegawai');

Route::get('/data-jabatan', function () {
    return view('layouts.page.jabatan');
})->middleware(['auth','auth.user'])->name('jabatan');

Route::get('/data-unit-kerja', function () {
    return view('layouts.page.unit-kerja');
})->middleware(['auth','auth.user'])->name('unit_kerja');

Route::get('/user', function () {
    return view('layouts.page.user-account');
})->middleware(['auth'])->name('user-account');

require __DIR__.'/auth.php';