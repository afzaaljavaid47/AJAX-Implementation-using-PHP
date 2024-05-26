<!DOCTYPE html>
<html>
<head>
	<title>Ajax in PHP</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="jquery/jquery.js"></script>
</head>
<body>
	<br><br>
<div class="container">
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<form method="post" id="record">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>E-Mail</label>
				<input type="email" name="email" class="form-control" required="">
			</div>
			<div class="form-group">
				<label>Father Name</label>
				<input type="text" name="fname" class="form-control" required="">
			</div>
			<input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" value="Submit">
		</form><br>
		<div class="alert alert-success alert-dismissible fade show" id="submitMsg" role="alert">
            <strong>Data Inserted Successfully.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <br>
         <br>
        <table class="table table-bordered">
        	<thead>
        		<tr>
        			<td class="text-center" style="font-size: 20px;font-weight: bold;">ID</td>
        			<td class="text-center" style="font-size: 20px;font-weight: bold;">NAME</td>
        			<td class="text-center" style="font-size: 20px;font-weight: bold;">E-MAIL</td>
        			<td class="text-center" style="font-size: 20px;font-weight: bold;">FATHER NAME</td>
        			<td class="text-center" style="font-size: 20px;font-weight: bold;">EDIT</td>
        			<td class="text-center" style="font-size: 20px;font-weight: bold;">DELETE</td>
        		</tr>
        	</thead>
        	<tbody id="PlaceData">
        		
        	</tbody>
        	</tbody>
        </table>
        <div></div>
	</div>
	<div class="col-md-2"></div>
</div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		setInterval(function(){
			show_data();
		},1000);
		show_data()
		function show_data()
		{
		$.ajax({
			type:"POST",
			url:"show.php",
			success:function(data)
			{
				$("#PlaceData").html(data);
			}
		});
	    }

	});
	    </script>
	    <script type="text/javascript">
	$(document).ready(function(){
		$("#submitMsg").hide();
		$('#record').submit(function(evt){
			evt.preventDefault();
			Data=$('form').serialize();
			$.ajax({
				type:'POST',
				url:'insert.php',
				data:Data,
				success:function(data)
				{
					$("#submitMsg").show();
					show_data();
				}
			});
			$("form")[0].reset();
		});
	});
</script>