<a class="btn-floating btn-large red modal-trigger pull-right mb-20" data-target="edit-modal"><i class="mdi-social-person-add"></i></a>

<div class="row">
	<div class="col s12">
		<div class="card-panel">
			<h4>Users</h4>
			<table id="table1" class="display table table-bordered table-striped table-hover white">
				<thead>
					<tr>
						<th>User Name</th>
						<th>E-Mail Address</th>
						<th>Phone</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($models as $user)
						<tr data-id="{{$user->user_id}}">
							<td class="username name">{{$user->username}}</td>
							<td class="email">{{$user->email}}</td>
							<td class="phone">{{$user->phone}}</td>
							<td>{{($user->status === 1)? "Active" : "Not Active"}}</td>
							<td>
								<i class="fa fa-trash modal-trigger" data-action="delete.user" data-target="delete-modal"></i>
			              		<i class="fa fa-pencil modal-trigger" data-action="update.user" data-target="edit-modal"></i>
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
      <h4>Add New User</h4>
      <form action="" method="post">
         <fieldset>
         	<div class="row">
			    <div class="col s12">
			        <label for="username">User Name</label>
			        <input type="text" name="username" class="validate username" id="username" required>
			    </div>
	        </div>
	        <div class="row">
	        	<div class="col s12">
			        <label for="email">Email</label>
			        <input type="email" name="email" class="validate email" id="email" required>
			    </div>
	        </div>
	        <div class="row">
			    <div class="col s12 m6">
			        <label for="username">User Role</label>
			        <select name="role" class="role">
			        	<option></option>
			        	@foreach($roles as $role)
			        		<option value="{{$role->role_id}}">{{$role->slug}}</option>
			        	@endforeach
			        </select>
			    </div>
			    <div class="col s12 m6">
			        <label for="phone">Phone</label>
			        <input type="tel" name="phone" class="validate phone" id="phone" required maxlength="10">
			    </div>
	        </div>
	        <div class="row">
	        	<div class="col s12 m6">
			        <label for="password">Password</label>
			        <input type="password" name="password" class="validate password" id="password" required>
			    </div>
			    <div class="col s12 m6">
			        <label for="password_confirmation">Confirm Password</label>
			        <input type="password" name="password_confirmation" class="validate password_confirmation" id="password_confirmation" required>
			    </div>
	        </div>
         </fieldset>
      </form>
    </div>
    <div class="modal-footer">
      <button type="submit" class="modal-action waves-effect waves-green btn-flat done-btn" data-action="add.user">Done</button>
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