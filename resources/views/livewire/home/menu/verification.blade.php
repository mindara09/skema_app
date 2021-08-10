<div class="container">
	<div class="card" style="border-radius: 30px; box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.25);">
		<div class="card-title mt-5">
			<center>
				<h4 class="text-dark">Verification Reservation</h5>
			</center>
		</div>
		<form wire:submit.prevent="find_customer">
			<div class="card-body">
				<div class="container">
					<center>
						<input type="number" wire:model="phone" class="form-control mb-3 col-lg-3">
						<button type="submit" class="btn btn-primary">Verif</button>
					</center>

					@if ($errors->any())
					    <div class="container">
					        <div class="alert alert-danger" id="messages">
					            <ul>
					                @foreach ($errors->all() as $error)
					                    <li>{{ $error }}</li>
					                @endforeach
					            </ul>
					        </div>
					    </div>
					@elseif (session('berhasil'))
						<div class="alert alert-success mt-5" id="messages">
							{{ session('berhasil')}}
						</div>
					@elseif (session('gagal'))
						<div class="alert alert-danger mt-5" id="messages">
							{{ session('gagal')}}
						</div>
					@endif
				</div>
			</div>
		</form>

	</div>
</div>
