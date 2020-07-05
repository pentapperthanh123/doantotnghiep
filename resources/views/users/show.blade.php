@extends('master')

@section('title', 'Profile '.$user->name )

@section('body')

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-push-1">
				<table class="list-user">
					<thead>
						<tr>
							<th>Name</th>
							<th>Username</th>
							<th>Email</th>
							<th>Role</th>
							<th>Option</th>
						</tr>
					</thead>
						<tbody>
							<tr>
								<td>{{ $user->name }}</td>
								<td>{{ $user->username }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->role }}</td>
								<td>
									<a href="{{ url('users/'.$user->id.'/edit') }}"><button type="button" class="btn btn-info">Edit</button></a>
								</td>
							</tr>
						</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection