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

$q = "SELECT * FROM choosen WHERE class='$class'";
$result = $con->query($q);





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
  <div  class="home-card">
    <div class="form-group">
      <div class="row">
        <div class="col-md-4">
          <label>Class:</label>
          <input type="text" id="class" name="class" class="form-control" value="<?php echo $class ?>" readonly>
          <input type="hidden" name="teacher" id="teacher" value="<?php echo $res['name'] ?>">
        </div>
        <div class="col-md-4">
          <label>Subject:</label>
          <select name="subject" id="subject" class="form-control">
            <option>Choose Subject...</option>
            <?php while($row = $result->fetch_assoc()): ?>
              <option><?= $row['subject_name'] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="col-md-4">
          <label>Time</label>
          <input type="Time" id="time" name="time" class="form-control">
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row justify-content-center">
        <div class="col-md-4">
          <button onclick="addSchedule()" class="btn btn-primary">Add Schedule</button>
        </div>
      </div>
    </div>
  </div>	<!-- form tag -->
</div>

 <script type="text/javascript">
   function addSchedule(){
    //alert("button clicked");
    let c = $('#class').val();
    let subject = $('#subject').val();
    let time = $('#time').val();
    let teacher = $('#teacher').val();
    
    $.ajax({
      url:'addSchedule.php',
      type:'post',
      dataType:'text',
      data:{'class':c,'subject':subject,'time':time,'teacher':teacher},
      beforeSend:function(){

      },
      success:function(data,status){
        alert(data);
      },
      complete:function(){

      }
    });
   }
 </script>
</body>
</html>