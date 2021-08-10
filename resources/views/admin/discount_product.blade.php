@extends('../layouts/back/base')

@section('title','Dashboard Promotion Products')

@section('content')
	<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Discount Products</h1>
    </div>

    <livewire:admin.promotion-products.index/>
@endsection

@section('js')

@endsection