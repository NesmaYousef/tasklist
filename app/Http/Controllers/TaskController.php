<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
class TaskController extends Controller
{
    public function index(){
       /***  $tasks = DB::table('tasks')->get();*/
       //alphabetical order
      // $tasks = Task::orderBy('name')->get()->all();
      $tasks = Task :: all()->sortBy("name");
        //to return only tasks like task1:
       /* $tasks = DB::table('tasks')->where('name','like','task1%')->get();*/
        return view('tasks.index', compact('tasks'));
    }

    public function show($id){
        $task = DB::table('tasks')->find($id);

        // return $tasks;
        return view('tasks.show', compact('task'));
    }


    public function store(Request $request){
      /*****   DB::table ('tasks') -> insert(['name'=> $_POST['name']]);*/
      $validated = $request->validate([
        'name' => 'required|min:3|max:15'
    ]);
      $task = new Task();
      $task->name = $request->name;
      $task->save();
        return redirect() -> back();

    }

    public function destroy($id){
       /****** DB::table('tasks')->where('id', $id)->delete();*/
       Task::find($id)->where('id', $id)->delete();

        return redirect()->back();
    }
    public function edit($id){
      /*  $tasks = DB::table('tasks')->get();
        $task = DB::table('tasks')->find($id);*/
        $tasks = Task :: all()->sortBy("name");
        $task = Task :: find($id);

        return view('tasks.index', compact('task', 'tasks'));
    }

    public function update(Request $request, $id){
        /*$task = DB::table('tasks')->where('id',$id)->update([
            'name' => $request->name
        ]);*/
        $task = Task :: where('id',$id)->update(['name' => $request->name]);

        return redirect('');
    }

}
