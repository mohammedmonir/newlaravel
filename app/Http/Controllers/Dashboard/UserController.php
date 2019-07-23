<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
   
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index',compact('users'));
    }

   
    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
     
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

        $request_data=$request->except(['password']);
        $request_data['password']=bcrypt($request->password);
        $user=User::create($request_data);

        session()->flash('success', __('site.added_successfully'));
        return redirect(url('dashboard/users'));
    }

     
    public function edit($id)
    {
        
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
