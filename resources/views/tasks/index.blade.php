@extends('master')

@section('title','Task List Manage')

@section('body')

	<div class="container-fluid">
		<button id="add-new-user" class="btn btn-primary" value="Add"><a href="{{ url('tasks/create') }}">+</a></button>	
	</div>

	<div class="container-fluid text-center">
		<table class="list-user">
			<thead>
				<tr>
					<th><center>{{trans('task/index.stt')}}</center></th>
					<th><center>ID</center></th>
					<th><center>{{trans('task/index.name')}}</center></th>
					<th><center>{{trans('task/index.option')}}</center></th>
					

				</tr>
			</thead>
			@php($i = 0)
			@foreach($tasksList as $taskList)
				<tbody>
					<tr @if($i% 2 == 0) class="old" @else class="even" @endif >
						<td><center><?php echo ++$i; ?></center></td>
						<td><center><p>{{ $taskList->id }}</p></center></td>
						<td><center><p>{{ $taskList->name }}</p></td></p></center></td>

						<td>
							<button class="btn-option-user" title="Edit" type="submit" value="Edit"><a href="{{ url('tasks') }}/{{$taskList->id}}/edit"><i class="fa fa-pencil-square-o text-info"></i></a></button>
							
							<form action="{{ url('tasks/'.$taskList->id) }}" method="POST">
								@csrf
								{{ method_field('DELETE') }}
								<button class="btn-option-user" type="submit" value="Delete"  title="Delete"  onclick="return confirm('bạn có muốn xóa?');"><i class="fa fa-trash text-danger"></i></button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
		</table>
			<div class="pagination-user">
        		{{ $tasksList->links() }}
    		</div>	

@endsection 
