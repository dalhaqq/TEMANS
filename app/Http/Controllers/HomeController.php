<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stand;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $data = [];
        if ($user != null)
        {
            if ($user->hasRole('owner'))
            {
                $data['stands'] = Stand::all();
                $data['operators'] = User::role('operator')->get();
            } else if ($user->hasRole('operator'))
            {
                $data['stands'] = Stand::all();
            } else if ($user->hasRole('tenant'))
            {

            }
        }
        return view('home.index')->with(compact('data'));
    }
}
