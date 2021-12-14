@extends('layouts.master')
@section('title', 'Daftar Stand')
@section('content')
<div class="row">
    @foreach($stands as $stand)
    <div class="col-12 col-sm-6 col-lg-6">
        <div class="card">
            <div class="card-header">
            <h4>Stand No {{$stand->no}} Tipe {{$stand->type}}</h4>
            <div class="card-header-action">
                <a href="{{ route('stands.show', ['stand' => $stand]) }}" class="btn btn-primary">Lihat Detail</a>
            </div>
            </div>
            <div class="card-body">
            <div class="mb-2 text-muted">{{$stand->location}}</div>
            <div class="chocolat-parent">
                <div data-crop-image="285" style="overflow: hidden; position: relative; height: 285px;">
                    <img alt="image" src="{{ asset($stand->image) }}" class="img-fluid">
                </div>
            </div>
            <div class="mt-2 text-muted">{{$stand->description}}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
