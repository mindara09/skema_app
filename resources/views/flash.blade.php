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
	@elseif (session('gagal'))
		<div class="alert alert-danger">
			{{ session('gagal')}}
		</div>
	@elseif(session('ubah'))
		<div class="alert alert-success">
			{{ session('ubah')}}
		</div>
	@endif