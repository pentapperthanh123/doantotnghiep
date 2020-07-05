@extends('master')

@section('title', trans('tags/langTag.title').' | '.trans('tags/langTag.create_new_tagTitle'))
@section('title-bar', trans('tags/langTag.create_new_tagTitle'))
@section('body')
	@include('partials/navigation_bar')
	@section('nav-href','users')
{{-- 		<div class="container "> --}}
			<div class="form-user container-fluid">
				<form action="{{ url('tags') }}" method="POST">
					@csrf

{{-- 					<p>
						<h3>
							<center>{{ trans('tags/langTag.create_new_tagTitle') }}</center>
						</h3>
					</p> --}}
				{{-- 	<br> --}}				
					<div class="form-group">
					<label for="">{{ trans('tags/langTag.deviceName')}}:</label>
					<select name="devices_id" class="form-control" >
					@foreach(TagHelper::getOptionStatus() as $key => $value)
						<option value="{{$key}}">{{$value}}</option>
					@endforeach
					</select>
					</div>

					<br>

					<div class="form-group">
					<label for="">{{ trans('tags/langTag.value')}}:</label>
					<input type="text" class="form-control" name="value" placeholder="ex: RTX 2080 Ti" required="required">
					</div>
					@if($errors->has('value'))
						<div class="alert alert-danger">
							{{ $errors->first('value') }}
						</div>
					@endif

					<br>

					<button id="btn-form-user" class="btn btn-success btn-form-user" type="sumbit" >{{trans('tags/langTag.submit')}}</button>
						{{-- <button id="submit" class="btn btn-primary" type="sumbit" onclick="return confirm('{{trans('tags/langTag.confirmCreate')}}'); ">{{trans('tags/langTag.submit')}}</button> --}}
				</form>
			</div>
@endsection
