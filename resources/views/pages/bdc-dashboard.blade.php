@extends('layouts.layout')
@section('title', 'BDC Dashboard')
@section('side-bar')
	<li>
	    <a href="{{route('bdc/dashboard')}}" class="waves-effect waves-blue"><i class="fa fa fa-dashboard"></i> Dashboard</a>
	</li>
	<li>
	    <a href="dashboard.html" class="yay-sub-toggle waves-effect waves-blue">
	        <i class="fa fa-archive"></i> Reports 
	        <span class="yay-collapse-icon mdi-navigation-expand-more"></span>
	    </a>
	    <ul>
	        <li>
	            <a href="#!" class="waves-effect waves-blue"><i class="fa fa-file"></i>Daily Stock Taking</a>
	        </li>
	        <li>
	            <a href="#!" class="waves-effect waves-blue"><i class="fa fa-file"></i>Daily Summary Sheet</a>
	        </li>
	        <li>
	            <a href="#!" class="waves-effect waves-blue"><i class="fa fa-file"></i> Cumulative Stock</a>
	        </li>
	    </ul>
	</li>
@endsection
@section('user', 'BDC')