<?php

namespace App\Http\Controllers\Dashboard\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\Category;
use App\Order;
use App\Product;

class OrderController extends Controller
{
    
    public function index()
    {
        
    }

    
    public function create(Client $client)
    {
        $categories= Category::with('products')->get();
        return view('dashboard.clients.orders.create',compact('client','categories'));
    }

   
    public function store(Request $request, Client $client)
    {

       
        $request->validate([
            'products'=>'required|array',
           
        ]);

        $order = $client->orders()->create([]);
        $order->products()->attach($request->products);

        $total_price = 0 ;

        foreach($request->products as $id=>$quantity){
           

            $product=Product::findOrFail($id);
            $total_price +=$product->sale_price * $quantity['quantity']; 

            $product->update([
                'stock'=>$product->stock - $quantity['quantity'],
            ]);
            
        }

        $order->update([
            'total_price'=>$total_price,
        ]);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('orders.index');
        
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
