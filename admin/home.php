<?php  

include '../functions/database.php';
///// accounts of status 0
// student count retreival
$s_rK_q = "SELECT COUNT(*) AS total FROM students WHERE status=0";
$s_rk_c = $con->query($s_rK_q);
$s_rk_r = $s_rk_c->fetch_assoc();
$s_rk_r_final = '';
if($s_rk_r > 0){
  $s_rk_r_final = $s_rk_r['total'];
}
else{
  $s_rk_r_final = 0;
}


// teacher count retreival
$t_rK_q = "SELECT COUNT(*) AS total FROM teacher WHERE status=0";
$t_rk_c = $con->query($t_rK_q);
$t_rk_r = $t_rk_c->fetch_assoc();
$t_rk_r_final = '';
if($t_rk_r > 0){
  $t_rk_r_final = $t_rk_r['total'];
}
else{
  $t_rk_r_final = 0;
}


// parent count retreival
$p_rK_q = "SELECT COUNT(*) AS total FROM parents WHERE status=0";
$p_rk_c = $con->query($p_rK_q);
$p_rk_r = $p_rk_c->fetch_assoc();
$p_rk_r_final = '';
if($p_rk_r > 0){
  $p_rk_r_final = $p_rk_r['total'];
}
else{
  $p_rk_r_final = 0;
}


// timetable count retreival
$time_rK_q = "SELECT COUNT(*) AS total FROM timetable WHERE approved=0";
$time_rk_c = $con->query($time_rK_q);
$time_rk_r = $time_rk_c->fetch_assoc();
$time_rk_r_final = '';
if($time_rk_r > 0){
  $time_rk_r_final = $time_rk_r['total'];
}
else{
  $time_rk_r_final = 0;
}

////accounts of status 1


$s_ap_q = "SELECT COUNT(*) AS total FROM students WHERE status=1";
$s_ap_c = $con->query($s_ap_q);
$s_ap_r = $s_ap_c->fetch_assoc();
$s_ap_r_final = '';
if($s_ap_r > 0){
  $s_ap_r_final = $s_ap_r['total'];
}
else{
  $s_ap_r_final = 0;
}


// teacher count retreival
$t_ap_q = "SELECT COUNT(*) AS total FROM teacher WHERE status=1";
$t_ap_c = $con->query($t_ap_q);
$t_ap_r = $t_ap_c->fetch_assoc();
$t_ap_r_final = '';
if($t_ap_r > 0){
  $t_ap_r_final = $t_ap_r['total'];
}
else{
  $t_ap_r_final = 0;
}


// parent count retreival
$p_ap_q = "SELECT COUNT(*) AS total FROM parents WHERE status=1";
$p_ap_c = $con->query($p_ap_q);
$p_ap_r = $p_ap_c->fetch_assoc();
$p_ap_r_final = '';
if($p_ap_r > 0){
  $p_ap_r_final = $p_ap_r['total'];
}
else{
  $p_ap_r_final = 0;
}




?>




<!DOCTYPE html>
<html lang="en">

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

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  

  <!-- Custom styles for this template -->
  <link href="../css/navAdmin.css" rel="stylesheet">

</head>

<body>

  <?php include 'navAdmin.php'; ?>


  <div class="container-fluid">
        <h3 class="mt-4 text-center">Action Required</h3>
        <div class="row justify-content-center" style="text-align:center;">
          <div class="col-md-3 home-card">
            <h6>Student Account Approvals Requests </h6>
            <h5 class="text-primary"><?php echo $s_rk_r_final ?></h5>
          </div>
          <div class="col-md-3 home-card">
            <h6>Parents Account Approvals Requests </h6>
            <h5 class="text-primary"><?php echo $p_rk_r_final ?></h5>
          </div>
          <div class="col-md-3 home-card">
            <h6>Teachers Account Approvals Requests </h6>
            <h5 class="text-primary"><?php echo $t_rk_r_final ?></h5>
          </div>
        </div>
         <div class="row justify-content-center" style="text-align:center;">
          <div class="col-md-3 home-card">
            <h6>Time Table Approval Requests </h6>
            <h5 class="text-primary"><?php echo $time_rk_r_final ?></h5>
          </div>
        </div>

        <h3 class="mt-4 text-center">School Statistics</h3>
        <div class="row justify-content-center" style="text-align:center;">
          <div class="col-md-3 home-card">
            <h6>Student Account Strength </h6>
            <h5 class="text-primary"><?php echo $s_ap_r_final ?></h5>
          </div>
          <div class="col-md-3 home-card">
            <h6>Parents Account Strength </h6>
            <h5 class="text-primary"><?php echo $p_ap_r_final ?></h5>
          </div>
          <div class="col-md-3 home-card">
            <h6>Teachers Account Strength </h6>
            <h5 class="text-primary"><?php echo $t_ap_r_final ?></h5>
          </div>
        </div>

  </div>

      















    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
