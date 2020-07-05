@extends('master')
@section('title-bar', trans('typedevices/edit.title'))
@section('body')
	@include('partials/navigation_bar')
	<div class="form-user container-fluid">
		<div class="from-group">
			<form action="{{ url('typedevices/'.$typedevices->id) }}" method="post">
				@csrf
				{{ method_field('put') }}
				<label >{{ trans('typedevices/edit.name')}}</label>
				<label class="alertdevice">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>

				<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : ''}}" value="{{$typedevices->name}}" placeholder="Enter Name" name="name">
				<br>
				<div class="from-group">
					<button id="btn-form-user" type="submit" class="btn btn-success">{{ trans('typedevices/edit.update') }}</button>
				</div>
			</form>
		</div>
	</div>

@endsection