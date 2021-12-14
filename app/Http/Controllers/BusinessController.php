<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessRequest;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses = Auth::user()->profile->businesses;
        return view('business.index')->with(compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusinessRequest $request)
    {
        $data = $request->validated();
        $data['tenant_id'] = Auth::user()->profile->id;
        $proposal = $request->file('proposal');
        $filename = time()."_".$proposal->getClientOriginalName();
        $path = 'uploads/business';
        $proposal->move($path, $filename);
        $data['proposal'] = $path . '/' . $filename;
        Business::create($data);
        return redirect()->route('business.index')
            ->withSuccess(__('Berhasil menambah bisnis.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        return view('business.edit')->with(compact('business'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(BusinessRequest $request, Business $business)
    {
        $data = $request->validated();
        if ($request->hasFile('proposal')){
            $proposal = $request->file('proposal');
            $proposal_name = time()."_".$proposal->getClientOriginalName();
            $path = 'uploads/business';
            $proposal->move($path, $proposal_name);
            $data['proposal'] = $path . '/' . $proposal_name;
            if (File::exists($business->proposal)) {
                File::delete($business->proposal);
            }
        } else {
            $data['proposal'] = $business->proposal;
        }
        $business->update($data);
        return redirect()->route('business.index')
            ->withSuccess(__('Berhasil mengubah data bisnis.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        $filename = $business->proposal;
        if(File::exists($filename)) {
            File::delete($filename);
        }
        $business->delete();
        return redirect()->route('business.index')
            ->withSuccess(__('Berhasil menghapus bisnis.'));
    }
}
