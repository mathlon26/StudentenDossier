<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Account extends Controller
{
    public function index()
    {
        return view('account.index');
    }

    public function manage()
    {
        return view('account.edit', [
            "account" => auth()->user()->dossier
        ]);
    }

    public function login($lang)
    {
        $pageName = "login";
        return view('account.login', ['pageName'=>$pageName, 'lang' => $lang]);
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'studentid' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('action_info', "Logged in succesfully");
        }
        else
        {
            return back()->withErrors(['login' => 'Invalid credentials'])->onlyInput('login');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('action_info', "Logged out succesfully");
    }

    public function edit(Request $request)
    {
        if (!auth()->check()){
            return redirect('/')->with('action_info', "Session expired");
        }
    }
}
