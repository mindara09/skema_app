@extends('../layouts/front/base')

@section('title','Verif Menu')

@section('css')

@endsection

@section('content')

<body>
    
    <div style="margin-top: 100px; margin-bottom: 50px;">
    	<center>
    		
    		<img src="{{ asset('/img/skema-logo.png')}}" class="img-responsive mb-5" width="300">
    	</center>
    	<livewire:home.menu.verification />
    </div>

    <img src="{{ asset('/img/wave-verif.svg')}}" class="img-responsive">


@endsection

@section('js')

@endsection