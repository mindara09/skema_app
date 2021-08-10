<div>
    <!-- Modal -->
	<div wire:ignore class="modal fade" id="updateData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Edit Discount Product</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      	<input type="hidden" wire:model="selected_id">
		      <div class="modal-body">
		      	<label>Product</label>
		       	<select class="form-control" wire:model="product_id">
		       		@foreach ($product as $product)
		       		<option value="<?= $product->id ?>">{{ $product->name_product}}</option>
		       		@endforeach
		       	</select>
		       	<label>Discount</label>
		       	<input type="number" wire:model="discount" class="form-control">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" wire:click="update()" class="btn btn-primary">Save Change</button>
		      </div>
	    </div>
	  </div>
	</div>
</div>
