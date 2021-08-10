<div>
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="h5 mb-0 text-gray-800">Products</h5>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addData"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Product Discount</a>
    </div>
    <!-- Modal -->
	<div wire:ignore class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add Product Discount</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      	<form wire:submit.prevent="save" enctype="multipart/form-data">
		      <div class="modal-body">
		      	<label>Name Product</label>
		       	<select class="form-control" wire:model="product_id" name="product_id">
		       		<option selected="" >Select Products</option>
		       		@foreach ($product as $product)
		       		<option value="<?= $product->id ?>">{{ $product->name_product}}</option>
		       		@endforeach
		       	</select>
		       	<label>Discount (Numeric)</label>
		       	<input type="number" wire:model="discount" class="form-control">
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save</button>
		      </div>
		    </form>
	    </div>
	  </div>
	</div>
</div>
