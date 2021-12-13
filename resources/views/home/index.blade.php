@extends(isset(Auth::user()->id) ? 'layouts.master' : 'layouts.base')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    @role('owner')
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{route('stands.index')}}">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-square"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Stand</h4>
                </div>
                <div class="card-body">
                    {{ count($data['stands']) }}
                </div>
            </div>
        </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{route('operators.index')}}">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Operator</h4>
                </div>
                <div class="card-body">
                    {{ count($data['operators']) }}
                </div>
            </div>
        </div>
        </a>
    </div>
    @endrole
</div>
@endsection
