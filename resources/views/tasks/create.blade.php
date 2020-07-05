@extends('master')

@section('title', trans('tasks/create.title'))

@section('body')
@include('partials/navigation_bar')
	<div class="form-user container-fluid">
		<div class="from-group">
			
			
			<form action="{{ url('tasks') }}" method="POST">
				@csrf
				<label for="">{{ trans('users/create.name') }}</label>
				<label class="alertdevice">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>
				<input type="text" class="form-control" placeholder="Enter Name" name="name">
				
				<button id="btn-form-user" type="submit" class="btn btn-primary">{{ trans('task/create.create') }}</button>
			</form>
		</div>
	</div>	

@endsection