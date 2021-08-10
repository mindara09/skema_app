<div>
    <!-- Modal -->
	<div wire:ignore class="modal fade" id="updateData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <input type="hidden" wire:model="selected_id">
	      <div class="modal-body">
	      	<label>Icon</label>
	      	<select class="form-control" wire:model="icon_id">
	      		<option selected="">Select Icon</option>
	      		@foreach ($icon_update as $icon)
	      		<option value="{{ $icon->id}}" >{{ str_replace('.png', '', "$icon->name_icon" )}}</option>
	      		@endforeach
	      	</select>
	       	<label>Name Category</label>
	       	<input type="text" wire:model="name_category" placeholder="Name Category" class="form-control">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" wire:click="update()" class="btn btn-primary">Save changes</button>
	      </div>
		    
	    </div>
	  </div>
	</div>
</div>
