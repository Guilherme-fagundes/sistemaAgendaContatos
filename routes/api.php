<?php

use App\Http\Controllers\api\ContactsController;
use App\Http\Controllers\Api\GroupsController;
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
Route::get('/grupos', [GroupsController::class, 'index'])->name('group.index');
Route::get('/grupo/{id}', [GroupsController::class, 'show'])->name('group.show');
Route::get('/grupo/{id}/deletar', [GroupsController::class, 'delete'])->name('group.delete');
Route::post('/grupo/{id}/atualizar', [GroupsController::class, 'update'])->name('group.update');
