@extends('layouts.layout')
@section('title', 'Admin Dashboard')
@section('user', 'Admin')
@section('side-bar')
   	<li>
	    <a href="{{url('ecm-portal/admin/dashboard')}}" class="waves-effect waves-blue"><i class="fa fa fa-dashboard"></i> Dashboard</a>
	</li>
	<li>
	    <a href="" class="yay-sub-toggle waves-effect waves-blue">
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
	    <a href="" class="yay-sub-toggle waves-effect waves-blue">
	        <i class="fa fa-archive"></i> Products 
	        <span class="yay-collapse-icon mdi-navigation-expand-more"></span>
	    </a>
	    <ul>
	    	<li>
	    		<a href="view/products/products" class="view-btn yay-sub-toggle waves-effect waves-blue">
	        		<i class="fa fa-archive"></i> Products 
	    		</a>
	    	</li>
	    	<li>
			    <a href="view/constants/constants" class="view-btn yay-sub-toggle waves-effect waves-blue">
			        <i class="fa fa-cog"></i> Constants
			    </a>
			</li>
	    </ul>
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
	<li>
	    <a href="view/lcs/lcs" class="view-btn yay-sub-toggle waves-effect waves-blue">
	        <i class="fa fa-file"></i> LCs
	    </a>
	</li>
@endsection
@section('contents')
	<div class="row sortable">
	    <div class="col l4 m6 s12">
	        <a href="#" class="card-panel stats-card indigo lighten-2 indigo-text text-lighten-5"><i class="fa fa-comments-o"></i> <span class="count">{{$reports}}</span><div class="name">All Reports</div></a>
	    </div>
	    <div class="col l4 m6 s12">
	        <a href="#" class="card-panel stats-card blue lighten-2 blue-text text-lighten-5">
	        <i class="fa fa-send"></i> <span class="count">342</span>
	        <div class="name">Unread Reports</div></a>
	    </div>
	    <div class="col l4 m6 s12">
	        <a href="#" class="card-panel z-depth-2 stats-card amber lighten-2 amber-text text-lighten-5">
	            <i class="fa fa-cloud-upload"></i><span class="count">58</span>
	            <div class="name">Read Reports</div>
	        </a>
	    </div>
	    <div class="col l4 m6 s12">
	        <div class="card-panel z-depth-2 stats-card green lighten-2 green-text text-lighten-5">
	            <i class="fa fa-spinner"></i> <span class="count temp">{{$reps}}</span>
	            <div class="name">Working Reps</div>
	        </div>
	    </div>
	    <div class="col l4 m6 s12">
	        <div class="card-panel z-depth-2 stats-card green lighten-2 green-text text-lighten-5">
	            <i class="fa fa-spinner"></i> <span class="count">{{$lcs}}</span>
	            <div class="name">LCs Issued</div>
	        </div>
	    </div>
	    <div class="col l4 m6 s12">
	        <div class="card-panel z-depth-2 stats-card green lighten-2 green-text text-lighten-5">
	            <i class="fa fa-spinner"></i> <span class="count">{{$bdcs}}</span>
	            <div class="name">No. of BDCs</div>
	        </div>
	    </div>
	    <div class="col l4 m6 s12">
	        <div class="card-panel z-depth-2 stats-card green lighten-2 green-text text-lighten-5">
	            <i class="fa fa-spinner"></i> <span class="count">{{$banks}}</span>
	            <div class="name">No. of Banks</div>
	        </div>
	    </div>
	    <div class="col l4 m6 s12">
	        <div class="card-panel z-depth-2 stats-card green lighten-2 green-text text-lighten-5">
	            <i class="fa fa-spinner"></i> <span class="count">{{$products}}</span>
	            <div class="name">Products</div>
	        </div>
	    </div>
	    <div class="col l4 m6 s12">
	        <div class="card-panel z-depth-2 stats-card green lighten-2 green-text text-lighten-5">
	            <i class="fa fa-spinner"></i> <span class="count">{{$depots}}</span>
	            <div class="name">Depots</div>
	        </div>
	    </div>
    </div>
@endsection