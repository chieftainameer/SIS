<?php  

include '../functions/database.php';


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <link href="../css/navAdmin.css" rel="stylesheet">

	<title>Results</title>
</head>
<body>
<?php include 'navAdmin.php'; ?>
	
	<div class="container-fluid">
		<form class="home-card">
			<div class="form-group">
				<div class="row">
					<div class="col-md-4">
						<label style="text-align: left;">Class:</label>
						<select name="class" class="form-control" id="class" onchange="getStudents(this)">
							<option>Choose a class</option>
							<option>6th</option>
							<option>7th</option>
							<option>8th</option>
							<option>9th</option>
							<option>10th</option>
						</select>
					</div>
					<div class="col-md-4">
						<label style="text-align: left;">Roll No:</label>
						<select name="roll" class="form-control" id="roll" onchange="getSubjects(this)">
							<option>Choose Student</option>
						</select>
						<input type="hidden" name="std_name" id="std-name">
					</div>
					<div class="col-md-4">
						<label style="text-align: left;">Subject:</label>
						<select name="subject" class="form-control" id="subject">
							<option>Choose Subject</option>
						</select>
					</div>
				</div>
				</div>

				<div class="form-group">
				<div class="row">
					<div class="col-md-4">
						<label style="text-align: left;">Obtained Marks</label>
						<input type="number" name="obt_mark" class="form-control" id="obt-mark">
					</div>
					<div class="col-md-4">
						<label style="text-align: left;">Total Marks</label>
						<input type="number" name="tot_mark" class="form-control" id="tot-mark">
					</div>
					<div class="col-md-4">
						<label style="text-align: left;">Term:</label>
						<select name="term" class="form-control">
							<option>Choose Term</option>
							<option>Term 1</option>
							<option>Term 2</option>
							<option>Final</option>
						</select>
					</div>
				</div>
			   </div>
			   <div class="form-group">
			   	<div class="row justify-content-center">
			   		<div class="col-md-4">
						<label style="text-align: left;">Percentage:</label>
						<input type="number" name="" class="form-control" placeholder="percentage will be calculated automatically" readonly>
					</div>
			   	</div>
			   </div>
			   <div class="form-group">
			   	<div class="row justify-content-center" style="text-align: center;">
			   		<div class="col-md-12">
			   			<button class="btn btn-primary" id="mark" onclick="markResult()" >Mark Result</button>
			   		</div>
			   	</div>
			   </div>
		</form>
	</div>


	</div>
	</div>


<script type="text/javascript">
	$("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    function getStudents(obj){
    	//alert(obj.value);
    	$.ajax({
    		url:'getStudents.php',
    		type:'post',
    		data:{'class':obj.value},
    		dataType:'json',
    		success:function(data,status){
    			$('#roll').empty();
    			console.log();
    			if (data == 'No Students Found') {
    				$('#roll').append(`<option>No data found</option>`);
    				$('#subject').empty();
    				$('#subject').append(`<option>No data found</option>`);

    			}
    			else
    			{
	    			$('#roll').append(`<option>Choose Student</option>`);
	    			$.each(data,function(index,value){
	    				//alert(value);
	    				$('#roll').append(`<option>${value}</option>`);
	    			});
    		   }
    		},
    	});
    }


    function getSubjects(obj){

    	if (obj.value == '') {
    		alert('its empty');
    	}
    	else
    	{
    		let clas = $('#class').val();
    		$.ajax({
    			url:'getSubjects.php',
    			type:'post',
    			data:{'roll':obj.value,'class':clas},
    			dataType:'json',
    			success:function(data,status){
    				$('#subject').empty();
    				if (data == "No Subjects Found") {
    				   $('#subject').append(`<option>No data found</option>`);
    				}
    				else
    				{
    				  $('#subject').append(`<option>Choose Subject</option>`);
	    			  $.each(data,function(index,value){
	    				//alert(value);
	    				$('#subject').append(`<option>${value}</option>`);
	    			});
    				}
    			},
    		});
    	}
    }
 function markResult(){
    	let clas = $('#class').val();
    	let roll = $('#roll').val();
    	let sub = $('#subject').val();
    	let obt_mark = $('#obt-mark').val();
    	let tot_mark = $('#tot-mark').val();
    	if (roll == 'No data found' || sub == 'No data found' || obt_mark == '' || tot_mark == '') {
    		alert("this form can't be submitted");
    	}
    	else
    	{
    		$.ajax({
    			url:'mark_results.php',
    			type:'post',
    			data:{'class':clas,'roll':roll,'sub':sub,'obt_mark':obt_mark,'tot_mark':tot_mark}
    		});
    	}
    }


</script>
</body>
</html>