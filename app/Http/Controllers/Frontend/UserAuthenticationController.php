<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Session;

class UserAuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name' => 'required|string|min:5|max:100',
            'email' => 'required|string|email|unique:users',
            'password'=> 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);
        if( $validation->fails())
        {
            return redirect('/')->with('errors', 'Validation failed');
        }
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $role = UserRole::create([
            'user_id'=> $users->id,
            'role'=> 'user',
        ]);
        return redirect('/')->with('success', 'Registration Successful');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password'=> 'required|min:8',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('frontend.home')
                        ->with('success','You have Successfully loggedin');
        }
        
  
        return redirect("/")->with('errors','Oppes! You have entered invalid credentials');
    }
    public function logout(Request $request)
    {
        Session::flush();

        Auth::logout();

        return redirect('/')->with('success','Logout Successfully');
    }
}
