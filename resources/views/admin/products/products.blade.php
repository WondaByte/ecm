<a class="btn-floating btn-large red modal-trigger pull-right mb-20" data-target="edit-modal"><i class="mdi-content-add"></i></a>

<div class="row">
	<div class="col s12">
		<div class="card-panel">
			<h4>Products</h4>
			<table id="table1" class="display table table-bordered table-striped table-hover white">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>LC Number</th>
						<th>Quantity (MT)</th>
						<th>Financing Bank</th>
						<th>Owning BDC</th>
						<th>Depot</th>
						<th>Depot Attendant</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($models as $product)
						<tr data-id="{{ $product->product_id}} ">
							<td class="product_name name">{{ $product->product_name }}</td>
							<td class="lc_reference">{{ $product->lc->lc_reference }}</td>
							<td class="quantity">{{ $product->quantity }}</td>
							<td class="bank">{{ $product->bank->name }}</td>
							<td class="bdc">{{ $product->bdc->name }}</td>
							<td class="depot">{{ $product->depot->name }}</td>
							<td class="username">{{ $product->depot->user->username}}</td>
							<td>
								<i class="fa fa-trash modal-trigger" data-action="delete.product" data-target="delete-modal"></i>
			              		<i class="fa fa-pencil modal-trigger" data-action="update.product" data-target="edit-modal"></i>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

{{$models->links()}}

<div id="edit-modal" class="modal">
    <div class="modal-content">
      <h4>Add New Product</h4>
      <form action="" method="post">
         <fieldset>
         	<div class="row">
			    <div class="col s12">
			        <label for="product-name">Product Name</label>
			        <input type="text" name="product_name" class="validate product_name" id="product-name" required>
			    </div>
	        </div>
	        <div class="row">
	        	<div class="col s12 m6">
			        <label for="quantity">Quantity</label>
			        <input type="text" name="quantity" class="validate quantity" id="quantity" required>
			    </div>
			    <div class="col s12 m6">
			        <label>Depot</label>
			        <select name="depot_id" class="depot">
			        	<option></option>
			        	@foreach($depots as $depot)
			        		<option value="{{$depot->depot_id}}">{{$depot->name}}</option>
			        	@endforeach
			        </select>
			    </div>
	        </div>
	        <div class="row">
			    <div class="col s12 m6">
			        <label>Financing Bank Name</label>
			        <select name="bank_id" class="bank">
			        	<option></option>
			        	@foreach($banks as $bank)
			        		<option value="{{$bank->bank_id}}">{{$bank->name}}</option>
			        	@endforeach
			        </select>
			    </div>
			    <div class="col s12 m6">
			        <label>Owning BDC</label>
			        <select name="bdc_id" class="bdc">
			        	<option></option>
			        	@foreach($bdcs as $bdc)
			        		<option value="{{$bdc->bdc_id}}">{{$bdc->name}}</option>
			        	@endforeach
			        </select>
			    </div>
	        </div>
         </fieldset>
      </form>
    </div>
    <div class="modal-footer">
      <button type="submit" class="modal-action waves-effect waves-green btn-flat done-btn" data-action="add.product">Done</button>
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