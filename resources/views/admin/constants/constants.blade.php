<a class="btn-floating btn-large red modal-trigger pull-right mb-20" data-target="edit-modal"><i class="mdi-content-add"></i></a>

<div class="row">
	<div class="col s12">
		<div class="card-panel">
			<h4>Products Constants</h4>
			<table id="table1" class="display table table-bordered table-striped table-hover white">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Density (@ 15 &#8451;)</th>
						<th>Vc Factor</td>
						<th>Obs Temperature (&#8451;)</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($models as $constant)
						<tr data-id="{{$constant->id}}">
							<td class="product_name name">{{$constant->product->product_name}}</td>
							<td class="density">{{$constant->density}}</td>
							<td class="vcf">{{$constant->vcf}}</td>
							<td class="obs_temperature">{{$constant->obs_temperature}}</td>
							<td>
								<i class="fa fa-trash modal-trigger" data-action="delete.constant" data-target="delete-modal"></i>
			              		<i class="fa fa-pencil modal-trigger" data-action="update.constant" data-target="edit-modal"></i>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
{{-- {{$models->links()}} --}}
<div id="edit-modal" class="modal">
    <div class="modal-content">
      <h4>Add New Constant</h4>
      <form action="" method="post">
         <fieldset>
         	<div class="row">
			    <div class="col m6 s12">
			        <label for="product-name">Product Name</label>
			        <select name="product_id" class="product_id">
			        	<option></option>
			        	@foreach($products as $product)
			        	   <option value="{{$product->product_id}}">{{$product->product_name}}</option>
			        	@endforeach
			        </select>
			    </div>
			    <div class="col m6 s12">
			        <label for="density">Density</label>
			        <input type="text" name="density" class="validate density" id="density" required>
			    </div>
	        </div>
	        <div class="row">
			    <div class="col s12 m6">
			        <label for="vcf">Vc Factor</label>
			        <input type="text" name="vcf" id="vcf" class="validate">
			    </div>
			    <div class="col s12 m6">
			        <label for="obs-temperature">Obs Temperature</label>
			        <input type="text" name="obs_temperature" class="validate obs_temperature" id="obs-temperature" required maxlength="10">
			    </div>
	        </div>
         </fieldset>
      </form>
    </div>
    <div class="modal-footer">
      <button type="submit" class="modal-action waves-effect waves-green btn-flat done-btn" data-action="add.constant">Done</button>
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