<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if (
            $request->email === 'Admin@verity-tech.net' &&
            $request->password === 'Hello@1234'
        ) {
            session(['logged_in' => true]);

            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Invalid login details');
    }
}
