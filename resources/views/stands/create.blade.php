@extends('layouts.master')
@section('title', 'Tambah Stand')
@section('content')
<div class="card">
    <div class="card-header">
    <h4>Tambah Stand Baru</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('stands.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No</label>
            <div class="col-sm-12 col-md-7">
            <input type="number" class="form-control" name="no" value="{{ old('no') }}">
            @if($errors->has('no'))
            <div class="invalid-feedback">
                {{ $errors->first('no') }}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
            <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" name="location" value="{{ old('location') }}">
            @if($errors->has('location'))
            <div class="invalid-feedback">
                {{ $errors->first('location') }}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
            <div class="col-sm-12 col-md-7">
            <input type="number" class="form-control" name="price" value="{{ old('price') }}">
            @if($errors->has('price'))
            <div class="invalid-feedback">
                {{$errors->first('price')}}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Luas (m<sup>2</sup>)</label>
            <div class="col-sm-12 col-md-7">
            <input type="number" class="form-control" name="area" value="{{ old('area') }}">
            @if($errors->has('area'))
            <div class="invalid-feedback">
                {{$errors->first('area')}}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipe</label>
            <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" name="type" value="{{ old('type') }}">
            @if($errors->has('type'))
            <div class="invalid-feedback">
                {{ $errors->first('type') }}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
            <div class="col-sm-12 col-md-7">
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            @if($errors->has('description'))
            <div class="invalid-feedback">
                {{ $errors->first('description') }}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fasilitas</label>
            <div class="col-sm-12 col-md-7">
            <textarea name="facilities" class="form-control">{{ old('facilities') }}</textarea>
            @if($errors->has('facilities'))
            <div class="invalid-feedback">
                {{ $errors->first('facilities') }}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
            <div class="col-sm-12 col-md-7">
            <input type="file" class="form-control" name="image" value="{{ old('image') }}">
            @if($errors->has('image'))
            <div class="invalid-feedback">
                {{ $errors->first('image') }}
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
