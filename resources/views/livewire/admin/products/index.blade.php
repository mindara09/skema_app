<div>

	@if ($errors->any())
	    <div class="container">
	        <div class="alert alert-danger">
	            <ul>
	                @foreach ($errors->all() as $error)
	                    <li>{{ $error }}</li>
	                @endforeach
	            </ul>
	        </div>
	    </div>
	@elseif (session('berhasil'))
		<div class="alert alert-success">
			{{ session('berhasil')}}
		</div>
	@elseif (session('hapus'))
		<div class="alert alert-danger">
			{{ session('hapus')}}
		</div>
	@elseif (session('gagal_hapus'))
		<div class="alert alert-danger">
			{{ session('gagal_hapus')}}
		</div>
	@elseif(session('ubah'))
		<div class="alert alert-success">
			{{ session('ubah')}}
		</div>
	@endif
	<div class="card">
		<div class="card-body">	
			
			
			@include('livewire.admin.products.create')
			@include('livewire.admin.products.update')
			
            <br>
            <div class="table-responsive">
	            <table class="table">
	            	<thead>
	            		<tr>
		            		<th>No</th>
		            		<th>Category</th>
		            		<th>Photo</th>
		            		<th>Name Product</th>
		            		<th>Price</th>
		            		<th>Desc</th>
		            		<th>Discount (%)</th>
		            		<th>Total Price</th>
		            		<th colspan="2">Option</th>
		            	</tr>
	            	</thead>
	            	<tbody>
	            		@foreach( $items as $item)
	            		<tr>
		            		<td>{{ $loop->iteration}}</td>
		            		<td>{{ str_replace(array('"','[',']'), ' ', $category->where('id', $item->category_id)->pluck('name_category'))}}</td>
		            		<td>
		            			<img src="{{ asset('/storage/img/products') }}/{{ $item->photo}}" class="img-responsive" width="100" height="100">
		            		</td>
		            		<td>{{ $item->name_product}}</td>
		            		<td>{{ $item->price}}</td>
		            		<td>{{ $item->description}}</td>
		            		<td>{{ $item->discount}}%</td>
		            		@if (!empty($item->discount))
		            		<td>{{ $item->price - ($item->price * $item->discount / 100)  }} </td>
		            		@else
		            		<td>{{ $item->price}}</td>
		            		@endif
		            		<td></td>
		            		<td>
		            			<div class="form-button-action">
									<button wire:click="edit({{ $item->id }})" class="btn btn-link btn-primary btn-sm" data-target="#updateData" data-toggle="modal">
										<i class="fa fa-edit text-white"></i>
									</button>
									<button wire:click="destroy({{ $item->id }})" class="btn btn-link btn-danger btn-sm" >
										<i class="fa fa-times text-white"></i>
									</button>
								</div>
		            		</td>

		            	</tr>
		            	@endforeach
	            	</tbody>
	            </table>
            </div>
		</div>
	</div>
	
</div>
