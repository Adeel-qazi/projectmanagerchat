<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function attempt(AdminLoginRequest $request)
    {

        $validatedData = $request->validated();
        if(empty($validatedData)){
            return redirect()->route('login')->withErrors($validatedData)->withInput($request->only('email'));
        }

        if(auth('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
           $user = auth('admin')->user();
           if($user->id == 1 && $user->email == 'admin@gmail.com'){
            return redirect()->route('dashboard');
           }else{
            flash()->addError('You are not authorized to access the admin panel');
            return redirect()->route('login');
           }

        }elseif (auth('manager')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            $user = auth('manager')->user();
            if($user->id != 1){
             return redirect()->route('dashboard');
            }else{
             flash()->addError('You are not authorized to access the admin panel');
             return redirect()->route('login');
            }
 
         }else{
            flash()->addSuccess('Invalid Email/Password is incorrect');
            return redirect()->route('login');
        }
    }

    public function index()
    {
        return view('admin.dashboard');
    }


    public function profile($userId)
    {

      $user =  User::findOrFail($userId);

      return view('admin.profile',compact('user'));
    }


    public function profileUpdate(UpdateProfileRequest $request,$userId)
    {
        $validatedData = $request->validated();
      $user =  User::findOrFail($userId);
     $user->update($validatedData);
     return redirect()->route('profile',$user->id);


    }






    

    public function logout()
    {
        if(auth('admin')->check()){
            auth('admin')->logout();
        }else{
            auth('manager')->logout();
        }
        ;
        flash()->addSuccess('Logout Successfull');
        return redirect()->route('login');
    }
}
