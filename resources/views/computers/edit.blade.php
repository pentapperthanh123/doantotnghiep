@extends('master')

@section('title', 'Computers')

@section('body')
@include('partials/navigation_bar')

<div class="container-fluid">
		<div class="form-group form-user">
			<form action="{{ url('computers/'.$computers->id) }}" method="POST">
			@csrf
			{{ method_field('put') }}
			<label for="name">{{ trans('computer/edit.name')}} :</label>
			<label class="alertcpt">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>
			<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : ''}}" name="name" value="{{ $computers->name }}" placeholder="Enter Name..."><br>

			<label for="desc">{{ trans('computer/edit.desc')}} :</label>
			<label class="alertcpt">{{ $errors->has('desc') ? $errors->first('desc') : ''}}</label>
			<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : ''}}" name="desc" value="{{ $computers->desc }}" placeholder="Enter Desc..."><br>

			<label for="status">{{ trans('computer/edit.status')}} :</label>
			<select name="status" class="form-control">
				@foreach(ComputerHelper::getOptionStatus() as $key => $value)
					<option value="{{ $key }}">{{ $value }}</option>
				@endforeach
			</select><br>
			
		

			<label for="rooms-id">{{ trans('computer/edit.roomsID')}} :</label>
			<select name="rooms-id" class="form-control" value="{{ $computers->rooms_id  }}">
				@foreach($roomList as $room)
					<option value="{{ $room->id  }}">{{ $room->name }}</option>
				@endforeach
			</select>

			<button class="btn btn-danger btn-form-user" type="submit">{{ trans('computer/edit.submit')}}</button>
			</form>
		</div>
	</div>

@endsection