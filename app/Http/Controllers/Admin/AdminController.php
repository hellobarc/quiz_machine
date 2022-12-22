<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\UserRole;

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

    public function allUser()
    {
        $allUsers = UserRole::with('user')->get();
        return view('admin.user.index', compact('allUsers'));
    }
}
