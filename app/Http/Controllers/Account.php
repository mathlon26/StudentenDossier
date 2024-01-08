<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Dossier;
class Account extends Controller
{
    public function index($lang)
    {
        $pageName = "account";
        $user = auth()->user()->dossier()->get()->where('user_id', '=' , auth()->user()->id);
        return view('account.index', ['pageName'=>$pageName, 'lang' => $lang, 'student' => $user]);
    }

    public function manage()
    {
        $pageName = "editaccount";
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

    public function uploadAvatar(Request $request)
    {

        if ($request->hasFile('avatar')) {

            $request->validate([
                'avatar' => 'required|file|mimes:jpg,jpeg,png,gif,webp,svg|max:2048', // Adjust the max size as needed
            ]);

            $user = auth()->user()->dossier()->get()->where('user_id', '=' , auth()->user()->id);
            $avatar_url = $user->pluck("avatar_url")[0];

            $avatar_folder = 'public/avatars/'.hash('sha256', $user->pluck("name")[0]).'/';
            
            $filename = $user->pluck("name")[0].$user->pluck("lastname")[0].$user->pluck("studentid")[0];
            $filenameBase = hash('sha256', $filename.'avatar');
            

            foreach (['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'] as $extension) {
                $filename = $filenameBase . '.' . $extension;
        
                if (Storage::exists($avatar_folder . $filename)) {
                    Storage::delete($avatar_folder . $filename);
                }
            }

            $filename = $filenameBase.'.'.$request->file('avatar')->extension();

            $request->file('avatar')->storeAs($avatar_folder, $filename);

            // update avatar_url in database
            Dossier::where('user_id', auth()->user()->id)
            ->update(['avatar_url' => 'storage/avatars/' . hash('sha256', $user->pluck("name")[0]) . '/' . $filename]);

            return back()->with('action_info', "Avatar uploaded succesfully");
        }
        else
        {
            return back()->withErrors(['avatar' => 'Invalid fiel'])->onlyInput('avatar');
        }
    }
}
