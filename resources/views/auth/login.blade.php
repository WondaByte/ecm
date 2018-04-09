@extends('layouts.auth-form')
@section('title', ' User Sign In')
@section('action', '/ecm-portal/auth/login')
@section('form-name','Sign in')
@section('fields')
	@if(session()->has('message'))
	    <div class="alert" role="alert">
	        {!!session()->get('message')!!}
	    </div>
    @endif
	<div class="input-field">
		<i class="fa fa-user prefix"></i> 
		<input id="username-input" type="text" value="{{old('username')}}" name="username" class="validate" placeholder="Username" required>
	</div>
	<div class="input-field">
		<i class="fa fa-unlock-alt prefix"></i> 
		<input id="password-input" type="password" name="password" placeholder="Password" class="validate" required>
	</div>
	<div class="switch">
		<label><input type="checkbox" checked="checked" name="remember"> <span class="lever"></span> Remember</label>
	</div>
@endsection
@section('forget-password')
	<div class="links right-align">
      	<a href="{{url('ecm-portal/auth/reset-password')}}">Forgot Password?</a>
    </div>
@endsection
@section('button-text')
	Sign in
@endsection