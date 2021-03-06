<?php 
include '../functions/database.php';
if (isset($_SESSION['login_user_id']) && $_SESSION['user_type'] != 'teacher') {
  header('Location:../main/login.php');
}
if (!isset($_SESSION['login_user_id'])) {
  header('Location:../main/login.php');
}
if ($_SESSION['status'] == 0) {
  header('Location:../main/not_approved.php');
}
$id = $_SESSION['login_user_id'];
$q = "SELECT * FROM teacher WHERE id='$id'";
$c = $con->query($q);
$res = $c->fetch_assoc();
extract($res);



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link href="../css/navAdmin.css" rel="stylesheet">

  <style type="text/css">
    body{
    background-color: #e7eae5;
  }
   li.nav-item{
          font-weight: bold;
        }
        li.nav-item:hover{
          background-color: silver;
          border-radius: 50px;
          transition: 1s;
        }
        li.nav-item a:hover{
          color: black;
        }
        .home-card{
          background-color: #f5f5f5;
          padding:30px;
          margin: 5px;
          text-align: center;
        }
        .login{
          margin-top: 20px;
         
        }
        .header-txt{
          margin-bottom: 15px;
          text-align: center;
        }
  </style>
</head>
<body>
<?php include '../functions/navTeacher.php'; ?>
<?php if (isset($_SESSION['login_status']) && isset($_SESSION['login_user_id'])) {	
 ?>
 <div class="alert alert-success" style="text-align: center"><?php echo $_SESSION['login_status']; ?></div>
<?php } 
	unset($_SESSION['login_status']);
?>
<p class="home-card">Welcome Roll Number: <?php echo $_SESSION['roll']; ?></p>
<div class="container">
	<h3 style="text-align:center;padding-top:15px">Profile and Password Change</h3>
	<div class="form-group home-card">
		<div class="row">
			<div class="col-md-6">
				<label>Name:</label>
				<input type="text" class="form-control" value="<?php echo $name ?>" readonly>
			</div>
			<div class="col-md-6">
				<label>Email:</label>
				<input type="text" class="form-control" value="<?php echo $email ?>" readonly>
			</div>
		</div>
		</div>
		<div class="form-group home-card">
		<div class="row">
			<div class="col-md-6">
				<label>Contact No:</label>
				<input type="text" class="form-control" value="<?php echo $contact_num ?>" readonly>
			</div>
			<div class="col-md-6">
				<label>Qualification:</label>
				<input type="text" class="form-control" value="<?php echo $qualification ?>" readonly>
			</div>
		</div>
		</div>
		<div class="form-group home-card">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<label>Class:</label>
				<input type="text" class="form-control" value="<?php echo $class ?>" readonly>
			</div>
		</div>
		</div>
		<div class="form-group home-card">
		<div class="row">
			<div class="col-md-6">
				<label>New Password:</label>
				<input type="password" class="form-control" id="pass">
			</div>
			<div class="col-md-6">
				<label>Confirm Password:</label>
				<input type="password" class="form-control" id="cpass" >
			</div>
		</div>
		<div class="row justify-content-center" style="margin-top:15px">
			<button class="btn btn-primary" onclick="changePass('<?php echo $id ?>')">Change Password</button>
		</div>
		</div>
	</div>



	<script type="text/javascript">
		function changePass(roll){
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
    			data:{'pass':pass,'roll':roll},
    			dataType:'text',
    			success:function(data,status){
    				alert(data);
    				location.reload();
    			},
    		});
    	}
		}
	</script>
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>