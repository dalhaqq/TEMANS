@extends('layouts.master')
@section('title', 'Edit Operator')
@section('content')
<div class="card">
    <div class="card-header">
    <h4>Ubah Data Operator</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('operators.update', $operator->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
            <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" name="name" value="{{ $operator->name }}">
            @if($errors->has('name'))
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username</label>
            <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" name="username" value="{{ $operator->username }}">
            @if($errors->has('username'))
            <div class="invalid-feedback">
                {{ $errors->first('username') }}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
            <div class="col-sm-12 col-md-7">
            <input type="email" class="form-control" name="email" value="{{ $operator->email }}">
            @if($errors->has('email'))
            <div class="invalid-feedback">
                {{$errors->first('email')}}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <div class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></div>
            <div class="col-sm-12 col-md-7">
            <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
