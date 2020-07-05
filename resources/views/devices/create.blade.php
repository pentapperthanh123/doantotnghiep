@extends('master')

@section('title', 'Add New Devices')
	
@section('body')
	@include('partials/navigation_bar')
	@section('title-bar', trans('devices/create.title'))
	<div class="container-fluid">
		<div class="from-group lb">
			<form action="{{url('devices')}}" method="post">
				@csrf

				<label>{{ trans('devices/create.name') }}:</label>
				<label class="alertdevice">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>
				<input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : ''}}" placeholder="Enter Name" name="name" id="name">

				<label>{{ trans('devices/create.description') }}:</label>
				<label class="alertdevice">{{ $errors->has('name') ? $errors->first('name') : ''}}</label>
				<textarea type="text" class="form-control {{ $errors->has('desc') ? 'has-error' : ''}}" placeholder="Enter description" name="desc" rows="10">
				</textarea>						

				<label>{{ trans('devices/create.computers') }}:</label>
				<select id="computers_id" name="computers_id" class="form-control">
					@foreach($computerList as $computer)
						<option value="{{ $computer->id }}">{{ $computer->name }}</option>
					@endforeach
				</select>

				<label>{{ trans('devices/create.type_device') }}:</label>				
				<select id="typedevices_id"  name="typydevices_id" class="form-control">
					@foreach($typedeviceList as $tydevices)
						<option value="{{ $tydevices->id }}">{{ $tydevices->name }}</option>
					@endforeach
				</select>

				<label>{{ trans('devices/create.tag') }}:</label>		
				<div class="row">
					<div class="col-md-8">									
						<select id="tags"  name="tags" class="form-control">
							@foreach($tags as $tag)
								<option value="{{ $tag->id }}">{{ $tag->value }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-2">
						<input type="button" onclick="addTags()" class="form-control" value="Add">
					</div>					
				</div>
				<div class="row">
					<div class="col-md-2">
						<div id="tagsDom">						
						</div>
					</div>
				</div>
				

				<label>{{ trans('devices/create.status') }}:</label>
				<select name="status" class="form-control">
					@foreach(DeviceHelper::getOptionStatus() as $key => $value)
						<option value="{{$key}}">{{$value}}</option>
					@endforeach
				</select>
				<button type="submit" class="btn btn-primary btn-form-user cre">{{ trans('devices/create.add') }}</button>
			</form>
		</div>
	</div>	
	<script type="text/javascript">
		var jsonComputerList = '<?php echo json_encode($computerList); ?>';
		var computerList = JSON.parse(jsonComputerList);		

		function setComputers(selectObj){
			var idx = selectObj.selectedIndex; 
			// get the value of the selected option 
			var roomId = selectObj.options[idx].value; 
			// console.log(roomId);

			selectList = document.getElementById("computers_id");
			for (var i = 0; i < computerList.length; i++) {
				if(computerList[i].status == roomId){
					var option = document.createElement("option");
				    option.value = computerList[i].id;
				    option.text = computerList[i].name;
				    selectList.appendChild(option);
				}			    
			}
		}
		function addTags(){
			$('#tagsDom').append('<label class=tag name=tags[] value=' + $('#tags').val() + '>' + $('#tags option:selected').text() +'</label><br/>');
		}
	</script>
@endsection