<div>
	<table class="table table-hover table-stripped">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($paid as $paid)
			<tr>
				<td>{{ $loop->iteration}}</td>
				<td>{{ $paid->name }}</td>
				<td>{{ $paid->email }}</td>
				<td>{{ $paid->phone }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
