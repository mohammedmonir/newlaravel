<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\ViewServiceProvider;
use App\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(5);
        return view('dashboard.clients.index',compact('clients'));
    }

  
    public function create()
    {
        return view('dashboard.clients.create');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|array|min:1',
            'phone.0' => 'required',
            'address' => 'required',
        ]);

        $request_data = $request->all();
        $request_data['phone'] = array_filter($request->phone);

        Client::create($request_data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('clients.index');
    }

 

   
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
