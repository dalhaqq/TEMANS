@extends('layouts.master')
@section('title', 'Edit Bisnis')
@section('content')
<div class="card">
    <div class="card-header">
    <h4>Ubah Data Bisnis</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('business.update', ['business' => $business]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
            <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" name="name" value="{{ $business->name }}">
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
            <input type="text" class="form-control" name="product_type" value="{{ $business->product_type }}">
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
            <input type="number" class="form-control" name="revenue" value="{{ $business->revenue }}">
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
            <div class="form-control"><input type="file" id="proposal" name="proposal" onchange="pressed()"><label id="fileLabel"><a href="{{asset($business->proposal)}}">{{ $business->proposal }}</a></label></div>
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
                <style>
            input[type=file]{
                width: 90px;
                color:transparent;
            }
            #fileLabel{
                word-wrap: break-word;
            }
        </style>
        <script>
        window.pressed = function(){
            var input = document.getElementById('proposal');
            if(input.value == "")
            {
                fileLabel.innerHTML = "{{ $business->proposal }}";
            }
            else
            {
                var theSplit = input.value.split('\\');
                fileLabel.innerHTML = theSplit[theSplit.length-1];
            }
        };
        </script>
    </div>
</div>
@endsection
