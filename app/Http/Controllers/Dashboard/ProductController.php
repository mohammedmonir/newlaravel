<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate(2);
        return view('dashboard.products.index',compact('products'));
        
    }
    
    
    public function create()
    {
        $categories= Category::all();
        return view('dashboard.products.create',compact('categories'));
        //
    }

   
    public function store(Request $request)
    {
        //
    }

  
    public function show(product $product)
    {
        //
    }

  
    public function edit(product $product)
    {
        //
    }

 
    public function update(Request $request, product $product)
    {
        //
    }

    public function destroy(product $product)
    {
        //
    }
}
