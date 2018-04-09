@extends('layouts.layout')
@section('title', 'Admin Dashboard')
@section('side-bar')
   	<li>
	    <a href="{{url('ecm-portal/admin/dashboard')}}" class="waves-effect waves-blue"><i class="fa fa fa-dashboard"></i> Dashboard</a>
	</li>
	<li>
	    <a href="dashboard.html" class="yay-sub-toggle waves-effect waves-blue">
	        <i class="fa fa-archive"></i> Reports 
	        <span class="yay-collapse-icon mdi-navigation-expand-more"></span>
	    </a>
	    <ul>
	    	<li>
			    <a href="view/reports/daily-stock-taking" class="view-btn yay-sub-toggle waves-effect waves-blue">
			        <i class="fa fa-file"></i> Daily Stock Taking 
			    </a>
			</li>
			<li>
			    <a href="view/reports/daily-summary-sheet" class="view-btn yay-sub-toggle waves-effect waves-blue">
			        <i class="fa fa-file"></i>Daily Summary Sheet 
			    </a>
			</li>
			<li>
			    <a href="view/reports/cumulative-stock" class="view-btn yay-sub-toggle waves-effect waves-blue">
			        <i class="fa fa-file"></i> Cumulative Stock
			    </a>
			</li>
	    </ul>
	</li>
	<li>
	    <a href="view/users/users" class="view-btn yay-sub-toggle waves-effect waves-blue">
	        <i class="mdi-social-people"></i> Users 
	    </a>
	</li>
	<li>
	    <a href="view/products/products" class="view-btn yay-sub-toggle waves-effect waves-blue">
	        <i class="fa fa-ship"></i> Products 
	    </a>
	</li>
	<li>
	    <a href="view/bdc/bdc" class="view-btn yay-sub-toggle waves-effect waves-blue">
	        <i class="mdi-maps-directions-train"></i> BDCs 
	    </a>
	</li>
	<li>
	    <a href="view/banks/banks" class="view-btn yay-sub-toggle waves-effect waves-blue">
	        <i class="mdi-communication-business"></i> Banks 
	    </a>
	</li>
	<li>
	    <a href="view/depots/depots" class="view-btn yay-sub-toggle waves-effect waves-blue">
	        <i class="mdi-action-home"></i> Depots
	    </a>
	</li>
@endsection
@section('user', 'Admin')