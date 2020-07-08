<?php 
include '../functions/database.php';
if (isset($_SESSION['login_user_id']) && $_SESSION['user_type'] != 'teacher') {
  header('Location:../main/login.php');
}
if (!isset($_SESSION['login_user_id'])) {
  header('Location:../main/login.php');
}
$id = $_SESSION['login_user_id'];
$q = "SELECT * FROM teacher WHERE id=$id";
$res = $con->query($q);
$r = $res->fetch_assoc();
$class = $r['class'];

$query = "SELECT * FROM timetable WHERE class='$class'";
$c = $con->query($query);
$re = $c->fetch_assoc();
$present = '';
$notimeTable = false;
if ($re > 0) {
  if ($re['approved'] == 0) {
    $present = "Your time table is waiting for approval from admin";
  }
  else{
    $present = "Your timetable is approved";
  }
}
else{
  $notimeTable = true;
}



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
<?php include '../functions/navTeacher.php'; ?>
<?php if (isset($_SESSION['login_status']) && isset($_SESSION['login_user_id'])) {	
 ?>
 <div class="alert alert-success" style="text-align: center"><?php echo $_SESSION['login_status']; ?></div>
<?php } 
	unset($_SESSION['login_status']);
?>
<p class="home-card">Welcome Teacher</p>
<div class="container">
	<div class="row">
    <?php if($notimeTable): ?>
      <h4 class="home-card">No Time Table</h4>
      <br/>
      <a href="timetable.php" class="btn btn-primary">Add Time Table</a>
      <?php else: ?>
		   <p class="home-card" style="margin:0 auto"><?php echo $present ?></p>
    <?php if ($re['approved'] == 1): ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Class</th>
            <th>Subject</th>
            <th>Time</th>
          </tr> 
        </thead>
        <tbody>
          <tr>
            <td><?= $re['class'] ?></td>
            <td><?= $re['subject'] ?></td>
            <td><?= $re['time'] ?></td>
          </tr>
        </tbody>
      </table>
    <?php endif; ?>
    <?php endif; ?>


	</div>
</div>
</body>
</html>