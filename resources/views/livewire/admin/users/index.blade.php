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
			
			
			@include('livewire.admin.users.create')
			@include('livewire.admin.users.update')
			
            <br>

            <table class="table">
            	<thead>
            		<tr>
	            		<th>No</th>
	            		<th>Username</th>
	            		<th>Role</th>
	            		<th>Option</th>
	            	</tr>
            	</thead>
            	<tbody>
            		@foreach( $items as $item)
            		<tr>
	            		<td>{{ $loop->iteration}}</td>
	            		<td>{{ $item->username }} </td>
	            		<td>{{ $item->role }} </td>
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
