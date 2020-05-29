<?php

namespace App\Http\Controllers;

use App\Product;
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

        $request->validate([            
            "name" =>'required',
            "description"=>'required',
            "file" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'amount'=>'required'
        ]);

        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = $imagePath->getClientOriginalName();
            $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
        }

        $product = new Product([
            "name" =>$request->get("name"),
            "description"=>$request->get("description"),
            'photo'=>$path,
            'amount'=>$request->get("amount")
        ]);
        $product->save();
        return redirect('/products')->with('success', 'Contact saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'amount'=>'required',
        ]);

        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = $imagePath->getClientOriginalName();
            $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
        }

        $product = Product::find($id);
        $product->name =  $request->get('name');
        $product->description = $request->get('description');
        $product->photo = $path;
        $product->amount = $request->get('amount');
        $product->save();

        return redirect('/products')->with('success', 'Contact updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'Contact deleted!');
    }
}
