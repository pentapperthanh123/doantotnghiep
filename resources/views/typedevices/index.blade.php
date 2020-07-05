@extends('master')

@section('title', ' List TypeDevices')
	

@section('body')
@section('title', trans('typedevices/index.title'))
@section('title-bar',trans('typedevices/index.title-bar'))
	

	<div class="container-fluid">

	<button id="add-new-user" class="btn btn-primary" type="button"><a href="{{ url('typedevices/create') }}">{{trans('+')}}</a></button>

	
	<div class="search-user">
		<form action="{{ url('typedevices') }}" method="GET">
			<input type="hidden" name="action" value="search">
			<input type="text" name="key" id="input" class="form-control" value="" placeholder="Search TypeDevice ...">
		</form>
		<i class="fa fa-search"></i>
	</div>
	<div >
		<form  action="{{ url('typedevices') }}" method="GET">
		<select name="filter-gender"  class="form-control fil-name"  required=""> 
			<option value="">Sắp Xếp </option>
			<option value="name DESC">A-Z</option>
			<option value="name ASC">Z-A</option>
		</select>	
		<button type="submit" class="btn btn-info" 
		>Filter</button>
		<button type="submit" name="reset" id="reset" class="btn btn-default">Reset</button>
	</form>
	</div>
	
	</div>	
	<div class="container-fluid text-center">
		<table class="list-user">
			<thead>
				<tr>
					<th><center>{{ trans('users/index.stt') }}</center></th>
					<th><center>ID</center></th>
					<th><center>{{ trans('users/index.name') }}</center></th>
					<th><center>{{ trans('users/index.option') }}</center></th>


				</tr>
			</thead>
			@php($i = 0)
			@foreach($typedevicesList as $typedevice)
			<tbody>
				<tr @if($i% 2 == 0) class="old" @else class="even" @endif >
					<td><center><?php echo ++$i; ?></center></td>
					<td><center><p>{{ $typedevice->id }}</p></center></td>
					<td><center><p>{{$typedevice->name}}</p></center></td></p></td>

					<td>
						<a href="{{ url('typedevices/'.$typedevice->id.'/edit') }}" class="btn-option-user" title="Edit"><i class="fa fa-pencil-square-o text-info"></i></a>
						<form action="{{ url('typedevices/'.$typedevice->id) }}" method="POST">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<button type="submit" title="Delete" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="btn-option-user"><i class="fa fa-trash text-danger"></i></button>
					</td>	
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $typedevicesList->links() }}
	</div>
@endsection