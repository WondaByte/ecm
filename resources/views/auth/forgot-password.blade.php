@extends('layouts.auth-form')
@section('action', 'ecm-portal/auth/reset-password')
@section('fields')
	<div class="input-field">
		<i class="fa fa-user prefix"></i> 
		<input id="username-input" type="text" name="username" class="validate" placeholder="Username" required>
	</div>
	<div class="input-field">
		<i class="fa fa-unlock-alt prefix"></i> 
		<input id="password-input" type="password" name="password" placeholder="Password" class="validate" required>
	</div>
	<div class="input-field">
		<i class="fa fa-unlock-alt prefix"></i> 
		<input id="password-input" type="password" name="confirm_password" placeholder="Confirm Password" class="validate" required>
	</div>
@endsection
@section('button-text')
	reset password
@endsection