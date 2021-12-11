@extends(Auth::user() != null ? 'layouts.master' : 'layouts.base');
@section('title', '404 Not Found')
@section('content')
<div class="alert alert-warning" role="alert">
    <i class="fa fa-error"></i>
    Halaman tidak ditemukan
</div>
@endsection
