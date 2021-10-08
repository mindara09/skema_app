<div class="container">
	<div class="card mb-5 mt-5">
		<div class="card-body">
			<div class="row">
				<div class="col">
					<h4 class="container text-dark">Dashboard Order</h4>
				</div>
				<div class="col-3"></div>
				<div class="col-3"></div>
				<div class="col">
					<button onClick="window.location.reload();" class="btn btn-primary ml-5">Refresh Page</button>
				</div>
			</div>
			<hr>
			@include('flash')
			<div class="container">
				<div class="row mt-5">
				  <div class="col-lg-3">
				  	<input type="text" class="form-control mb-3" placeholder="Search ID Receipt" wire:model="search">
				    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				      @foreach ($payment as $payment)
				      @if ($customer->where('id', $payment->customer_id)->where('status', 'paid'))
				      <a class="nav-link" id="{{ $payment->id_receipt}}-tab" data-toggle="pill" href="#{{ $payment->id_receipt}}" role="tab" aria-controls="{{ $payment->id_receipt}}" aria-selected="false">{{ $payment->id_receipt}}</a>
				      @endif
				      @endforeach
				    </div>
				  </div>
				  <div class="col-lg-9">
				    <div class="tab-content" id="v-pills-tabContent">
				      @foreach ($payments as $payments)
				      <div wire:ignore class="tab-pane fade" id="{{ $payments->id_receipt }}" role="tabpanel" aria-labelledby="{{ $payment->id_receipt}}-tab">
				      	<h5 class="text-dark">PAYMENT</h5>
				      	<table class="table table-hover table-bordered">
				      		<tr>
				      			<th colspan="4">ID RECEIPT : {{ $payments->id_receipt }}</th>
				      			<th>Status : {{ str_replace(array('"','[',']'), '', $customer->where('id', $payments->customer_id)->pluck('status'))}}</th>
				      		</tr>
				      		<tr>
				      			<th colspan="5">Name : {{ str_replace(array('"','[',']'), '', $customer->where('id', $payments->customer_id)->pluck('name'))}}</th>
				      		</tr>
				      		<tr>
				      			<th colspan="5">Phone : {{ str_replace(array('"','[',']'), '', $customer->where('id', $payments->customer_id)->pluck('phone'))}}</th>
				      		</tr>
				      		<tr>
				      			<th colspan="5">Email : {{ str_replace(array('"','[',']'), '', $customer->where('id', $payments->customer_id)->pluck('email'))}}</th>
				      		</tr>
				      		<tr>
				      		</tr>
				    		<tr>
				    			<th>Product</th>
				    			<th colspan="3">Quantity</th>
				    			<th style="width: 200px;">Price</th>
				    		</tr>
				    		@foreach ($order as $orders)
				    		@if ($orders->customer_id == $payments->customer_id)
				    		<tr>
				    			<td>
				    				{{ str_replace(array('"','[',']'), '', $products->where('id', $orders->product_id)->pluck('name_product'))}}
				    			</td>
				    			<td colspan="3">{{ $orders->quantity }}</td>
				    			<td>{{ $payments->balance_paid }} </td>
				    		</tr>
				    		@endif
				    		@endforeach
				    		<hr>
				    		<tr class="table-stripped">
				    			<th colspan="4">Total</th>
				    			<th colspan="2">{{ $payments->balance_paid }} </th>
				    		</tr>
				    		<tr>
				    			<td colspan="4">
				    				Amount Pay :
				    			</td>
				    			<td>
				    				<input type="number" class="form-control" wire:model="amount_pay" value="0">
				    			</td>
				    		</tr>
				    		<tr>
				    			<td colspan="4">
				    				Change :
				    			</td>
				    			<td>
				    				@if ($amount_pay)
				    				{{ $amount_pay - $payments->balance_paid }}
				    				@endif
				    			</td>
				    		</tr>
				    	</table>
				    	<button type="submit" wire:click="save({{ $payments->id}}, {{ $payments->customer_id}})" class="btn btn-primary btn-md ml-auto">Save changes</button>
				      </div>
				      @endforeach
				    </div>
				  </div>
				</div>
			</div>
		</div>
	</div>

	

	

</div>
