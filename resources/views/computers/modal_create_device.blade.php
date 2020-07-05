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
<div class="container">
	<button type="button" id="btn-form-user" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Device </button>
	<div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Modal Header</h4>
	        </div>
	        <div class="modal-body">
	          <div class="container-fluid">
				<div class="from-group lb">
					<form action="" method="post">
						@csrf

						<label>Name:</label>
						<label class="alertdevice"></label>
						<input type="text" class="form-control" placeholder="Enter Name" name="name" id="name">

						<label>Description:</label>
						<label class="alertdevice"></label>
						<textarea type="text" class="form-control" placeholder="Enter description" name="desc" rows="10">
						</textarea>						

						<label>Computers:</label>
						<select id="computers_id" name="computers_id" class="form-control">
						</select>

						<label>Type Devices:</label>				
						<select id="typedevices_id"  name="typydevices_id" class="form-control">
						</select>

						<label>Tags</label>		
						<div class="row">
							<div class="col-md-8">									
								<select id="tags"  name="tags" class="form-control">
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
						<label>Status:</label>
						<select name="status" class="form-control">
						</select>
						<button  id="btn-form-user" type="submit" class="btn btn-default cre">Add</button>
					</form>
				</div>
			</div>	
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	    </div>
	</div>
</div>

@endsection