<div class="row">
	<div class="col s12">
		<h4 class="align-center">DAILY STOCK TAKING REPORT</h4>
		<div class="card-panel">
			<div class="row" class="filter-wrapper">
				<form id="filterForm" action="report" method="post"> 
					<div class="col m2 s6">
						<small>Filter by field rep</small>
						<select name="rep" class="filter">
							<option>--choose--</option>
							<option value="all">All</option>
							@foreach($reps as $rep)
							   <option value="{{$rep->user_id}}">{{$rep->username}}</option>
							@endforeach
						</select>
					</div>
					<div class="col m2 s6">
						<small>Filter by Date</small>
						<select name="date">
							<option>--choose--</option>
							<option>sony</option>
						</select>
					</div>
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
					@foreach($models as $report)
						<tr data-id="{{$report->report_id}}">
							<td>{{$report->vehicle_number}}</td>
							<td>{{$report->driver_name}}</td>
							<td>{{$report->shore_tank_number}}</td>
							<td>{{$report->order_number}}</td>
							<td>{{$report->waybill_number}}</td>
							<td>{{$report->customer}}</td>
							<td>{{$report->obs_litres}}</td>
							<td>{{$consts[0]->obs_temperature}}</td>
							<td>{{$consts[0]->density}}</td>
							<td>{{$report->litres_at_15_deg}}</td>
							<td>{{$report->metric_tons_vac}}</td>
							<td>{{$report->metric_tons_air}}</td>
							<td>
								<i class="fa fa-trash modal-trigger" data-action="delete.report" data-target="delete-modal"></i>
			            		<i class="fa fa-pencil modal-trigger" data-action="update.report" data-target="edit-modal"></i>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{$models->links()}}
		</div>
	</div>
</div>
<input type="hidden" name="density" value="{{$consts[0]->density}}">
<input type="hidden" name="temp" value="{{$consts[0]->obs_temperature}}">