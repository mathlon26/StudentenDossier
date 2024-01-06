<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class Dossier extends Controller
{
    public function index()
    {
        $pageName = "dossier";
        $user = auth()->user()->dossier()->get()->where('user_id', '=' , auth()->user()->id);
        return view('dossier.index', ['student' => $user, 'pageName' => $pageName]);
    }
}
/**
 * ->where(, '=' , auth()->user()->id)
 * ->get()->where('user_id', '=' , auth()->user()->id)->pluck("name")
 */