<?php

use App\Http\Controllers\api\ContactsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Contatos
Route::get('/contatos', [ContactsController::class, 'index'])->name('contacts.list');
Route::get('/contato/{id}', [ContactsController::class, 'show'])->name('contacts.show');
Route::post('/contato/novo', [ContactsController::class, 'create'])->name('contacts.register');
Route::get('/contato/{id}/apagar', [ContactsController::class, 'destroy'])->name('contacts.destroy');
Route::post('/contato/{id}/atualizar', [ContactsController::class, 'update'])->name('contacts.update');

//Grupos

