<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class productController extends Controller
{
    public function index(){
        $products = Products::get();
        return view('product.index',['products'=>$products]);
    }
    public function create(){
        return view('product.create');
    }
    public function store(Request $request){
        // validating data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);


        // Uplodaing image
        // dd($request->all());
        $imageName = time().'.'. $request->image->extension();
        $request->image->move(public_path('product'),$imageName);
        $product = new Products;

        $product->name = $request->name;
        $product->image = $imageName;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product saved successfully!');

    }
    public function edit($id){
        // dd($id);
        $product = Products::where('id',$id)->first();
        return view('product.edit',['product'=>$product]);
    }
    public function update(Request $request,$id){
        // dd($id);
        $product = Products::where('id',$id)->first();
        // validating data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable',
        ]);

        if(!isset($product->image)){
            $imageName = time().'.'. $request->image->extension();
            $request->image->move(public_path('product'),$imageName);
            $product->image = $imageName;
        }
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product updated successfully!');
    }
    public function delete($id){
        $product = Products::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product updated successfully!');
    }
}
