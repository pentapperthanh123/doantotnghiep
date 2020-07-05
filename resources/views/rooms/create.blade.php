@extends('master')

@section('title', 'Room manage')



@section('body')
<div class="navigation-bar">
						<div class="btn-close">
							<a href="http://127.0.0.1:8000/rooms">X</a></div>
					</div>
		<div class="container-fluid dange">

			<div class="form-group">

				<form action="{{ url('rooms') }}" method="POST">
					@csrf
		            
				<div class="form-rooms container-fluid">
					<div class="form-group">
					    <label for="" class="room">{{ trans('rooms/langRooms.name')}}:</label>
						<label class="alertroom" >{{ $errors-> has('name') ? $errors->first('name') :''}}</label>
						<input type="text" class="form-control  {{ $errors-> has('name') ? 'errors' :''}}"  name="name" placeholder="Name">
					</div>
					

					<label for="" class="room">{{ trans('rooms/langRooms.desc')}}:</label>

					<label class="alertroom" >{{ $errors-> has('desc') ? $errors->first('desc') :''}}</label>

					<input type="text" class="form-control  {{ $errors-> has('desc') ? 'errors' :''}}" name="desc" placeholder="Desc"><br>

					<label for="" class="room">{{ trans('rooms/langRooms.status')}}:</label>

					<select name="status" class="form-control">

					@foreach(RoomsHelper::getOptionStatus() as $key => $value)
						<option value="{{$key}}">{{$value}}</option>
					@endforeach
					</select><br>
					<div class="form-group">
					<button id="create-rooms" type="sumbit" class="bt label-warning label">Create</button></div>
				  </form>
                </div>
			</div>
		</div>
@endsection
