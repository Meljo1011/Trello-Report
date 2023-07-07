<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrelloController;

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

Route::get('/home',[TrelloController::class,'dash'])->name('dash');
Route::get('trello/report', [TrelloController::class, 'getReport'])->name('report');
Route::get('trello/due',[TrelloController::class,'due'])->name('due');
Route::get('trello/workspace',[TrelloController::class,'workspacelist'])->name('workspacelist');
