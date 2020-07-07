<?php 
include '../functions/database.php';
if (isset($_SESSION['login_user_id']) && $_SESSION['user_type'] != 'teacher') {
  header('Location:../main/login.php');
}
if (!isset($_SESSION['login_user_id'])) {
  header('Location:../main/login.php');
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

  <script>
    $(document).ready(function(){
      function saveData(){
        alert("click event detected");
      }
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
        .pd-1{
          margin-left:5px;
        }
  </style>
</head>
<body>



<nav class="navbar navbar-expand-md bg-light navbar-light">
        <div class="container">
  <a class="navbar-brand" href="home.php"><b>SIS</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
    	<?php if(isset($_SESSION['login_user_id'])) { ?>
      <li class="nav-item">
        <a class="nav-link " href="home.php"><i class="fas fa-home"></i> Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="mark_attendance.php"><i class="fas fa-question-circle"></i> Mark Attendance</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="mark_results.php"><i class="fas fa-pen"></i> Mark Results</a>
      </li>    
    </ul>
    <ul class="nav navbar-right ml-auto"> 
        <li class="nav-item">
    <div class="dropdown">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
         <?php echo $_SESSION['login_email'] ?>
        </button>
         <div class="dropdown-menu">
             <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Profile</a>
             <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>
             <a class="dropdown-item" href="../main/logout.php"><i class="fas fa-sign-in-alt"></i> Logout</a>
         </div>
    </div>
     </li>
 <?php } ?>
     <?php if (! isset($_SESSION['login_user_id'])) {
     	
      ?>
        <li class="nav-item"><a href="login.php" class="nav-link"><i class="fas fa-sign-in-alt"></i> signin</a></li>
        <li class="nav-item"><a  href="register_layout.php" class="nav-link"><i class="fas fa-user-plus"></i> signup</a></li>
        <?php } ?>
    </ul>
  </div>  
</div>
</nav>
<?php if (isset($_SESSION['login_status']) && isset($_SESSION['login_user_id'])) {	
 ?>
 <div class="alert alert-success" style="text-align: center"><?php echo $_SESSION['login_status']; ?></div>
<?php } 
	unset($_SESSION['login_status']);
?>
<p class="home-card">Welcome Teacher</p>
<div class="container">
  <div  class="home-card">
    <table class="table table-striped">
      <thead>
        <tr class="bg-info">
          <th>Student Name</th>
          <th>Class</th>
          <th>Roll No</th>
          <th>Status</th>
        </tr>
        <tbody>
          <?php while($row = $r->fetch_assoc()):
           ?>
            <tr>
              <td>
                <?= $row['name'] ?>
              </td>
              <td>
                <?= $row['class'] ?>
              </td>
              <td>
                <?= $row['roll_num'] ?>
              </td>
              <td>
                <div class="form-group">
                  <label>
                    <input type="radio" name="status" value="Present" class="pd-1" onclick="saveData(this)" data-roll="<?php echo $row['roll_num'] ?>" data-class="<?php echo $row['class'] ?>" data-name="<?php echo $row['name']  ?>" data-teacher="<?php echo $res['email'] ?>" > Present
                  </label>
                  <input type="radio" name="status" value="Leave" class="pd-1" onclick="saveData(this)" data-roll="<?php echo $row['roll_num'] ?>" data-class="<?php echo $row['class'] ?>" data-name="<?php echo $row['name']  ?>" data-teacher="<?php echo $res['email'] ?>" > Leave
                  </label>
                  <input type="radio" name="status" value="Absent" class="pd-1" onclick="saveData(this)" data-roll="<?php echo $row['roll_num'] ?>" data-class="<?php echo $row['class'] ?>" data-name="<?php echo $row['name']  ?>" data-teacher="<?php echo $res['email'] ?>" > Absent
                  </label>
                  
                </div>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </thead>
    </table>
  </div>	<!-- form div -->
</div>

 <script type="text/javascript">
   function saveData(obj,roll){
    //alert("click event detected from below "+obj.data-roll );
    let r = $(obj).data('roll');
    let n = $(obj).data('name');
    let c = $(obj).data('class');
    let t = $(obj).data('teacher');
    if (obj.value =="") {
      alert("No status specified.Choose one");
    }
    else{
      $.ajax({
        url:'attend.php',
        type:'post',
        dataType:'text',
        data:{'status':obj.value,'name':n,'class':c,'roll':r,'teacher':t},
        success:function(data,status){
          setTimeout(function(){
            alert(data);
          },1000);
        },
        complete:function(){
          console.log("Request complete");
        }
      });
    }
   }
 </script>
</body>
</html>