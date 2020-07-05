@extends('master')

@section('title', trans('users/index.title'))
@section('title-bar', trans('users/index.title-bar'))
@section('body')
	<div class="top-list-user">
		<button id="add-new-user" type="button" class="btn btn-primary"><a href="{{ url('users/create') }}">+</a></button>
		{{-- <div class="filter-user"> --}}
		<div class="search-user">
			<form action="{{ url('users') }}" method="GET" class="filter-user">
			    <select id="select-box1" name="col" class="select-user">
  				  <option value="0">Admin</option>
				  <option value="1">Technicians</option>
				  <option value="2">Teacher</option>
			    </select>
				<button type="submit" class="btn btn-primary btn-filter"><i class="fa fa-filter"></i></button>
			</form>

			<form action="{{ url('users') }}" method="GET" class="form-search-user">
				<input type="hidden" name="action" value="search">
				<input type="text" name="key" id="input" class="form-control" value="" placeholder="Search User ...">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</div>

	<table class="list-user">
		@if(session('add'))
			<div class="alert alert-success alert-dismissible notif-user">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ session('add') }}
			</div>
		@elseif(session('edit'))
			<div class="alert alert-info alert-dismissible notif-user">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ session('edit') }}
			</div>
		@elseif(session('delete'))
			<div class="alert alert-danger alert-dismissible notif-user">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ session('delete') }}
			</div>
		@endif
		<thead>
			<tr>
				<th>{{ trans('users/index.stt') }}</th>
				<th>{{ trans('users/index.name') }}</th>
				<th>{{ trans('users/index.username') }}</th>
				<th>{{ trans('users/index.email') }}</th>
				<th>{{ trans('users/index.role') }}</th>
				<th>{{ trans('users/index.option') }}</th>
			</tr>
		</thead>
		@php ($index = 0)
		@php ($i = 0)
		@foreach($userList as $user) 
			<tbody>
				<tr @if($index % 2 == 0) class="old" @else class="even" @endif>
					@php ($index++)
					<td class="stt-user">
						@php($i++) 
						{{ UserHelper::increment($i, $userList->perPage(), $userList->currentPage())}}
					</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->username }}</td>
					<td>{{ $user->email }}</td>	
					<td class="role-user">{{ UserHelper::getRole($user->role) }}</td>
					<td>
						<a href="{{ url('users/'.$user->id.'/edit') }}" class="btn-option-user" title="Edit"><i class="fa fa-pencil-square-o text-info"></i></a>
						<form action="{{ url("users/$user->id") }}" method="POST">
							{{ csrf_field() }}
							{{ method_field('delete') }}
							<button type="submit" title="Delete" onclick="return confirm('Xoa ???');" class="btn-option-user"><i class="fa fa-trash text-danger"></i></button>
						</form>
					</td>
				</tr>
			</tbody>
		@endforeach
	</table>
	<div class="pagination-user">
		{{ $userList->links() }}
	</div>
{{-- 	<script>
		$("select-user").on("click" , function() {
		  
		  $(this).parent(".select-box").toggleClass("open");
		  
		});

		$(document).mouseup(function (e)
		{
		    var container = $(".select-box");

		    if (container.has(e.target).length === 0)
		    {
		        container.removeClass("open");
		    }
		});


		$("select-user").on("change" , function() {
		  
		  var selection = $(this).find("option:selected").text(),
		      labelFor = $(this).attr("id"),
		      label = $("[for='" + labelFor + "']");
		    
		  label.find(".label-desc").html(selection);
		    
		});
	</script> --}}
@endsection