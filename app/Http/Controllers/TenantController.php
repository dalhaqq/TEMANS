<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
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
    public function show(Tenant $tenant)
    {
        return view('tenants.show')->with(compact('tenant'));
    }

    public function verify(Tenant $tenant)
    {
        $tenant->update([
            'is_verified' => true
        ]);
        $tenant->save();
        return redirect(route('tenants.index'))->with('success', 'Berhasil memproses verifikasi tenant');
    }

    public function unverify(Tenant $tenant)
    {
        $tenant->update([
            'is_verified' => false
        ]);
        $tenant->save();
        return redirect(route('tenants.index'))->with('success', 'Berhasil memproses verifikasi tenant');
    }
}
