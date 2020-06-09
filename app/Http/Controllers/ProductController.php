<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index ()
    {
        $products=Product::all();
        return view('products.index',compact('products')); 
    }

    public function store (Request $request)
    {
        $request->validate([
            'title' => 'required' ,
            'description' => 'required' ,
            'price' => 'required' ,
        ]);
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return redirect('products')->with('success', 'Product added Successfuly!');
    } 

    public function destroy (Product $product_delete)
    {
        $product_delete->delete();
        return redirect('products')->with('warning', 'Product Deleted Successfuly!');;    
    }

    public function ShowEditProduct(Product $product_edit)
    {
        $products=Product::all();
        return view('products.index',compact('product_edit','products')); 
    }   

    public function Update(Request $request,Product $product_update)
    { 
        $request->validate([
            'title' => 'required' ,
            'description' => 'required' ,
            'price' => 'required' ,
        ]);

        $product_update->title = $request->title; 
        $product_update->description = $request->description;
        $product_update->price = $request->price;
        $product_update->save();
        return redirect('products')->with('info', 'Product Updated Successfuly!');    
    }
}
