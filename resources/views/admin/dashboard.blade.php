
@extends('admin.layout.base')
@section('title', 'Dashboard')

@section('content')
    <div class="dashboard">
        <div class="row expanded">
            <h2>Dashboard</h2>
            {!! \App\Classes\CSRFToken::_token() !!}
            <br>
            {!! \App\Classes\Session::get('token') !!}
        </div>
    </div>
@endsection