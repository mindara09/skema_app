@extends('../layouts/front/base')

@section('title','Success!')

@section('css')

@endsection

@section('content')

<body>
    
	<div class="container">
		<center>
		    <img src="{{ asset('/img/success.gif')}}" class="img-responsive" width="300">
		    <p class="mt-5 mt-5 text-dark" style="font-size: 30px;">yay, segera ambil pesanan kamu ya</p>
		    <a href="{{ url('/verif')}}" class="btn btn-outline-success btn-lg">Back</a>
		</center>
	</div>


@endsection

@section('js')

@endsection