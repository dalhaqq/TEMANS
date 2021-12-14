@extends('layouts.master')
@section('title', 'Kelola Tenant')
@section('content')
<div class="card">
    <div class="card-body">
        @include('layouts.partials.messages')
    <div class="table-responsive">
        <table class="table table-bordered table-md">
        <tbody><tr>
            <th>#</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach($tenants as $tenant)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$tenant->user->name}}</td>
            <td>{{$tenant->address}}</td>
            <td>{{$tenant->phone_number}}</td>
            <td>{{$tenant->is_verified ? "Terverifikasi" : ($tenant->is_verified == false ? "Tidak Terverifikasi" : "Belum Terverifikasi")}}</td>
            <td>
                <a href="{{ route('tenants.show', ['tenant' => $tenant]) }}" class="btn btn-primary float-left">Detail</a>
            </td>
        </tr>
        @endforeach
        </tbody></table>
    </div>
    </div>
</div>
@endsection
