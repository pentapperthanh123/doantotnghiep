@extends('master')

@section('title', trans('users/create.title'))

@section('body')
	@include('partials/navigation_bar')
	@section('nav-href','users')
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
		<form action="{{ url('users') }}" method="POST">
			@csrf
			<div class="form-group">
				<label for="">{{ trans('users/create.username') }}</label>
				<input type="text" name="username" class="form-control" required="required">
			</div>
			@if($errors->has('username'))
				<div class="alert alert-danger">
					{{ $errors->first('username') }}
				</div>
			@endif
			<div class="form-group">
				<label for="">{{ trans('users/create.password') }}</label>
				<input type="password" name="password" class="form-control" required="required">
			</div>
			@if($errors->has('password'))
				<div class="alert alert-danger">
					{{ $errors->first('password') }}
				</div>
			@endif
			<div class="form-group">
				<label for="">{{ trans('users/create.confirm_password') }}</label>
				<input type="password" name="password_confirmation" class="form-control" required="required">
			</div>
			@if($errors->has('password_confirmation'))
				<div class="alert alert-danger">
					{{ $errors->first('password_confirmation') }}
				</div>
			@endif
			<div class="form-group">
				<label for="">{{ trans('users/create.name') }}</label>
				<input type="text" name="name" class="form-control" required="required">
			</div>
			@if($errors->has('name'))
				<div class="alert alert-danger">
					{{ $errors->first('name') }}
				</div>
			@endif
			<div class="form-group">
				<label for="">{{ trans('users/create.email') }}</label>
				<input type="email" name="email" class="form-control" required="required">
			</div>
			@if($errors->has('email'))
				<div class="alert alert-danger">
					{{ $errors->first('email') }}
				</div>
			@endif
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-form-user">{{ trans('users/create.create') }}</button>
			</div>
		</form>		
	</div>
@endsection