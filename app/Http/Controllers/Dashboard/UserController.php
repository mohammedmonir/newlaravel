<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{

    public function __construct()
    {
        //لما ينسخ الرابط ما يقدر يدخل الا اذا كانت متوفرة عندو الصلاحيات
        $this->middleware(['permission:read-users'])->only('index');
        $this->middleware(['permission:create-users'])->only('create');
        $this->middleware(['permission:update-users'])->only('edit');
        $this->middleware(['permission:delete-users'])->only('destroy');

    }//end of constructor

   
    public function index(Request $request)
    {
        $users = User::whereRoleIs('admin')->when($request->search,function($query) use($request){

                return $query->where('first_name','like','%'.$request->search.'%')
                ->orWhere('last_name','like','%'.$request->search.'%');
 
        })->get();
        
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

        $request_data=$request->except(['password','permissions','password_confirmation']);
        $request_data['password']=bcrypt($request->password);
        $user=User::create($request_data);

        
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);

        session()->flash('success', __('site.added_successfully'));
        return redirect(url('dashboard/users'));
    }

     
    public function edit(User $user)
    {
        return view('dashboard.users.edit',compact('user'));
    }
   

    
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
           
        ]);
      

        $request_data=$request->except(['permissions']);
        $user->update($request_data);
        $user->syncPermissions($request->permissions);

        session()->flash('success', __('site.updated_successfully'));
        return redirect(url('dashboard/users'));
        
    }

 
    public function destroy($id)
    {
        
    }
}
