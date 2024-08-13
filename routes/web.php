<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;

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

Route::get('/accueil', function () {
    return view('accueil');
});

Route::get('/renseignement', function (){
    return view('renseignement');
});

Route::get('etudiant_page', [EtudiantController::class, 'index'])->name('etudiant');

Route::post('insertion_etudiant', [EtudiantController::class, 'store'])->name('insertion');

Route::put('update/{id}', [EtudiantController::class, 'update'])->name('update'); //permet de modifier les données de l'étudiant et de retourner sur la page d'affichage principal

Route::get('modifier/{id}', [EtudiantController::class, 'edit'])->name('modifier'); //permet d'avoir les informations de l'étudiant grâce à l'id

Route::get('/delete-etudiant/{id}', [EtudiantController::class, 'delete_etudiant']);