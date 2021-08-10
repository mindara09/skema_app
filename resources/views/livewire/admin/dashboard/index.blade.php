<div>
	<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
	<div class="row">
		<!-- Earnings (All) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Earnings (All)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.{{ $payment->pluck('balance_paid')->sum()}} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Customers Paid Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Customers Paid</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $customer->where('status', 'paid')->count()}} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Customers Pending Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Customers Unpaid</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $customer->where('status', 'unpaid')->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Customers Total Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Customers Total</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $customer->count()}} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-auto">
        	<!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Product Favorite</h6>
                </div>
                <div class="card-body">
                	@foreach ($product as $product)
                    <h4 class="small font-weight-bold">{{ $product->name_product}}  <span
                            class="float-right">{{ $order->where('product_id', $product->id)->pluck('quantity')->sum()}} X</span></h4>
                    <div class="progress mb-4">
                    	@if ($order->where('product_id', $product->id)->pluck('quantity')->sum() >= 100)
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $order->where('product_id', $product->id)->pluck('quantity')->sum()}}%"
                            aria-valuenow="{{ $order->where('product_id', $product->id)->pluck('quantity')->sum()}}" aria-valuemin="0" aria-valuemax="100"></div>
                        @elseif ($order->where('product_id', $product->id)->pluck('quantity')->sum() >= 90)
                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $order->where('product_id', $product->id)->pluck('quantity')->sum()}}%"
                            aria-valuenow="{{ $order->where('product_id', $product->id)->pluck('quantity')->sum()}}" aria-valuemin="0" aria-valuemax="100"></div>
                        @elseif ($order->where('product_id', $product->id)->pluck('quantity')->sum() >= 80)
                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ $order->where('product_id', $product->id)->pluck('quantity')->sum()}}%"
                            aria-valuenow="{{ $order->where('product_id', $product->id)->pluck('quantity')->sum()}}" aria-valuemin="0" aria-valuemax="100"></div>
                        @elseif ($order->where('product_id', $product->id)->pluck('quantity')->sum() >= 50)
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $order->where('product_id', $product->id)->pluck('quantity')->sum()}}%"
                            aria-valuenow="{{ $order->where('product_id', $product->id)->pluck('quantity')->sum()}}" aria-valuemin="0" aria-valuemax="100"></div>
                        @else
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $order->where('product_id', $product->id)->pluck('quantity')->sum()}}%"
                            aria-valuenow="{{ $order->where('product_id', $product->id)->pluck('quantity')->sum()}}" aria-valuemin="0" aria-valuemax="100"></div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

	    <div class="col-lg-6 mb-4">

	        <!-- Illustrations -->
	        <div class="card shadow mb-4">
	            <div class="card-header py-3">
	                <h6 class="m-0 font-weight-bold text-primary">Customer Now</h6>
	            </div>
	            <div class="card-body">
                    <table class="table table-stripped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>List Hour</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customerNow->get() as $customers)
                            <tr>
                                <td>{{ $customers->name }}</td>
                                @if ($customers->schedule == 12)
                                <td>12.00 - 13.00</td>
                                @elseif ($customers->schedule == 13)
                                <td>13.00 - 14.00</td>
                                @elseif ($customers->schedule == 14)
                                <td>14.00 - 15.00</td>
                                @elseif ($customers->schedule == 15)
                                <td>15.00 - 16.00</td>
                                @elseif ($customers->schedule == 16)
                                <td>16.00 - 17.00</td>
                                @elseif ($customers->schedule == 17)
                                <td>17.00 - 18.00</td>
                                @elseif ($customers->schedule == 18)
                                <td>18.00 - 19.00</td>
                                @elseif ($customers->schedule == 19)
                                <td>19.00 - 20.00</td>
                                @endif
                            </tr>
                            @endforeach
                            <tr>
                                <th>Total Customer</th>
                                <th>{{ $customerNow->count()}} </th>
                            </tr>
                        </tbody>
                    </table>
	            </div>
	        </div>

	    </div>
	</div>
</div>
