<div>
    <!-- Modal -->
	<div wire:ignore class="modal fade" id="updateData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      	<input type="hidden" wire:model="selected_id">
		      <div class="modal-body">
		      	<label>Category</label>
		       	<select class="form-control" wire:model="category_id" name="category_id">
		       		@foreach ($category as $category)
		       		<option value="<?= $category->id ?>">{{ $category->name_category}}</option>
		       		@endforeach
		       	</select>
		       	<label>Photo</label>
		       	<div class="input-group">
				  <div class="custom-file">
				    <input type="file" class="custom-file-input" id="inputGroupFile04" wire:model="photo">
				    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
				  </div>
				  <div class="input-group-append">
				    <button class="btn btn-outline-primary" type="submit" wire:click="update_image()">Save Update Image</button>
				  </div>
				</div>
		       	<label>Name Product</label>
		       	<input type="text" wire:model="name_product" placeholder="Name Product" class="form-control">
		       	<label>Price</label>
		       	<input type="number" wire:model="price" placeholder="Price" class="form-control">
		       	<label>Description</label>
		       	<textarea class="form-control" cols="40" wire:model="description"></textarea>
		       	<label>Discount% <span><i>Optional</i></span></label>
		       	<div class="form-group">
		       		<input type="number" wire:model="discount" class="form-control">
				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" wire:click="update()" class="btn btn-primary">Save Change</button>
		      </div>
	    </div>
	  </div>
	</div>
</div>
