@extends('master')

@section('title', 'Computers')
<style type="text/css">
		.has-error{
			background-color: red;
		}
		.modal-content{
			z-index: 9999!important;
		}
		.modal-backdrop{
			position: relative!important;
		}
	</style>
@section('body')
	@include('partials/navigation_bar')

	<div class="container-fluid">
		<div class="form-group">
			<form action="{{url('computers')}}" method="POST">
				@csrf
				<label for="name">{{ trans('computer/create.name')}} :</label>
				<label class="alertcpt">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>
				<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : ''}}" name="name" placeholder="Enter Name..."><br>

				<label for="desc">{{ trans('computer/create.desc')}} :</label>
				<label class="alertcpt">{{ $errors->has('desc') ? $errors->first('desc') : ''}}</label>
				<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : ''}}" name="desc" placeholder="Enter Desc..."><br>

				<label for="status">{{ trans('computer/create.status')}} :</label>
				<select name="status" class="form-control">
					@foreach(ComputerHelper::getOptionStatus() as $key => $value)
						<option value="{{ $key }}">{{ $value }}</option>
					@endforeach
				</select><br>

				<label for="rooms-id">{{ trans('computer/create.roomsID')}} :</label>
				<select name="rooms_id" class="form-control">
					@foreach($roomList as $room)
						<option value="{{ $room->id  }}">{{ $room->name }}</option>
					@endforeach
				</select><br>
				
				<div id="result-add-device"></div>
				<button class="btn btn-primary btn-form-user"type="submit">{{ trans('computer/create.submit')}}</button>
			</form>
		</div>
	</div>
	<div class="container-fluid">
		<button type="button" class="btn btn-primary btn-form-user" data-toggle="modal" data-target="#myModal">+ Device </button>
		<div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog add-dev-for-com">
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Create Device</h4>
		        </div>
		        <div class="modal-body">
		          	<div class="container-fluid">
						<div class="from-group lb">
							<form id="form-add-device">
								@csrf

								<label>Name:</label>
								<label class="alertdevice"></label>
								<input required type="text" class="form-control" placeholder="Enter Name" name="nameDevice" id="nameDevice">
		                        <label class="fail-validated"></label>
								<label>Description:</label>
								<label class="alertdevice"></label>
								<textarea required type="text" class="form-control" placeholder="Enter description" name="descDevice" rows="10">
								</textarea>						
								<label class="fail-validated-1"></label>

								<label>Type Devices:</label>				
								<select id="type_devices_id"  name="type_devices_id" class="form-control">
									@if(count(\App\Models\Device::get()))
									@foreach(\App\Models\Device::get() as $value)
									 <option value="{{ $value->id }}">{{ $value->name }}</option>
									@endforeach
									@endif
								</select>
								<label>Tags:</label>
								{{-- <div class="row"> --}}
									{{-- <div class="col-md-8"> --}}
										<select id="tagDevice"  name="tagDevice" class="form-control">
											@if(count(\App\Models\Tag::get()))
											@foreach(\App\Models\Tag::get() as $value)
											 <option value="{{ $value->id }}">{{ $value->value }}</option>
											@endforeach
											@endif
										</select>
									{{-- </div> --}}
									{{-- <div class="col-md-2">
										<input type="button" onclick="addTags()" class="form-control" value="Add">
									</div> --}}					
								{{-- </div> --}}
{{-- 								<div class="row">
									<div class="col-md-2">
										<div id="tagsDom">						
										</div>
									</div>
								</div> --}}
								<label>Status:</label>
								<select name="statusDevice" class="form-control">
									<option value="{{ \App\Enums\DeviceStatus::WORKING }}"> {{ @trans('devices/status.working') }}</option>
									<option value="{{ \App\Enums\DeviceStatus::REPAIRING }}"> {{ @trans('devices/status.repairing') }}</option>
									<option value="{{ \App\Enums\DeviceStatus::CRASH }}"> {{ @trans('devices/status.crash') }}</option>
								</select>
								<button  id="btn-create-device" type="button"  class="btn btn-default btn-form-user">Add</button>
								<div class="modal-footer">
						          <button type="button" class="btn btn-default btn-form-user" data-dismiss="modal">Close</button>
						        </div>
							</form>
						</div>
					</div>	
		        </div>
		      </div>
		    </div>
		</div>
	</div>
@endsection
