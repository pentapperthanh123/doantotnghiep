@section('title', trans('task/edit.title'))
@extends('master')
@section('title', 'Task Manager')

@section('body')
	@include('partials/navigation_bar')
	<div class="container-fluid">
		<div class="from-group">
			<form action="{{ url('tasks/'.$tasks->id) }}" method="POST">
				@csrf
				{{ method_field('put') }}

				<label for="">{{ trans('task/edit.name') }}</label>
				<label class="alertdevice">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>
				<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : ''}}" value="{{$tasks->name}}" placeholder="Enter Name" name="name">



				<button id="btn-form-user" type="submit" class="btn btn-success">{{ trans('task/edit.update') }}</button>
			</form>
		</div>
	</div>

@endsection