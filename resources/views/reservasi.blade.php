@extends('../layouts/front/base')

@section('title','Reservation Menu')

@section('content')

<body style="background-color: #120F0E;">
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
    <div class="container mt-5">
        <div class="card" style="border-radius: 30px; box-shadow: 0px 20px 4px rgba(0, 0, 0, 0.25);">
            <div class="card-body">
                <div class="row">
                    

                    <div class="col-lg-6 col-md-3 col-md-12 animate__animated animate__fadeInLeft d-none d-lg-block">
                        <center>
                            <img src="{{ asset('img/skema-logo.png')}}" class="img-responsive" width="400" style="margin-top: 160px;">
                        </center>
                    </div>
                    <div class="col-lg-6 col-md-3 col-md-12 animate__animated animate__fadeInRight">
                        <div class="container">
                            <b>
                                <center><h3 class="mt-5 text-dark display-5">RESERVATION</h3></center>
                            </b>

                            <livewire:home.reservasi.create />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div data-aos="zoom-in-right">
            <div class="card mt-5" style="border-radius: 30px; box-shadow: 0px 20px 4px rgba(0, 0, 0, 0.25);">
                <div class="card-body">
                    <div class="container">
                        <center>
                            <h3 data-aos="zoom-in-down" class="mt-5 text-dark">HOUR</h3>
                        </center>
                        <p data-aos="zoom-in-down">Date : {{ $dateNow->format('l, j  F Y') }}</p>

                        <table class="table table-striped">
                            <tr class="bg-light text-dark" data-aos="zoom-in-down">
                                <th>Hours</th>
                                <th>Status</th>
                            </tr>
                            <tr data-aos="zoom-in-down">
                                <td>12.00 - 13.00</td>
                                <td>
                                    @if ($customer->where('schedule', 12)->count() == 25 && !empty($customer->where('created_at', 'LIKE', '%'.$dateNow->format('Y-m-d').'%')))
                                    <span class="badge badge-pill badge-danger">Full</span>
                                    @else
                                    <span class="badge badge-pill badge-primary">Empty</span>
                                    @endif
                                </td>
                            </tr>
                            <tr data-aos="zoom-in-down">
                                <td>13.00 - 14.00</td>
                                <td>
                                    @if ($customer->where('schedule', 13)->count() == 25 && !empty($customer->where('created_at', 'LIKE', '%'.$dateNow->format('Y-m-d').'%')))

                                    <span class="badge badge-pill badge-danger">Full</span>
                                    @else
                                    <span class="badge badge-pill badge-primary">Empty</span>
                                    @endif
                                </td>
                            </tr>
                            <tr data-aos="zoom-in-down">
                                <td>14.00 - 15.00</td>
                                <td>
                                    @if ($customer->where('schedule', 14)->count() == 25 && !empty($customer->where('created_at', 'LIKE', '%'.$dateNow->format('Y-m-d').'%')))

                                    <span class="badge badge-pill badge-danger">Full</span>
                                    @else
                                    <span class="badge badge-pill badge-primary">Empty</span>
                                    @endif
                                </td>
                            </tr>
                            <tr data-aos="zoom-in-down">
                                <td>15.00 - 16.00</td>
                                <td>
                                    @if ($customer->where('schedule', 15)->count() == 25 && !empty($customer->where('created_at', 'LIKE', '%'.$dateNow->format('Y-m-d').'%')))

                                    <span class="badge badge-pill badge-danger">Full</span>
                                    @else
                                    <span class="badge badge-pill badge-primary">Empty</span>
                                    @endif
                                </td>
                            </tr>
                            <tr data-aos="zoom-in-down">
                                <td>16.00 - 17.00</td>
                                <td>
                                    @if ($customer->where('schedule', 16)->count() == 25 && !empty($customer->where('created_at', 'LIKE', '%'.$dateNow->format('Y-m-d').'%')))
                                    <span class="badge badge-pill badge-danger">Full</span>
                                    @else
                                    <span class="badge badge-pill badge-primary">Empty</span>
                                    @endif
                                </td>
                            </tr>
                            <tr data-aos="zoom-in-down">
                                <td>17.00 - 18.00</td>
                                <td>
                                    @if ($customer->where('schedule', 17)->count() == 25 && !empty($customer->where('created_at', 'LIKE', '%'.$dateNow->format('Y-m-d').'%')))

                                    <span class="badge badge-pill badge-danger">Full</span>
                                    @else
                                    <span class="badge badge-pill badge-primary">Empty</span>
                                    @endif
                                </td>
                            </tr>
                            <tr data-aos="zoom-in-down">
                                <td>18.00 - 19.00</td>
                                <td>
                                    @if ($customer->where('schedule', 18)->count() == 25 && !empty($customer->where('created_at', 'LIKE', '%'.$dateNow->format('Y-m-d').'%')))
                                    <span class="badge badge-pill badge-danger">Full</span>
                                    @else
                                    <span class="badge badge-pill badge-primary">Empty</span>
                                    @endif
                                </td>
                            </tr>
                            <tr data-aos="zoom-in-down">
                                <td>19.00 - 20.00</td>
                                <td>
                                    @if ($customer->where('schedule', 19)->count() == 25 && !empty($customer->where('created_at', 'LIKE', '%'.$dateNow->format('Y-m-d').'%')))
                                    <span class="badge badge-pill badge-danger">Full</span>
                                    @else
                                    <span class="badge badge-pill badge-primary">Empty</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="{{ asset('/img/wave-reservasi.svg')}}" class="img-responsive">


@endsection

@section('js')


@endsection