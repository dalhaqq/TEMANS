<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\OperatorRequest;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operators = User::role('operator')->get();
        return view('operators.index')->with(compact('operators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operators.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OperatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OperatorRequest $request)
    {
        $operator = User::create($request->validated());
        $operator->assignRole('operator');
        return redirect()->route('operators.index')
            ->withSuccess(__('Berhasil menambah operator.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operator = User::findOrFail($id);
        return view('operators.edit')->with(compact('operator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OperatorRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OperatorRequest $request, $id)
    {
        $operator = User::findOrFail($id);
        $operator->update($request->validated());
        return redirect()->route('operators.index')
            ->withSuccess(__('Data operator berhasil diubah.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $operator = User::findOrFail($id);
        $operator->delete();
        return redirect()->route('operators.index')
            ->withSuccess(__('Berhasil menghapus operator.'));
    }
}
