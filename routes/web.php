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

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Staff Management
    Route::resource('/admin/staffmanagement/users', 'App\Http\Controllers\UserController');
    Route::resource('/admin/staffmanagement/personnels', 'App\Http\Controllers\PersonnelController');
    Route::resource('/admin/staffmanagement/enseignants', 'App\Http\Controllers\EnseignantController');

    // Student Management
    Route::resource('/admin/studentmanagement/eleves', 'App\Http\Controllers\EleveController')->parameters(['eleves' => 'eleve']);
    Route::resource('/admin/studentmanagement/familles', 'App\Http\Controllers\FamilleController');

    //School Management
    Route::resource('/admin/schoolmanagement/classes', 'App\Http\Controllers\ClasseController')->parameters(['classes' => 'classe']);
    Route::resource('/admin/schoolmanagement/matieres', 'App\Http\Controllers\MatiereController');
    Route::resource('/admin/schoolmanagement/bulletins', 'App\Http\Controllers\BulletinController');

    // Finance Management
    Route::resource('/admin/financemanagement/paiements', 'App\Http\Controllers\PaiementController');
    Route::post('admin/financemanagement/paiements/storePaiement/{eleve}', 'App\Http\Controllers\PaiementController@storePaiement')->name('storePaiement');
    
    Route::resource('/admin/financemanagement/salaires', 'App\Http\Controllers\SalaireController');
    Route::post('admin/financemanagement/salaires/storePersonnel/{employe}', 'App\Http\Controllers\SalaireController@storePersonnel')->name('storePersonnel');
    Route::post('admin/financemanagement/salaires/storeEnseignant/{employe}', 'App\Http\Controllers\SalaireController@storeEnseignant')->name('storeEnseignant');
    Route::get('admin/financemanagement/salaires/{salaire}/print', 'App\Http\Controllers\SalaireController@printSalaire')->name('printSalaire');

    // Stock Management
    Route::resource('/admin/stockmanagement/materiels', 'App\Http\Controllers\MaterielController');
    Route::resource('/admin/stockmanagement/stocks', 'App\Http\Controllers\StockController');

    Route::resource('/admin/stockmanagement/transactions', 'App\Http\Controllers\TransactionController');

    Route::post('/admin/stockmanagement/transactions/{stock}/storeStock', 'App\Http\Controllers\TransactionController@storeStock')->name('transactions.storeStock');

    Route::get("/admin/staffmanagement/personnels/previewPersonnelCV/{personnel}", "App\Http\Controllers\PersonnelController@previewPersonnelCV")->name("previewPersonnelCV");

    Route::get("/admin/staffmanagement/enseignants/previewEnseignantCV/{enseignant}", "App\Http\Controllers\EnseignantController@previewEnseignantCV")->name("previewEnseignantCV");

});

require __DIR__.'/auth.php';
