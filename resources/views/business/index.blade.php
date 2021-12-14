@extends('layouts.master')
@section('title', 'Kelola Bisnis')
@section('content')
<div class="card">
    <div class="card-body">
        @include('layouts.partials.messages')
    <div class="table-responsive">
        <a href="{{ route('business.create') }}" class="btn btn-primary mt-2 mb-3">Tambah Baru</a>
        <table class="table table-bordered table-md">
        <tbody><tr>
            <th>#</th>
            <th>Nama</th>
            <th>Jenis Produk</th>
            <th>Omzet</th>
            <th>Proposal</th>
            <th>Aksi</th>
        </tr>
        @foreach($businesses as $business)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$business->name}}</td>
            <td>{{$business->product_type}}</td>
            <td>{{$business->revenue}}</td>
            <td><a href="{{asset($business->proposal)}}">Lihat Proposal</a></td>
            <td>
                <a href="{{ route('business.edit', ['business' => $business]) }}" class="btn btn-primary float-left">Edit</a>
                <form action="{{ route('business.destroy', ['business' => $business]) }}" method="post" class="float-left">
                    <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?');" type="submit">Hapus</button>
                    @csrf
                    @method('delete')
                </form>
            </td>
        </tr>
        @endforeach
        </tbody></table>
    </div>
    </div>
</div>
@endsection
