<a class="btn-floating btn-large red modal-trigger pull-right mb-20" data-target="edit-modal"><i class="mdi-content-add"></i></a>

<div class="row">
	<div class="col s12">
		<div class="card-panel">
			<h4>LCs</h4>
			<table id="table1" class="display table table-bordered table-striped table-hover white">
				<thead>
					<tr>
						<th>LC Ref Number</th>
						<th>LC Value (US$)</th>
						<th>Supplier of Product</th>
						<th>Date Issued</th>
						<th>Date of Expiry</th>
						<th>Description of Product (MT)</th>
						<th>Port of Discharge</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($models as $lc)
						<tr data-id="{{$lc->lc_id}}">
							<td class="name">{{$lc->lc_reference}}</td>
							<td class="location">{{$lc->lc_value}}</td>
							<td class="phone">{{$lc->supplier}}</td>
							<td class="date_issued">{{$lc->date_issued}}</td>
							<td class="date_expired">{{$lc->date_expired}}</td>
							<td class="product_id">{{$lc->product->quantity}}</td>
							<td class="port">{{$lc->port}}</td>
							<td>
								<i class="fa fa-trash modal-trigger" data-action="delete.depot" data-target="delete-modal"></i>
			              		<i class="fa fa-pencil modal-trigger" data-action="update.depot" data-target="edit-modal"></i>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>		
	</div>
</div>
<div id="edit-modal" class="modal">
    <div class="modal-content">
      <h4>Add New LC</h4>
      <form action="" method="post">
         <fieldset>
         	<div class="row">
			    <div class="col m6 s12">
			        <label for="depot-name">Depot Name</label>
			        <input type="text" name="name" class="validate name" id="depot-name" required>
			    </div>
			    <div class="col s12 m6">
			        <label for="location">Location</label>
			        <input type="text" name="location" class="validate location" id="location" required>
			    </div>
	        </div>
	        <div class="row">
			    <div class="col s12 m6">
			        <label for="phone">Phone</label>
			        <input type="tel" name="phone" class="validate phone" id="phone" required>
			    </div>
			    <div class="col s12 m6">
			        <label for="user_name">Depot Attendant</label>
			        <input type="text" name="user_name" class="validate user_name" id="user_name" required>
			    </div>
	        </div>	  	        
         </fieldset>
      </form>
    </div>
    <div class="modal-footer">
      <button type="submit" class="modal-action waves-effect waves-green btn-flat done-btn" data-action="add.depot">Done</button>
      <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</button>
    </div>
</div>
<div class="modal" id="delete-modal">
    <div class="modal-content">
        <h4>Delete Permanently</h4>
        <p>Are you sure you want to delete <b class="text-holder"></b> ?</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action waves-effect waves-green btn-flat del">Delete</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
    </div>
</div>