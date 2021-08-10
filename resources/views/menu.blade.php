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
    

    <img src="{{ asset('/img/wave-black.svg')}}" class="img-responsive">


@endsection

@section('js')

@endsection