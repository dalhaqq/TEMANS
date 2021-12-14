<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Tenant::all();
        return view('tenants.index')->with(compact('tenants'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tenant = Tenant::findOrFail($id);
        return view('tenants.detail')->with(compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        $user = Auth::user();
        $user->update(['name' => $request->name]);
        if($user->hasRole('tenant')) {
        $data = $request->safe()->except('name');
        if ($request->hasFile('photo')){
            $image = $request->file('photo');
            $image_name = time()."_photo_".$image->getClientOriginalName();
            $path = 'uploads/tenants';
            $image->move($path, $image_name);
            $data['photo'] = $path . '/' . $image_name;
            if (File::isFile($user->photo)) {
                File::delete($user->photo);
            }
        } else {
            $data['photo'] = $user->photo;
        }
        if ($request->hasFile('id_card')){
            $image = $request->file('id_card');
            $image_name = time()."_id_card_".$image->getClientOriginalName();
            $path = 'uploads/tenants';
            $image->move($path, $image_name);
            $data['id_card'] = $path . '/' . $image_name;
            if (File::isFile($user->id_card)) {
                File::delete($user->id_card);
            }
        } else {
            $data['id_card'] = $user->id_card;
        }
            $data['is_verified'] = null;
            $user->profile->update($data);
        }
        return redirect()->route('profile.edit')
            ->withSuccess(__('Berhasil mengupdate profil.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
