<?php

namespace App\Http\Controllers;

use App\Http\Requests\StandRequest;
use App\Models\Stand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stands = Stand::all();
        return view('stands.index')->with(compact('stands'));
    }

    public function list()
    {
        $stands = Stand::all();
        return view('stands.list')->with(compact('stands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StandRequest $request)
    {
        $data = $request->validated();
        $image = $request->file('image');
        $image_name = time()."_".$image->getClientOriginalName();
        $path = 'uploads/stands';
        $image->move($path, $image_name);
        $data['image'] = $path . '/' . $image_name;
        Stand::create($data);
        return redirect()->route('stands.index')
            ->withSuccess(__('Berhasil menambah stand.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stand  $stand
     * @return \Illuminate\Http\Response
     */
    public function show(Stand $stand)
    {
        return view('stands.show')->with(compact('stand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stand  $stand
     * @return \Illuminate\Http\Response
     */
    public function edit(Stand $stand)
    {
        return view('stands.edit')->with(compact('stand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stand  $stand
     * @return \Illuminate\Http\Response
     */
    public function update(StandRequest $request, Stand $stand)
    {
        $data = $request->validated();
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time()."_".$image->getClientOriginalName();
            $path = 'uploads/stands';
            $image->move($path, $image_name);
            $data['image'] = $path . '/' . $image_name;
            if (File::exists($stand->image)) {
                File::delete($stand->image);
            }
        } else {
            $data['image'] = $stand->image;
        }
        $stand->update($data);
        return redirect()->route('stands.index')
            ->withSuccess(__('Berhasil mengubah data stand.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stand  $stand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stand $stand)
    {
        $filename = $stand->image;
        if(File::exists($filename)) {
            File::delete($filename);
        }
        $stand->delete();
        return redirect()->route('stands.index')
            ->withSuccess(__('Berhasil menghapus stand.'));
    }
}
