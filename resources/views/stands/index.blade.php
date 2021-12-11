@extends('layouts.master')
@section('title', 'Kelola Stand')
@section('content')
<div class="card">
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-md">
        <tbody><tr>
            <th>#</th>
            <th>No</th>
            <th>Lokasi</th>
            <th>Harga</th>
            <th>Luas</th>
            <th>Tipe</th>
            <th>Deskripsi</th>
            <th>Fasilitas</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        @foreach($stands as $stand)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$stand->no}}</td>
            <td>{{$stand->location}}</td>
            <td>{{$stand->price}}</td>
            <td>{{$stand->area}}m<sup>2</sup></td>
            <td>{{$stand->type}}</td>
            <td>{{$stand->description}}</td>
            <td>{{$stand->facilities}}</td>
            <td><img src="{{asset($stand->image)}}" alt="Stand {{$stand->type . $stand->no}}" class="img img-fluid"></td>
            <td>
                <a href="{{ route('stands.edit', ['stand' => $stand->id]) }}" class="btn btn-primary float-left">Edit</a>
                <form action="{{ route('stands.destroy', ['stand' => $stand->id]) }}" method="post" class="float-left">
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
