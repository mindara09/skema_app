<div>
    <!-- Modal -->
	<div wire:ignore class="modal fade" id="updateData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<input type="hidden" wire:model="selected_id">
	      	<!--
	      	<label>Role</label>
	      	<select wire:model="role" class="form-control">
	      		<option selected="">Select role user,,,</option>
	      		<option value="superuser">Superuser</option>
	      		<option value="admin">Admin</option>
	      	</select>
	      	-->
	       	<label>Username</label>
	       	<input type="text" wire:model="username" placeholder="Username" class="form-control">
	       	<label>Password</label>
	       	<input type="password" wire:model="password" placeholder="*********" class="form-control">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" wire:click="update()" class="btn btn-primary">Save Change</button>
	      </div>
	    </div>
	  </div>
	</div>
</div>
