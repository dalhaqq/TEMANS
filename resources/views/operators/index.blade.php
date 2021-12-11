@extends('layouts.master')
@section('title', 'Kelola Operator')
@section('content')
<div class="card">
    <div class="card-body">
        @include('layouts.partials.messages')
    <div class="table-responsive">
        <a href="{{ route('operators.create') }}" class="btn btn-primary mt-2 mb-3">Tambah Baru</a>
        <table class="table table-bordered table-md">
        <tbody><tr>
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
        @foreach($operators as $operator)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$operator->name}}</td>
            <td>{{$operator->email}}</td>
            <td>{{$operator->username}}</td>
            <td>
                <a href="{{ route('operators.edit', ['operator' => $operator->id]) }}" class="btn btn-primary float-left">Edit</a>
                <form action="{{ route('operators.destroy', ['operator' => $operator->id]) }}" method="post" class="float-left">
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
