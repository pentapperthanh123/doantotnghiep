@extends('master')

@section('title', 'Edit Devices')

@section('body')
	@include('partials/navigation_bar')
	@section('title-bar', trans('devices/edit.title'))
	<div class="container-fluid">
		<div class="from-group lb">
			<form action="{{ url('devices/'.$devices->id) }}" method="post">
				@csrf
				{{ method_field('put') }}


				<label >{{ trans('devices/edit.name') }}:</label>
				<label class="alertdevice">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>
				<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : ''}}" value="{{$devices->name}}" placeholder="Enter Name" name="name">

				<label>{{ trans('devices/edit.description') }}:</label>
				<label class="alertdevice">{{ $errors->has('desc') ? $errors->first('desc') : ''}}</label>
				<textarea type="text" class="form-control {{ $errors->has('desc') ? 'has-error' : ''}}" value="{{$devices->desc}}" placeholder="Enter description" name="desc" rows="10"></textarea>

				<label>{{ trans('devices/edit.status') }}:</label>
				<select name="status" class="form-control">
					@foreach(DeviceHelper::getOptionStatus() as $key => $value)
						<option value="{{$key}}">{{$value}}</option>
					@endforeach
				</select><br>

				<label>{{ trans('devices/edit.type_device') }}:</label>
				<select name="typedevice_id" class="form-control" value="{{ $devices->typedevice_id}}">
					@foreach($typedevicesList as $typedevices)
						<option @if($devices->typedevice_id == $typedevices->id) selected @endif value="{{ $typedevices->id }}"> {{ $typedevices->name }} </option>
					@endforeach
				</select>

				<label>{{ trans('devices/edit.computer') }}:</label>
				<select name="computer_id" class="form-control" value="{{ $devices->computer_id}}">
					@foreach($computerList as $computer)
						<option value="{{ $computer->id }}"> {{ $computer->name }} </option>
					@endforeach
				</select>
				<button type="submit" class="btn btn-primary btn-form-user cre">{{ trans('devices/edit.edit') }}</button>
			</form>
		</div>
	</div>

@endsection