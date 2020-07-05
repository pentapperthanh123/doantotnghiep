$(function(){
	$("#btn-create-device").click(function(event) {
		var $name = $("form#form-add-device input[id=nameDevice]" ).val();
		var $desc = $("form#form-add-device textarea:input[name=descDevice]" ).val();
		var $type_devices_id = $("form#form-add-device select[name=type_devices_id]" ).val();
		console.log($tag = $("form#form-add-device select[name=tagDevice]" ).val());
		var $status = $("form#form-add-device select[name=statusDevice]" ).val();
		// alert($name);
        let flag = true;
		if($name == ""){
			$(".fail-validated").html("Name required!");
			flag = false;
		} 
		else{
			$(".fail-validated").html("");
		}

		if($desc.trim() == ""){
            $(".fail-validated-1").html("DESC required!");
            flag = false;
		}
		else{
			$(".fail-validated-1").html("");
		}

		if(flag){
			$("#result-add-device")
			.append('<div class="append-device">' + 
				'<h6>New Device</h6> ' + 
				'<div class="append-left"> ' +
				'<span>Name : <input name="name_device[]" value="' +$name +'"></span>' +
				'<span>Desc : <input name="desc_device[]" value="' + $desc.trim() + '"></span>' +
				'<span>Type Device : <input name="type_devices_id[]" value="' + $type_devices_id + '"></span>' +
				'<span>Tag : <input name="tag_device[]" value="' + $tag  + '"></span>' +
				'<span>Status : <input name="status_device[]" value="' + $status +'"></span>' +
				'</div> <div class="append-right"> ' +
				'<button type="button" class="btn btn-primary btn-form-user">Edit</button> ' +
				'<button type="button" class="btn btn-primary btn-form-user">Delete</button> </div> </div>');
		}
	});
})