@extends('../layouts/back/base')

@section('title','Dashboard Customers')

@section('content')
	<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Customers</h1>
    </div>

    <!--
    <div class="card bg-primary">
    	<div class="card-body">
    		<div class="d-sm-flex align-items-center justify-content-between mb-4">
		        <h5 class="h5 mb-0 text-white">Cetak PDF</h5>
		    </div>
		    <div class="row">
		    	<div class="col-5">
		    		<input type="date" class="form-control" placeholder="From Date">
		    	</div>
		    	<div class="col-5">
		    		<input type="date" class="form-control" placeholder="End Date">
		    	</div>
		    	<div class="col">
		    		<button type="submit" class="btn btn-light text-primary">Cetak PDF</button>
		    	</div>
		    </div>
    	</div>
    </div>
	-->
    <div class="card">
    	<div class="card-body">
    		<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="unpaid-tab" data-toggle="tab" href="#unpaid" role="tab" aria-controls="unpaid" aria-selected="true">UNPAID</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="paid-tab" data-toggle="tab" href="#paid" role="tab" aria-controls="paid" aria-selected="false">PAID</a>
			  </li>
			</ul>
			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active" id="unpaid" role="tabpanel" aria-labelledby="home-tab">
			  	<livewire:admin.customers.unpaid />
			  </div>
			  <div class="tab-pane fade" id="paid" role="tabpanel" aria-labelledby="paid-tab">
			  	<livewire:admin.customers.paid />
			  </div>
			</div>
    	</div>
    </div>
@endsection

@section('js')

@endsection