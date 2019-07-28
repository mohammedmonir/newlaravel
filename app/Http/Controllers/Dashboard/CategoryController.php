<?php

namespace App\Http\Controllers\Dashboard;

use App\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
  
    public function index()
    {
        $categories= Category::paginate(5);
        return view('dashboard.categories.index',compact('categories'));
    }

   
    public function create()
    {
        return view('dashboard.categories.create');
    }

    
    public function store(Request $request)
    {
        //
    }

  
    public function show(category $category)
    {
        //
    }

   
    public function edit(category $category)
    {
        //
    }

   
    public function update(Request $request, category $category)
    {
        //
    }

  
    public function destroy(category $category)
    {
        //
    }
}
