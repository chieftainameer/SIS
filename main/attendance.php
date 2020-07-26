<?php 
include '../functions/database.php';
if (isset($_SESSION['login_user_id']) && $_SESSION['user_type'] != 'student') {
  header('Location:../main/login.php');
}
if (!isset($_SESSION['login_user_id'])) {
  header('Location:../main/login.php');
}
if ($_SESSION['status'] == 0) {
  header('Location:not_approved.php');
}
$cur = date("Y-m-d");
$one_back = strtotime("-1 Months");
$prev_month = date("Y-m-d",$one_back);

$roll = $_SESSION['roll'];
$query = "SELECT * FROM attendance WHERE roll_num='$roll' AND date BETWEEN '$prev_month' AND '$cur'";
$res = $con->query($query);

$q = "SELECT COUNT(*) as absents FROM attendance WHERE roll_num='$roll' AND status='absent' AND date BETWEEN '$prev_month' AND '$cur' ";
$r = $con->query($q);
$r = $r->fetch_assoc();



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
<?php include '../functions/nav.php'; ?>

<p class="home-card">Welcome Roll Number: <?php echo $_SESSION['roll']; ?></p>
<div class="container">
  <div class="row text-center">
    <div class="col-md-12">
      <h4>Your Absents in last month are:<?= $r['absents'] ?></h4>
    </div>
  </div>
	<div class="row justify-content-center">
		<div class="col-md-12 home-card">
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
  	</div>
</div>

  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>