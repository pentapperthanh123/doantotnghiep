<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }} ">
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<script type="text/javascript">
	$(document).ready(function() {
	    $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
	    $('#search-user').click(function() {
	    	var name = $('#name').val();
	        $.ajax({
	            type: 'GET',
	            url: '/search/' + name,
	            dataType: 'json',
	            success: function(data) {        
	                append_json(data);
	            }
	        });
	    });
	    function append_json(data){
            var table = document.getElementById('gable'); 
            data.forEach(function(rooms) {
                var tr = document.createElement('tr');
                tr.innerHTML = '<td>' + rooms.name + '</td>' +
                '<td>' + rooms.username + '</td>' +
                '<td>' + rooms.desc + '</td>' +
                '<td>' + rooms.Status + '</td>';
                table.appendChild(tr);
            });
        }
	});
</script>
<input type="text" name="name" id="name">
<button id="search-rooms">Button</button>
<div id="content">
	<table id="gable">
        <colgroup>
            <col class="twenty" />
            <col class="fourty" />
            <col class="thirtyfive" />
            <col class="twentyfive" />
        </colgroup>
        <tr>
            
        </tr>
    </table>
</div>
</body>
</html>