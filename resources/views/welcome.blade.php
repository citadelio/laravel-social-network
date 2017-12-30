@extends('layouts.app')
@section('title')
    Home
    @endsection
@section('content')
    <div style="display: block; margin: 20px auto;" class="text-center">
    <h1> Welcome to <b>LSV2</b></h1>
    <small><a href="{{url('/register')}}">Create an account</a> or <a href="{{url('/login')}}">Login to an existing account</a> </small>
    </div>

 @endsection