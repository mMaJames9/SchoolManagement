<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Staff Management
    Route::resource('/admin/staffmanagement/users', 'App\Http\Controllers\UserController');
    Route::resource('/admin/staffmanagement/enseignants', 'App\Http\Controllers\EnseignantController');

    // Student Management
    Route::resource('/admin/studentmanagement/eleves', 'App\Http\Controllers\EleveController');
    Route::resource('/admin/studentmanagement/familles', 'App\Http\Controllers\FamilleController');

    //School Management
    Route::resource('/admin/schoolmanagement/classes', 'App\Http\Controllers\ClasseController');
    Route::resource('/admin/schoolmanagement/matieres', 'App\Http\Controllers\MatiereController');
    Route::resource('/admin/schoolmanagement/bulletins', 'App\Http\Controllers\BelletinController');

    // Finance Management
    Route::resource('/admin/financemanagement/frais', 'App\Http\Controllers\FraisController');
    Route::resource('/admin/financemanagement/salaires', 'App\Http\Controllers\SalaireController');

    // Stock Management
    Route::resource('/admin/stockmanagement/materiels', 'App\Http\Controllers\MaterielController');
    Route::resource('/admin/stockmanagement/stocks', 'App\Http\Controllers\StockController');

    Route::resource('/admin/stockmanagement/transactions', 'App\Http\Controllers\TransactionController');
    Route::post('/admin/stockmanagement/transactions/{stock}/storeStock', 'App\Http\Controllers\TransactionController@storeStock')->name('transactions.storeStock');

});

require __DIR__.'/auth.php';
