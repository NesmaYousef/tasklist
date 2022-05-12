<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
    return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->Name = $request->Name;
        $product->Price = $request->Price;
        $product->Quantity = $request->Quantity;
        $product->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }
    public function edit($id){
        /*  $tasks = DB::table('tasks')->get();
          $task = DB::table('tasks')->find($id);*/
          $products = Product::orderBy('name')->get()->all();
          //$tasks = Task :: all()->sortBy("name");
          $product = Product::find($id);

          return view('tasks.index', compact('task', 'tasks'));
      }

      public function update(Request $request, $id){
          /*$task = DB::table('tasks')->where('id',$id)->update([
              'name' => $request->name
          ]);*/
          $product= Product :: where('id',$id)->update(['Name' => $request->Name]);

          return redirect('');
      }

}
