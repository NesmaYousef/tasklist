<?php

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

Route::get('app',function(){
    return view('layouts.app');
});
Route::get('/',function(){
    return view('newTicket');
});
Route::post('show',[TicketController::class,'show']);
Route::get('showTicket/{id}',[TicketController::class,'showTicket']);
Route::post('/store',[TicketController::class,'store']);