<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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


/*

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
   // $name = "nesma";
   // $age = 21;
    // return view('about',[
    //'name' => $name,
    //'age => $age'
    //]);
    //return view('about')->with('name',$name)->with('age',$age);
  // return view ('about',compact('name','age'));

$name = request('name');
return view ('about',compact('name'));
});
Route::post('/store', function () {
    $name = request('name');
    return view('about',compact('name'));
});
Route::get('/tasks', function () {
    /*
     $tasks = [
    'task1',
    'task2',
    'task3'];
*//*
  $tasks = [
    '1'=>'task1',
    '2'=>'task2',
    '3'=>'task3'];
return view ('tasks',compact('tasks'));
});
Route::get('/show/{id}', function ($id) {
    $tasks = [
        '1'=>'task1',
        '2'=>'task2',
        '3'=>'task3'
    ];

 $task = $tasks[$id];
return view ('show',compact('task'));
});
*/
//new

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/task/{id}', [TaskController::class, 'show'])->name('tasks.show');
Route::post('/task/store', [TaskController::class, 'store'])->name('tasks.store');
Route::delete('task/destroy/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::put('edit/{id}',[TaskController::class, 'edit']);
Route::patch('update/{id}',[TaskController::class, 'update']);
