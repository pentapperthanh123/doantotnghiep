@extends('master')

@section('title', 'List Devices')
	 
@section('body')
@section('title-bar',trans('devices/index.title'))
	<div class="top-list-user">
		<button id="add-new-user" type="button" class="btn btn-primary"><a href="{{ url('devices/create') }}">+</a></button>
		<div class="search-user">
			<form action="{{ url('devices') }}" method="GET">
				<input type="hidden" name="action" value="search">
				<input type="text" name="key" id="input" class="form-control" value="" placeholder="{{ trans('devices/index.seach') }}">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</div>
	<div class="container-fluid text-center">
		<table class="table h list-device">
			<thead>
				<tr>
					<th>{{ trans('devices/index.stt') }}</th>
					<th>{{ trans('devices/index.name') }}</th>
					<th>{{ trans('devices/index.desc') }}</th>
					<th>{{ trans('devices/index.status') }}</th>
					<th>{{ trans('devices/index.computers') }}</th>
					<th>{{ trans('devices/index.type_device') }}</th>
					<th>{{ trans('devices/index.option') }}</th>
				</tr>
			</thead>
			@php($i = 0)
			@foreach($devicesList as $device)
			<tbody>
				<tr @if($i% 2 == 0) class="old" @else class="even" @endif >
					@php($i++)
					<td>{{ DeviceHelper::increment($i, $devicesList->perPage(), $devicesList->currentPage())}}</td>
					<td><p>{{$device->name}}</p></td>
					<td><p>{{$device->desc}}</p></td>
					<td><p>{{ DeviceHelper::getStatus($device->status)}}</p></td>
					<td><p>{{$device->computer['name']}}</p></td>
					<td><p>{{$device->typeDevice['name']}}</p></td>
					<td>
						<div class="row">
							<div class="col-md-3 col-md-push-2">
								<button class="btn-option-user" title="Edit" type="submit" value="Edit"><a  href="{{ url('devices') }}/{{$device->id}}/edit"><i class="fa fa-pencil-square-o text-info"></i></a></button>
							</div>
							<div class="col-md-3 col-md-push-2">
								<form action="{{ url('devices/'.$device->id)}}" method="POST">
					 				@csrf
									{{ method_field('DELETE') }}
									<button class="btn-option-user" type="submit" value="Delete"  title="Delete"  onclick="return confirm('{{ trans('devices/index.delete') }}{{ $device->name }}');"><i class="fa fa-trash text-danger"></i></button>
								</form>
							</div>
						</div>
						
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="pagination-l">
			{{ $devicesList->links() }}
		</div>
	</div>
		
	
		
@endsection