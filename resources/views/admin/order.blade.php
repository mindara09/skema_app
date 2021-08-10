@extends('../layouts/back/base')

@section('title','Dashboard Order')

@section('content')

    <livewire:admin.order.index/>
@endsection

@section('js')
<script>
	// Call the dataTables jQuery plugin
	$(document).ready(function() {
	  $('#table-order').DataTable();
	});

</script>
@endsection