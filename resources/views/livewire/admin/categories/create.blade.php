<div>
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="h5 mb-0 text-gray-800">Categories</h5>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addData"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Category</a>
    </div>
    <!-- Modal -->
	<div wire:ignore class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      	<form wire:submit.prevent="save">
		      <div class="modal-body">
		      	<label>Icon</label>
		      	<select class="form-control" wire:model="icon_id">
		      		<option selected="">Select Icon</option>
		      		@foreach ($icons as $icon)
		      		<option value="{{ $icon->id}}" ><img src="{{ asset('/icon-coffee')}}/{{ $icon->name_icon}}" class="img-responsive">{{ str_replace('.png', '', "$icon->name_icon" )}}</option>
		      		@endforeach
		      	</select>
		       	<label>Name Category</label>
		       	<input type="text" wire:model="name_category" placeholder="Name Category" class="form-control">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save</button>
		      </div>
		    </form>
	    </div>
	  </div>
	</div>
</div>
