<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        $user->assignRole(Role::where('name', 'tenant')->first());
        Tenant::create([
            'user_id' => $user->id,
            'address' => null,
            'city' => null,
            'zip_code' => null,
            'phone_number' => null,
            'is_verified' => false,
            'photo' => null,
            'id_card' => null
        ]);
        return redirect('login')->with('success', "Berhasil membuat akun.");
    }
}
