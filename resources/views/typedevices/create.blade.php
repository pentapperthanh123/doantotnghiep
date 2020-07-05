@extends('master')

@section('title-bar', trans('typedevices/create.title'))

@section('body')
@include('partials/navigation_bar')
<div class="container-fluid">
	<div class="from-group">
		<form action="{{ url('typedevices') }}" method="post">
			@csrf
				<label for="name">{{ trans('typedevices/create.name') }}</label>
				<label class="alertdevice">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>
				<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : ''}}" placeholder="Enter Name" name="name" id="name">
				<br>
				
				<button id="btn-form-user" class="btn btn-success btn-form-user" type="sumbit" >{{ trans('typedevices/create.create') }}</button>
		</form>
	</div>
</div>
@endsection