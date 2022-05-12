<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    //
    public function show(){
        $tickets=DB::table('tickets')->get();
        return view('myTicket',compact('tickets'));
    }
    //

    public function store(Request $request){
        DB::table('tickets')->insert([
            'Category' => $request->name,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->back();

        /*$task=new Ticket();
       $task->Category=$request->Category;
       $task->save();
       return redirect()->back();*/
    }


    public function showTicket($id){
        $tickets=DB::table('tickets')->where('id',$id)->get();
        return view('showTicket',compact('tickets'));
    }
}
