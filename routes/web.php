<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrelloController;
use App\Http\Controllers\UserController;

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

Route::get('/',function(){
    return view ('dash');
});
Route::prefix('trello')->group(function(){
    Route::get('report', [TrelloController::class, 'getReport'])->name('report');
    Route::get('due',[TrelloController::class,'due'])->name('due');
    Route::get('workspace',[TrelloController::class,'workspacelist'])->name('workspacelist');
});
Route::prefix('user')->group(function (){  
    Route::get('list',[UserController::class,'list'])->name('userlist');
});

