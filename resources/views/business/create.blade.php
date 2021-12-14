@extends('layouts.master')
@section('title', 'Tambah Bisnis')
@section('content')
<div class="card">
    <div class="card-header">
    <h4>Tambah Bisnis Baru</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('business.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
            <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            @if($errors->has('name'))
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Produk</label>
            <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" name="product_type" value="{{ old('product_type') }}">
            @if($errors->has('product_type'))
            <div class="invalid-feedback">
                {{ $errors->first('product_type') }}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Omzet</label>
            <div class="col-sm-12 col-md-7">
            <input type="number" class="form-control" name="revenue" value="{{ old('revenue') }}">
            @if($errors->has('revenue'))
            <div class="invalid-feedback">
                {{$errors->first('revenue')}}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Proposal</label>
            <div class="col-sm-12 col-md-7">
            <input type="file" class="form-control" name="proposal" value="{{ old('proposal') }}">
            @if($errors->has('proposal'))
            <div class="invalid-feedback">
                {{ $errors->first('proposal') }}
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
