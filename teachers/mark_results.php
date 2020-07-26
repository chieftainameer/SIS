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
$query = "SELECT * FROM teacher WHERE id=$id";
$res = $con->query($query);
$res = $res->fetch_assoc();
$class = $res['class'];

$q = "SELECT * FROM students WHERE class='$class'";
$r = $con->query($q);



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
  

  <script>
    $(document).ready(function(){
      $('#std-roll').change(function(){
        let v = $('#std-roll').val();
        $.ajax({
          url: 'ajax.php',
          type:'post',
          data:{'roll_num':v},
          dataType:'json',
          success:function(data,status){
            //alert(typeof(data));
            data.forEach(function(d){
              $('#std-sub').append('<option>'+d+'</option>');
            });

          }
        });
      });

      $('#mark').click(function(){
        let roll = $('#std-roll').val();
        let sub = $('#std-sub').val();
        let term = $('#term').val();
        let obt = parseInt($('#obt-mark').val());
        let tot = parseInt($('#tot-mark').val());
        console.log(obt > tot);
        if (obt > tot) {
          alert("Sorry! obtained marks can't be greater than total marks");
        }
        else{
          $.ajax({
            url:'res.php',
            type:'post',
            data:{'roll':roll,'sub':sub,'term':term,'obt':obt,'tot':tot},
            dataType:'json',
            beforeSend:function(){
              $('#mark').html("Marking...");
            },
            success:function(data,status){
              alert(data);
            },
            complete:function(){
              $('#mark').html("Mark Result");
            }
          });

        }
        //console.log(roll+' '+sub+' '+term+' '+obt+' '+tot);
      });
    });
  </script>
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
    <div  class="home-card">
  <div class="form-group">
     <div class="row">

        <div class="col-md-4">
          <label>Choose Roll Number:</label>
          <select id="std-roll" name="std_roll" class="form-control">
            <option>Choose Roll No</option>
            <?php while($row = $r->fetch_assoc()){ ?>
              <option><?php echo $row['roll_num'] ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="col-md-4">
          <label for="pwd">Subject</label>
          <select id="std-sub" class="form-control" name="std_sub">
            <option>Choose Subjects</option>
          </select>
        </div>

        <div class="col-md-4">
          <label>Term</label>
          <select name="term" id="term" class="form-control">
            <option>Choose Term</option>
            <option>Term 1</option>
            <option>Term 2</option>
            <option>Final</option>
          </select>
        </div>
     </div>
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-md-4">
        <label>Obtained Marks</label>
        <input type="number" name="obt_mark" id="obt-mark" class="form-control" required>
      </div>
      <div class="col-md-4">
        <label>Total Marks</label>
        <input type="number" name="tot_mark" id="tot-mark" class="form-control" required>
      </div>
      <div class="col-md-4">
        <label>Percentage:</label>
        <input type="number" name="tot_mark"  id="percent" class="form-control" readonly placeholder="Percentage will be calculated automatically">
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-md-3 col-md-offset-6" style="margin:0 auto">
        <button class="btn btn-primary" id="mark">Mark result</button>
      </div>
    </div>
  </div>
</div>	<!-- form div -->
</div>

 <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>