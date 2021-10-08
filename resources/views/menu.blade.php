@extends('../layouts/front/base')

@section('title','Reservation Menu')

@section('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&display=swap" rel="stylesheet">
@endsection

@section('content')

<!-- 
<body style="background-image: url('{{ asset('img/svg.png')}}'); position: relative; background-repeat: no-repeat; background-size: contain;">  
-->
<body>
    
    <livewire:home.menu.index :customer="$customer" />
    

    <div class="container">
    	<div class="card" style="background-color: #120F0E; border-radius: 30px; margin-top: 100px;">
	    	<div class="card-body">
	    		<center>
			    	 <h3 class="text-white">Contact Us</h3>
			    	 <h5 class="text-white">Contact us if you need anything</h5>
			    	 <br>
			    	 <h2><a href="#" class="btn btn-light btn-lg"><i class="fa fa-phone text-dark" aria-hidden="true"></i>&nbsp;Whatsapp : 085862120201</a></h2>
			    </center>
	    	</div>
	    </div>
    </div>


    <img src="{{ asset('/img/wave-black.svg')}}" class="img-responsive">


@endsection

@section('js')

@endsection