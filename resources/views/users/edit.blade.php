@extends('master')

@section('title', trans('users/edit.title'))

@section('body')
	@include('partials/navigation_bar')
	<div class="form-user container-fluid">
{{-- 		@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>	
					@endforeach
				</ul>
			</div>
		@endif --}}
		<form action="{{ url('users/'.$user->id) }}" method="POST">
			@csrf
			{{ method_field('put') }}
			<div class="form-group">
				<label for="">{{ trans('users/edit.username') }}</label>
				<input type="text" class="form-control" name="username" value="{{ $user->username }}" disabled>
			</div>

			@if($errors->has('username'))
				<div class="alert alert-danger">
					{{ $errors->first('username') }}
				</div>
			@endif

			<div class="form-group">
				<label for="">{{ trans('users/edit.password') }}</label>
				<input type="password" class="form-control" name="password" value="{{ $user->password }}">
			</div>

			@if($errors->has('password'))
				<div class="alert alert-danger">
					{{ $errors->first('password') }}
				</div>
			@endif
			<div class="form-group">
				<label for="">{{ trans('users/edit.name') }}</label>
				<input type="text" class="form-control" name="name" value="{{ $user->name }}">
			</div>

			@if($errors->has('name'))
				<div class="alert alert-danger">
					{{ $errors->first('name') }}
				</div>
			@endif
			<div class="form-group">
				<label for="">{{ trans('users/edit.email') }}</label>
				<input type="email" class="form-control" name="email" value="{{ $user->email }}">
			</div>

			@if($errors->has('email'))
				<div class="alert alert-danger">
					{{ $errors->first('email') }}
				</div>
			@endif

			<div class="form-group">
				<label for="">{{ trans('users/edit.role') }}</label>
				<select name="role" class="form-control">
					@foreach( UserHelper::getOptionRole() as $key => $value)
						@if($key == $user->role)
							<option value="{{ $key }}" selected="selected">{{ $value }}</option>
						@else
							<option value="{{ $key }}">{{ $value }}</option>
						@endif
					@endforeach
				</select>
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-success btn-form-user">{{ trans('users/edit.update') }}</button>
			</div>
		</form>
	</div>
@endsection