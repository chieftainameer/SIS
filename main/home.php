<?php 
include '../functions/database.php';
if (isset($_SESSION['login_user_id']) && $_SESSION['user_type'] != 'student') {
  header('Location:../main/login.php');
}
if (!isset($_SESSION['login_user_id'])) {
  header('Location:../main/login.php');
}
$roll = $_SESSION['roll'];
$query = "SELECT * FROM attendance WHERE roll_num='$roll'";

$res = $con->query($query);
$sub_query = "SELECT * FROM choosen WHERE roll_num='$roll'";
$sub_res = $con->query($sub_query);
$a = 1;

$r_query = "SELECT * FROM results WHERE roll_num='$roll'";
$r_res = $con->query($r_query);
//$res = $res->fetch_assoc();


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
<?php include '../functions/nav.php'; ?>
<?php if (isset($_SESSION['login_status']) && isset($_SESSION['login_user_id'])) {	
 ?>
 <div class="alert alert-success" style="text-align: center"><?php echo $_SESSION['login_status']; ?></div>
<?php } 
	unset($_SESSION['login_status']);
?>
<p class="home-card">Welcome Roll Number: <?php echo $_SESSION['roll']; ?></p>
<div class="container">
	<div class="row">
		<div class="col-md-4 home-card">
			<h4>Last 5 Days Attendance</h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<td>Date</td>
						<td>Status</td>
					</tr>
				</thead>
				<tbody>
					<?php while($row = $res->fetch_assoc()){
						extract($row);
					
					?>
						<tr>
							<td><?= $date ?></td>
							<td><?= $status ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="col-md-3 home-card">
			<h4>Your Subjects</h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<td>Sr No</td>
						<td>Subject</td>
					</tr>
				</thead>
				<tbody>
					<?php while($row = $sub_res->fetch_assoc()){
						extract($row);
					
					?>
						<tr>
							<td><?= $a ?></td>
							<td><?= $subject_name ?></td>
						</tr>
					<?php
					 $a++ ;
				    } ?>
				</tbody>
			</table>

		</div>
		<div class="col-md-4 home-card">
			<h4>Previous Results</h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<td>Subject</td>
						<td>Obt Marks</td>
						<td>Total Marks</td>
					</tr>
				</thead>
				<tbody>
					<?php while($r_row = $r_res->fetch_assoc()){
						extract($r_row);
					
					?>
						<tr>
							<td><?= $subject ?></td>
							<td><?= $obt_marks ?></td>
							<td><?= $total_marks ?></td>
						</tr>
					<?php
				    } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>