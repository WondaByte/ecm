<div class="row">
	<div class="col s12">
		<h4 class="align-center">DAILY STOCK TAKING REPORT</h4>
		<div class="card-panel">
			<div class="row" class="filter-wrapper">
				<form id="filterForm" action="report" method="post"> 
					
				</form>
			</div>
			<table id="reports" class="display table table-bordered table-striped table-hover white">
				<thead>
					<th>Vehicle No.</th>
					<th>Driver's Name</th>
					<th>Shore Tank</th>
					<th>Order No.</th>
					<th>Waybill No.</th>
					<th>Customer</th>
					<th>Obs Litres</th>
					<th>Obs Temp (&#8451;)</th>
					<th>Density (15&#8451;)</th>
					<th>Litres (15&#8451;)</th>
					<th>Metric Tons (Vac)</th>
					<th>Metric Tons (Air)</th>
					<th>Action</th>
				</thead>
				<tbody>
					
				</tbody>
			</table>
			{{$models->links()}}
		</div>
	</div>
</div>
<input type="hidden" name="density" value="{{$consts[0]->density}}">
<input type="hidden" name="temp" value="{{$consts[0]->obs_temperature}}">