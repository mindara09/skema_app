<div>
	<div wire:ignore.self>
		@include('flash')
		<form wire:submit.prevent="save" class="mt-5" >
			<label class="mt-4">Name :</label>
			<input type="text" wire:model="name" class="form-control" placeholder="Full Name.." style="background-color: #F2F0F0;">
			<label class="mt-4">Phone Number :</label>
			<input type="text" wire:model="phone" class="form-control" placeholder="Phone Number.." style="background-color: #F2F0F0;">
			<label class="mt-4">Email :</label>
			<input type="text" wire:model="email" class="form-control" placeholder="Email Address.." style="background-color: #F2F0F0;">

			<label class="mt-4">List Hour :</label>
			<select class="form-control" style="background-color: #F2F0F0;" wire:model="schedule">
				<option selected="">Select Hour</option>
				<option value="12">12.00 - 13.00</option>
				<option value="13">13.00 - 14.00</option>
				<option value="14">14.00 - 15.00</option>
				<option value="15">15.00 - 16.00</option>
				<option value="16">16.00 - 17.00</option>
				<option value="17">17.00 - 18.00</option>
				<option value="18">18.00 - 19.00</option>
				<option value="19">19.00 - 20.00</option>
			</select>

			<button type="submit" class="btn btn-md mt-5 text-light" style="background-color: #120F0E; width: 200px;">SUBMIT</button>
		</form>
	</div>
</div>
