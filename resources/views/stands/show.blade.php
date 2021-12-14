@extends('layouts.master')
@section('title', 'Lihat Stand')
@section('content')
<div class="card">
    <div class="card-header">
    <h4>Stand No {{$stand->no}} Tipe {{$stand->type}}</h4>
    </div>
    <div class="card-body">
        <div class="chocolat-parent">
            <div style="overflow: hidden; position: relative;">
                <img alt="image" src="{{ asset($stand->image) }}" class="img-fluid">
            </div>
        </div>
        <div class="mt-2 h6">{{$stand->location}}</div>
        <div class="mt-2 h6">{{$stand->description}}</div>
    </div>
</div>
@endsection
