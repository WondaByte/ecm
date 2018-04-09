@extends('layouts.auth-form')
@section('title', ' User Registration')
@section('action', url('ecm-portal/register'))
@section('form-name', 'Register New User')
@section('fields')
	@if(session()->has('mismatch'))
	    <div class="alert" role="alert">
	        {!!session()->get('mismatch')!!}
	    </div>
    @endif
	<div class="input-field">
		<i class="fa fa-user prefix"></i> 
		<input id="username-input" type="text" value="{{ old('username') }}" name="username" placeholder="Username" required>
	</div>
	<div class="input-field">
		<i class="fa fa-envelope prefix"></i> 
		<input id="email-input" type="email" value="{{ old('email') }}" name="email" placeholder="E-mail" required>
	</div>
	<div class="input-field">
		<i class="fa fa-lock prefix"></i> 
		<input id="password-input" type="password" name="password" placeholder="Password" required>
	</div>
	<div class="input-field">
		<i class="fa fa-lock prefix"></i> 
		<input id="confirm-password-input" type="password" name="password_confirmation" placeholder="Confirm Password" required>
	</div>
	<div class="input-field">
		<i class="fa fa-phone prefix"></i> 
		<input id="phone" type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone" required>
	</div>
@endsection
@section('button-text', 'Register User')