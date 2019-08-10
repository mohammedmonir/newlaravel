<?php

namespace App\Http\Controllers\Dashboard\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class OrderController extends Controller
{
    
    public function index()
    {
        
    }

    
    public function create(Client $client)
    {
        return view('dashboard.clients.orders.create');
    }

   
    public function store(Request $request)
    {
        
    }

    
    public function show($id)
    {
        
    }

 
    public function edit($id)
    {
        
    }

  
    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
