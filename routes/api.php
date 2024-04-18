<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('api')->group(function () {
    // Routes pour les étudiants
    Route::resource('etudiants', EtudiantController::class);
});
Route::middleware('api')->group(function () {
    // Routes pour les enseignants
    Route::resource('enseignants', EnseignantController::class);
});
    Route::middleware('api')->group(function () {
    // Routes pour les matières
    Route::resource('matieres', MatiereController::class);
});
Route::middleware('api')->group(function () {
    // Routes pour les notes
    Route::resource('notes', NoteController::class);
});
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::middleware('auth:sanctum')->post('/logout', [LoginController::class,
'logout']);
Route::get('/api/search-etudiants', 'EtudiantController@search');