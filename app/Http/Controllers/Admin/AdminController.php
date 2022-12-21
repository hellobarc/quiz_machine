<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
    public function adminLogout(Request $request)
    {
        Session::flush();

        Auth::logout();

        return redirect('/');
    }
}
