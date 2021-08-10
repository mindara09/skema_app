@extends('../layouts/back/base')

@section('title','Dashboard Users')

@section('content')
	<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Users</h1>
    </div>

    <livewire:admin.users.index />
@endsection

@section('js')

@endsection