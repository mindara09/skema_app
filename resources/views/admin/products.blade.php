@extends('../layouts/back/base')

@section('title','Dashboard Categories')

@section('content')
	<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Products</h1>
    </div>

    <livewire:admin.products.index />
@endsection

@section('js')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#discount').on('change', function(){
        var discount = $(this).val();
        if ( discount == "y") {
          $(".percent").empty();
          $('.percent').append('<div class="form-group"><label>Percent : </label><input type="number" wire:model="percent" placeholder="Percent" class="form-control"></div>');  
        }
        else{
          $(".percent").empty();
        }
      });
    });
  </script>
@endsection