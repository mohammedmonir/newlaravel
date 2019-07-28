<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
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
        $users = User::whereRoleIs('admin')->where(function ($q) use ($request) {

            return $q->when($request->search, function ($query) use ($request) {

                return $query->where('first_name', 'like', '%' . $request->search . '%')
                    ->orWhere('last_name', 'like', '%' . $request->search . '%');

            });

        })->latest()->paginate(2);

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
            'image' => 'image',
            'permissions' => 'required|min:1',
        ]);

        $request_data=$request->except(['password','permissions','password_confirmation','image']);
        $request_data['password']=bcrypt($request->password);

        if($request->image){

            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/user_images/'.$request->image->hashName()));

            $request_data['image']=$request->image->hashName();
            
        }


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
            'email' => ['required',Rule::unique('users')->ignore($user->id),],//اذا فيه شخص مستخدم الايميل قبل هيك ولا لا
            'image' => 'image',
            'permissions' => 'required|min:1',
           
        ]);
      

        $request_data=$request->except(['permissions','image']);

       
        if ($request->image) {

            if ($user->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/user_images/' . $user->image);

            }//end of inner if

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/user_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
            
        }//



        $user->update($request_data);
        $user->syncPermissions($request->permissions);

        session()->flash('success', __('site.updated_successfully'));
        return redirect(url('dashboard/users'));
        
    }

 
    public function destroy(User $user)
    {
        if($user->image!= 'default.png'){
            Storage::disk('public_uploads')->delete('/user_images/'.$user->image);
        }

        $user->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('users.index');
    }
}
