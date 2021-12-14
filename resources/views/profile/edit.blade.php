@extends('layouts.master')
@section('title', 'Edit Profil')
@section('content')
<div class="card">
    <div class="card-header">
    <h4>Ubah Profil</h4>
    </div>
    <div class="card-body">
        @include('layouts.partials.messages')
        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
            <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            @if($errors->has('name'))
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
            @endif
            </div>
        </div>
        @role('tenant')
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
            <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" name="address" value="{{ $user->profile->address ?: old('address') }}">
            @if($errors->has('address'))
            <div class="invalid-feedback">
                {{ $errors->first('address') }}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota</label>
            <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" name="city" value="{{ $user->profile->city ?: old('city') }}">
            @if($errors->has('city'))
            <div class="invalid-feedback">
                {{ $errors->first('city') }}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Pos</label>
            <div class="col-sm-12 col-md-7">
            <input type="number" class="form-control" name="zip_code" value="{{ $user->profile->zip_code ?: old('zip_code') }}">
            @if($errors->has('zip_code'))
            <div class="invalid-feedback">
                {{ $errors->first('zip_code') }}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No HP</label>
            <div class="col-sm-12 col-md-7">
            <input type="text" class="form-control" name="phone_number" value="{{ $user->profile->phone_number ?: old('phone_number') }}">
            @if($errors->has('phone_number'))
            <div class="invalid-feedback">
                {{ $errors->first('phone_number') }}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Diri</label>
            <div class="col-sm-12 col-md-7">
            <div class="form-control"><input type="file" id="photo" name="photo" onchange="pressed(event)"><label id="photoFileLabel"><a href="{{asset($user->profile->photo)}}">{{ $user->profile->photo }}</a></label></div>
            @if($errors->has('photo'))
            <div class="invalid-feedback">
                {{ $errors->first('photo') }}
            </div>
            @endif
            </div>
        </div>
        <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto KTP</label>
            <div class="col-sm-12 col-md-7">
            <div class="form-control"><input type="file" id="id_card" name="id_card" onchange="pressed(event)"><label id="id_cardFileLabel"><a href="{{asset($user->profile->id_card)}}">{{ $user->profile->id_card }}</a></label></div>
            @if($errors->has('id_card'))
            <div class="invalid-feedback">
                {{ $errors->first('id_card') }}
            </div>
            @endif
            </div>
        </div>
        <style>
            input[type=file]{
                width: 90px;
                color:transparent;
            }
        </style>
        <script>
        window.pressed = function(e){
            var input = e.target;
            var label = document.getElementById(input.id + "FileLabel");
            if(input.value == "")
            {
                label.innerHTML = (input.id == "photo" ? "{{ $user->profile->photo }}" : "{{ $user->profile->id_card }}");
            }
            else
            {
                var theSplit = input.value.split('\\');
                label.innerHTML = theSplit[theSplit.length-1];
            }
        };
        </script>
        @endrole()
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
