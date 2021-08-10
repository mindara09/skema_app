<div>

	@include('flash')
	<div class="card">
		<div class="card-body">	
			
			
			@include('livewire.admin.categories.create')
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#icons">
			  List Icon
			</button>
			<!-- Modal -->
			<div class="modal fade" id="icons" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Icon List</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<table class="table table-hover table-stripped">
			      		<thead>
			      			<tr>
			      				<th>Name Icon</th>
			      				<th>Icon</th>
			      			</tr>
			      		</thead>
			      		<tbody>
			      			@foreach ($icons as $icons)
			      			<tr>
			      				<td>{{ str_replace('.png', '', "$icons->name_icon" )}}</td>
			      				<td><img src="{{ asset('/icon-coffee')}}/{{ $icons->name_icon}}" class="img-thumbnail" width="50" height="50"></td>
			      			</tr>
			      			@endforeach
			      		</tbody>
			      	</table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
			@include('livewire.admin.categories.update')
			
            <br>

            <table class="table">
            	<thead>
            		<tr>
	            		<th>No</th>
	            		<th>Icon</th>
	            		<th>Name Category</th>
	            		<th>Option</th>
	            	</tr>
            	</thead>
            	<tbody>
            		@foreach( $items as $item)
            		<tr>
	            		<td>{{ $loop->iteration}}</td>
	            		<td><img src="{{ asset('/icon-coffee')}}/{{ $icons->where('id', $item->icon_id)->first()->name_icon}}" class="img-thumbnail" width="50" height="50"></td>
	            		<td>{{ $item->name_category}}</td>
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
