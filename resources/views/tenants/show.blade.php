@extends('layouts.master')
@section('title', 'Detail Tenant')
@section('content')
<div class="card">
    <div class="card-header">
    <h4>Data Tenant</h4>
    </div>
    <div class="card-body">
        @include('layouts.partials.messages')
        <div class="form-group row mb-4">
            <span class="text-md-right col-12 col-md-3 col-lg-3">Nama</span>
            :
            <div class="col-sm-12 col-md-7">
            <span>{{ $tenant->user->name }}</span>
            </div>
        </div>
        <div class="form-group row mb-4">
            <span class="text-md-right col-12 col-md-3 col-lg-3">Email</span>
            :
            <div class="col-sm-12 col-md-7">
            <span>{{ $tenant->user->email }}</span>
            </div>
        </div>
        <div class="form-group row mb-4">
            <span class="text-md-right col-12 col-md-3 col-lg-3">No HP</span>
            :
            <div class="col-sm-12 col-md-7">
            <span>{{ $tenant->phone_number }}</span>
            </div>
        </div>
        <div class="form-group row mb-4">
            <span class="text-md-right col-12 col-md-3 col-lg-3">Alamat</span>
            :
            <div class="col-sm-12 col-md-7">
            <span>{{ $tenant->address }} {{ $tenant->city }} {{ $tenant->zip_code }}</span>
            </div>
        </div>
        <div class="form-group row mb-4">
            <span class="text-md-right col-12 col-md-3 col-lg-3">Foto Diri</span>
            :
            <div class="col-sm-12 col-md-7">
            <span>
                @if($tenant->photo)
                <img src="{{asset($tenant->photo)}}" alt="Foto {{$tenant->user->name}}" class="img img-fluid">
                @else
                Belum Ada
                @endif
            </span>
            </div>
        </div>
        <div class="form-group row mb-4">
            <span class="text-md-right col-12 col-md-3 col-lg-3">Foto KTP</span>
            :
            <div class="col-sm-12 col-md-7">
            <span>
                @if($tenant->id_card)
                <img src="{{asset($tenant->id_card)}}" alt="KTP {{$tenant->user->name}}" class="img img-fluid">
                @else
                Belum Ada
                @endif
            </span>
            </div>
        </div>
        <div class="form-group row mb-4">
            <span class="text-md-right col-12 col-md-3 col-lg-3">Status</span>
            :
            <div class="col-sm-12 col-md-7">
            <span>{{$tenant->is_verified ? "Terverifikasi" : ($tenant->is_verified == false ? "Tidak Terverifikasi" : "Belum Terverifikasi")}}</span>
            </div>
        </div>
        @if($tenant->is_verified == null)
        <div class="form-group row mb-4">
            <form class="text-md-right col-12 col-md-3 col-lg-3" action="{{route('tenants.unverify', ['tenant' => $tenant])}}" method="post">
            @csrf
                <input class="btn btn-danger" type="submit" value="Tolak">
            </form>
            <form class="col-sm-12 col-md-7" action="{{route('tenants.verify', ['tenant' => $tenant])}}" method="post">
            @csrf
                <input class="btn btn-primary" type="submit" value="Verifikasi">
            </form>
        </div>
        @endif
    </div>
</div>
@endsection
