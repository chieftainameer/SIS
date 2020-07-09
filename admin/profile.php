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
	<title>User Profile</title>
  <link href="../css/navAdmin.css" rel="stylesheet">

</head>
<body>
	<?php include 'navAdmin.php'; ?>
	<div class="container-fluid">
		<div class="home-card">
			<h4>Name:</h4>
			<p>Admin</p>
		</div>
		<div class="home-card">
			<h4>Email:</h4>
			<p>admin@mail.com</p>
		</div>
		<div class="home-card row justify-content-center">
			<div class="col-md-6">
				<label>New Password:</label>
				<input type="password" name="pass" id="pass" class="form-control">
			</div>
			<div class="col-md-6">
				<label>Confirm Password:</label>
				<input type="password" name="cpass" id="cpass" class="form-control">
			</div>
			<div class="row">
			<button class="btn btn-primary" style="margin-top: 15px" onclick="changePass()">Change Password</button>
		</div>
		</div>
	</div>
	</div>
	</div>

	<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    function changePass(){
    	let pass = $('#pass').val();
    	let cpass = $('#cpass').val();
    	if (pass == '' || cpass == '') {
    		alert("Passwords can't be empty");
    	}
    	else if(pass != cpass){
    		alert("Sorry! passwords do not match");
    	}
    	else
    	{
    		$.ajax({
    			url:'changePass.php',
    			type:'post',
    			data:{'pass':pass,'cpass':cpass},
    			dataType:'text',
    			success:function(data,status){
    				alert(data);
    				location.reload();
    			},
    		});
    	}
    }
  </script>
</body>
</html>