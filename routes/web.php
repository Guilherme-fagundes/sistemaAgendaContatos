<?php

use App\Http\Controllers\Acount\AcountController;
use App\Http\Controllers\Acount\ContactController;
use App\Http\Controllers\Acount\EventsController;
use App\Http\Controllers\Acount\GroupsController;
use App\Http\Controllers\Acount\ParticipantController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('sys.login');
Route::get('/logout', [HomeController::class, 'logout'])->name('sys.logout');
Route::post('/post', [HomeController::class, 'indexPost'])->name('sys.loginPost');
Route::get('/nova-conta', [HomeController::class, 'newAcount'])->name('sys.newAcount');
Route::post('/nova-conta/post', [HomeController::class, 'newAcountPost'])->name('sys.newAcountPost');


//ROTAS INTERNAS

Route::prefix('conta')->group(function (){
    Route::get('/', [AcountController::class, 'index'])->name('acount.home');
    Route::get('/contatos', [ContactController::class, 'view'])->name('contact.view');
    Route::get('/contatos/novo-contato', [ContactController::class, 'newContact'])->name('contact.new');
    Route::post('/contatos/novo-contato/post', [ContactController::class, 'newContactPost'])->name('contact.new.post');

    // Grupos de contatos
    Route::get('/grupos', [GroupsController::class, 'index'])->name('groups.index');
    Route::get('/grupos/novo-grupo', [GroupsController::class, 'newGroup'])->name('groups.new');
    Route::post('/grupos/novo-grupo/post', [GroupsController::class, 'newGroupPost'])->name('groups.new.post');

    // Eventos
    Route::get('/eventos', [EventsController::class, 'index'])->name('events.index');
    Route::get('/eventos/novo-evento', [EventsController::class, 'create'])->name('events.new');
    Route::post('/eventos/novo-evento/post', [EventsController::class, 'createPost'])->name('events.create.post');

    Route::get('/eventos/{id}', [EventsController::class, 'details'])->name('events.details');
    Route::post('/eventos/adicionar-participante', [EventsController::class, 'addP'])->name('events.addP');

});
