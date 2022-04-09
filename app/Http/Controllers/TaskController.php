<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(){
        $tasks = DB::table('tasks')->get();
         //to return only tasks like task1:
       /* $tasks = DB::table('tasks')->where('name','like','task1%')->get();*/
        return view('tasks.index', compact('tasks'));
    }

    public function show($id){
        $task = DB::table('tasks')->find($id);

        // return $tasks;
        return view('tasks.show', compact('task'));
    }


    public function store(){
        DB::table ('tasks') -> insert(['name'=> $_POST['name']]);
        return redirect() -> back();

    }

    public function destroy($id){
        DB::table('tasks')->where('id', $id)->delete();

        return redirect()->back();
    }

}
