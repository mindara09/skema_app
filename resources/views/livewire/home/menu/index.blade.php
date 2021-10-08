<div>
    <!--
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light animate__animated animate__fadeInDown" style="background-color: white;">
      <div class="container">
          <a class="navbar-brand" href="#">
              <img src="{{ asset('/img/logo-skema.png')}}" width="30">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="" class="nav-link">Home</a>
                </li> 
                <li class="nav-item">
                    <a href="" class="nav-link">Menu</a>
                </li> 
                <li class="nav-item">
                    <a href="" class="nav-link">About Us</a>
                </li> 
                <li class="nav-item">
                    <a href="" class="nav-link">Contact Us</a>
                </li> 
                <li class="nav-item">
                    <a href="" class="nav-link btn text-white" style="border-radius: 30px; width: 120px; background-color: #120F0E;">Reservation</a>
                </li>
            </ul>
          </div>
      </div>
    </nav>
    -->

    <div class="container mt-5">
    	@include('flash')
        <div class="tab-content" id="nav-menu">
          <div class="tab-pane fade show active" id="menu" role="tabpanel" aria-labelledby="menu-tab">
                {{-- Header --}}
                <div class="mt-1">
                    <h3 class="text-dark display-5 animate__animated animate__fadeInDown">Halo {{ $customer_name }} </h3>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ml-auto">
                            <a class="nav-link dropdown-toggle text-dark animate__animated animate__fadeInDown" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-shopping-cart " aria-hidden="true"></i><span class="badge badge-pill badge-danger">{{ $order->where('customer_id', $customer_id)->where('status', "pending")->count()}} </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                @foreach ($order as $orders)
                                @if ($orders->customer_id == $customer_id && $orders->status == "pending")
                                <a class="dropdown-item" href="#">{{ str_replace(array('"','[',']'), ' ', $products->where('id', $orders->product_id)->pluck('name_product'))}} &nbsp;{{ $orders->quantity}}X &nbsp;<button wire:click="destroy_order({{ $orders->id}})" style="border: none; background-color: white;">
                                    <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                </button></a>
                                @endif
                                @endforeach
                                
                                <div class="dropdown-divider"></div>
                                  <center>
                                      <a class="dropdown-item btn text-white" id="checkout-tab" data-toggle="pill" href="#checkout" role="tab" aria-controls="checkout" aria-selected="false" style="background-color: #120F0E;"><i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp;Checkout</a>
                                  </center>
                                </div>
                        </li>
                    </ul>

                    <div class="card mt-4 mb-5" style="border-radius: 30px; box-shadow: 10px 20px 10px rgba(0, 0, 0, 0.25); height: 400px; background-color: #120F0E;">
                         <div class="card-body">
                            <div class="row">
                                <div class="col-lg mt-5">
                                    <h1 class="text-white aktiv-grotesk animate__animated animate__fadeInUp" style="font-weight: 700;">Coffee is a hug in a mug..</h1>
                                    <br>
                                    <h5 class="text-white aktiv-grotesk animate__animated animate__fadeInUp" >- SKEMA COFFEE ARCHETYPE -</h5>
                                </div>
                                <div class="col">
                                    <center>
                                        <img src="{{ asset('/img/logo-white-skema.png')}}" class="img-responsive d-none d-lg-block mt-5 animate__animated animate__fadeInUp" width="120" >
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Menu --}}
                    <hr class="hr-3">
                    <div data-aos="fade-up">
                        <h4 class="text-dark m-4 mb-3">Categories Menu</h4>
                        
                        <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                            @foreach ($categories as $categories)
                            <li class="nav-item m-4" style="border-style: solid; border-radius: 10px;">
                                <a class="nav-link" id="{{ $categories->name_category }}-tab" data-toggle="pill" href="#category{{ $categories->id }}" role="tab" aria-controls="{{ $categories->name_category }}" aria-selected="true">
                                    <img src="{{ asset('/icon-coffee')}}/{{ $icons->where('id', $categories->icon_id)->first()->name_icon}}" class="img-responsive" width="50" height="50">
                                    <br>
                                    <span class="mt-5">{{ $categories->name_category }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            @foreach($category as $categories)
                            <div class="tab-pane fade show animate__animated animate__fadeInLeft" id="category{{$categories->id}}" role="tabpanel" aria-labelledby="pills-{{$categories->name_category}}-tab">
                                <div class="row mt-5">
                                    @foreach($products as $product)
                                    @if ($product->category_id == $categories->id)
                                        <div class="col-sm col-sm-4 mb-1">
                                            {{-- Mobile Mode --}}
                                            <div class="card mb-3" style="border-radius: 30px; box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.25);">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5 class="mt-4 text-dark">{{ $product->name_product}} </h5>
                                                            <p style="font-size: 12px;" > {{ $product->description}} </p>
                                                            @if ($product->status == "empty")
                                                            <h5 class="text-danger">Out of Stock</h5>
                                                            @else
                                                                @if (!empty($product->discount))
                                                                <p class=""><del>Rp.{{ $product->price }}</del></p>
                                                                <h5 class="text-dark">Rp.{{ $product->price - ($product->price * $product->discount / 100) }}</h5>
                                                                @elseif (empty($product->discount))
                                                                <h5 class="text-dark mt-4">Rp.{{ $product->price }}</h5>
                                                                @endif
                                                            @endif
                                                        </div>
                                                        <div class="col">
                                                            <center>
                                                                <img class="img-responsive rounded mt-4" style="border: none;" src="{{ asset('/storage/img/products')}}/{{ $product->photo}}" alt="Card image cap" height="100" width="100">
                                                                <br>
                                                                @if ($product->status == "available")
                                                                <a href="" class="btn text-white mt-2" style="border-radius: 30px; background-color: #120F0E; width: 100px;" data-toggle="modal" data-target="#editProduct{{ $product->id}}">Add</a>
                                                                @endif
                                                            </center>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <hr class="mt-5">
                    {{-- Promo --}}
                    <div data-aos="fade-up">
                        <h4 class="text-dark"><i class="fa fa-star text-dark" aria-hidden="true"></i>&nbsp; Promo Special Today For You..</h4>

                        <div class="row mt-5">
                            @foreach ($products as $product)
                            @if (!empty($product->discount))
                            <div class="col-lg col-lg-4 mb-3">
                                {{-- Mobile Mode --}}
                                <div class="card mb-3" style="border-radius: 30px; box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.25);">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="mt-4 text-dark">{{ $product->name_product}}</h5>
                                                <p style="font-size: 12px;" >{{ $product->description}}</p>
                                                <del class=" mt-4">Rp. {{ $product->price}}</del>
                                                <h5 class="text-dark mt-1">Rp.{{ $product->price - ($product->price * $product->discount / 100) }} </h5>
                                            </div>
                                            <div class="col">
                                                <center>
                                                    <img class="img-responsive rounded mt-4" style="border: none;" src="{{ asset('/storage/img/products')}}/{{ $product->photo}}" alt="Card image cap" height="100" width="100">
                                                    <br>
                                                    <!-- Button trigger modal -->
                                                    <a href="" class="btn text-white mt-2" style="border-radius: 30px; background-color: #120F0E; width: 100px;" data-toggle="modal" data-target="#editProduct{{ $product->id}}">Add</a>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>

				   	@foreach ($products as $product)
                    <!-- Modal --> 
                    <div wire:ignore class="modal fade" id="editProduct{{ $product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
					  	<div class="modal-dialog" role="document">
					    	<div class="modal-content rounded-30">
					      		<div class="modal-header">
					        		<h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
					      		</div>
					      	<form>
						      	<div class="modal-body">
							        <center>
							        	<img src="{{ asset('/storage/img/products')}}/{{ $product->photo}}" class="img-thumbnail rounded mt-5" width="200">
							        </center>
							        <div class="container">
                                        @if (!empty($product->discount))
							        	<p class="mt-2">
							        		<span style="font-size: 22px;" class="text-dark">{{ $product->name_category}} </span>
							        		<br>
                                            <del><span style="font-size: 16px">Rp. {{ $product->price}} </span></del>
							        		<span style="font-size: 16px" class="text-dark">Rp. {{ $product->price - ($product->price * $product->discount / 100) }}} </span>
							        		<br>
							        		<span style="font-size: 16px" class="text-dark">{{ $product->description}} </span>
							        		{{ $quantity }}
							        	</p>
                                        @elseif(empty($product->discount))
                                        <p class="mt-2">
                                            <span style="font-size: 22px;" class="text-dark">{{ $product->name_category}} </span>
                                            <br>
                                            <span style="font-size: 16px" class="text-dark">Rp. {{ $product->price}} </span>
                                            <br>
                                            <span style="font-size: 16px" class="text-dark">{{ $product->description}} </span>
                                            {{ $quantity }}
                                        </p>
                                        @endif
							        		<label>Quantity</label>
							        		<input type="number" class="form-control rounded-30" wire:model="quantity">
							        </div>
							    </div>
						      	<div class="modal-footer">
						        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    @if (!empty($product->discount))
						        	<button type="submit" class="btn btn-primary" wire:click="save_order({{ $product->id}},{{ $price = $product->price - ($product->price * $product->discount / 100)}},{{ $customer_id}})">Order</button>
                                    @elseif(empty($product->discount))
                                    <button type="submit" class="btn btn-primary" wire:click="save_order({{ $product->id}},{{ $price = $product->price}},{{ $customer_id}})">Order</button>
                                    @endif
						      	</div>
					      	</form>
					    </div>
					  </div>
					</div>
					@endforeach

                </div>
          </div>
          <div class="tab-pane fade" id="checkout" role="tabpanel" aria-labelledby="checkout-tab">
                {{-- Checkout --}}
                <ul class="nav justify-content-end">
                  <li class="nav-item" id="menu-tab" data-toggle="pill" href="#menu" role="tab" aria-controls="menu" aria-selected="true">
                    <a class="nav-link text-white btn btn-dark" href="#"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
                  </li>
                </ul>
                <h4 class="text-dark mb-3"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Your Order</h4>
                <div class="row">
                    <div class="col-lg-7">
                        <table class="table">
                        	@foreach ($order as $order)
                            @if ($order->customer_id == $customer_id && $order->status == "pending")
                            <tr>
                                <td style="width: 200px;">
                                    <img src="{{ asset('/storage/img/products')}}/{{ str_replace(array('"','[',']'), '', $products->where('id', $order->product_id)->pluck('photo'))}}" class="img-responsive mt-4 rounded" style="border: none;" width="100">
                                </td>
                                <td>
                                    <h5 class="card-title mt-3 text-dark"><b>{{ str_replace(array('"','[',']'), ' ', $products->where('id', $order->product_id)->pluck('name_product'))}}</b></h5>
                                    <p>
                                        Quantity : <span class="text-dark">{{ $order->quantity}} </span>
                                        <br>
                                        Price : <span class="text-dark">Rp. {{ $order->price }}</span>
                                    </p>
                                    <button wire:click="destroy_order({{ $order->id}})" class="btn btn-link btn-danger text-white">
                                        <i class="fa fa-trash text-white" aria-hidden="true"></i> Remove
                                    </button>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </table>
                    </div>
                    <div class="col-lg-5">
                        <div class="card" style="border-radius: 30px; box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.25);">
                            <div class="card-body">
                                <div class="container">
                                    <h5 class="card-title"><i class="fa fa-credit-card" aria-hidden="true"></i> Checkout</h5>
                                    <hr>
                                    <form>
                                        <input type="hidden" name="customer_id" value="{{ $customer_id}} ">
                                        <label>Phone Number Verification :</label>
                                        <input type="number" class="form-control" wire:model="phone" placeholder="{{ $customer_phone}} ">
                                        <label>Name :</label>
                                        <input type="number" class="form-control" wire:model="name" placeholder="{{ $customer_name}} ">
                                        <label>Email :</label>
                                        <input type="number" class="form-control" wire:model="email" placeholder="{{ $customer_email}} ">
                                    </form>
                                    <hr>
                                    <p>Sub Total : Rp.{{ $sub_total }} </p>
                                    <p class="mb-3">PPN 10% : Rp.{{ $ppn }} </p>
                                    <hr>
                                    <h5 class="mb-3 text-dark">Total : Rp.{{ $total }} </h5>
                                    <p>* for payment at the cashier</p>
                                    <button type="submit" class="btn btn-primary btn-lg" wire:click="order({{$customer_id}}, {{ $total}} )">Submit Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
        </div>
    </div>
</div>
