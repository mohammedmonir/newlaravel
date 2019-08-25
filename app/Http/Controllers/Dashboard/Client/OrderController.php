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
            'product_ids'=>'required|array',
            'quantites'=>'required|array',
        ]);

        $order = $client->orders()->create([]);

        $total_price = 0 ;

        foreach($request->product_ids as $index=>$product_id){

            $product=Product::findOrFail($product_id);
            $total_price +=$product->sale_price; 

            $order->products()->attach($product_id,['quantity'=>$request->quantites[$index]]);

            $product->update([
                'stock'=>$product->stock - $request->quantites[$index],
            ]);
            

        }

        $order->update([
            'total_price'=>$total_price,
        ]);
        
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
