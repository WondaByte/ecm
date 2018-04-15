@extends('layouts.layout')
@section('title', 'Bank Dashboard')
@section('user', 'Bank')
@section('side-bar')
	<li>
	    <a href="{{route('bank/dashboard')}}" class="waves-effect waves-blue"><i class="fa fa fa-dashboard"></i> Dashboard</a>
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
@section('contents')
	<div class="row sortable">
		<div class="col l4 m6 s12">
	        <div class="card-panel z-depth-2 stats-card indigo lighten-2 indigo-text text-lighten-5">
	            <i class="fa fa-file"></i> <span class="count">1000</span>
	            <div class="name">Reports</div>
	        </div>
	    </div>
	    <div class="col l4 m6 s12">
	        <div class="card-panel z-depth-2 stats-card blue lighten-2 blue-text text-lighten-5">
	            <i class="fa fa-spinner"></i> <span class="count">200</span>
	            <div class="name">Read Reports</div>
	        </div>
	    </div>
	    <div class="col l4 m6 s12">
	        <div class="card-panel z-depth-2 stats-card green lighten-2 green-text text-lighten-5">
	            <i class="fa fa-spinner"></i> <span class="count">20</span>
	            <div class="name">unread Reports</div>
	        </div>
	    </div>
	    <div class="col l4 m6 s12">
	        <div class="card-panel z-depth-2 stats-card green lighten-2 green-text text-lighten-5">
	            <i class="fa fa-spinner"></i> <span class="count">10</span>
	            <div class="name">Financed Products</div>
	        </div>
	    </div>
	</div>
@endsection