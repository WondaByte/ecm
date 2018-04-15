<a class="btn-floating btn-large red modal-trigger pull-right mb-20" data-target="edit-modal"><i class="mdi-content-add"></i></a>

<div class="row">
	<div class="col s12">
		<div class="card-panel">
			<h4>BDCs</h4>
			<table id="table1" class="display table table-bordered table-striped table-hover white">
				<thead>
					<tr>
						<th>Name</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($models as $bdc)
						<tr data-id="{{$bdc->bdc_id}}">
							<td class="bdc_name name">{{$bdc->name}}</td>
							<td class="address">{{$bdc->address}}</td>
							<td class="phone">{{$bdc->phone}}</td>
							<td>
								<i class="fa fa-trash modal-trigger" data-action="delete.bdc" data-target="delete-modal"></i>
			              		<i class="fa fa-pencil modal-trigger" data-action="update.bdc" data-target="edit-modal"></i>
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
      <h4>Add New BDC</h4>
      <form action="" method="post">
         <fieldset>
         	<div class="row">
			    <div class="col s12">
			        <label for="bdc-name">BDC Name</label>
			        <input type="text" name="bdc_name" class="validate bdc_name" id="bdc-name" required>
			    </div>
	        </div>
	        <div class="row">
			    <div class="col s12 m6">
			        <label for="address">Address</label>
			        <input type="text" name="address" class="validate address" id="address" required>
			    </div>
			    <div class="col s12 m6">
			        <label for="phone">Phone</label>
			        <input type="tel" name="phone" class="validate phone" id="phone" required>
			    </div>
	        </div>	  	        
         </fieldset>
      </form>
    </div>
    <div class="modal-footer">
      <button type="submit" class="modal-action waves-effect waves-green btn-flat done-btn" data-action="add.bdc">Done</button>
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