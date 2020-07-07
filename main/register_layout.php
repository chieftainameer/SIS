<?php  
session_start();
if (isset($_SESSION['login_user_id'])) {
  if($_SESSION['user_type'] == 'student'){
    header('Location:home.php');
  }
  else if ($_SESSION['user_type'] == 'parent') {
    header('Location:../parents/home.php');
  }
  else if ($_SESSION['user_type'] == 'teacher') {
    header('Location:../teachers/home.php');
  }
  
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
        .signin-form{
          background-color: #f5f5f5;
          padding:30px;
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
<nav class="navbar navbar-expand-md bg-light navbar-light">
        <div class="container">
  <a class="navbar-brand" href="home.php"><b>SIS</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <!-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link " href="home.php"><i class="fas fa-home"></i> Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="questions_page.php"><i class="fas fa-question-circle"></i> Attendance</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="ask_question.php"><i class="fas fa-pen"></i> Results</a>
      </li>    
    </ul> -->
    <ul class="nav navbar-right ml-auto"> 
        <!-- <li class="nav-item">
    <div class="dropdown">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
           <img src="" style="width: 25px;height: 25px;">
        </button>
         <div class="dropdown-menu">
             <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Profile</a>
             <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>
             <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-in-alt"></i> Logout</a>
         </div>
    </div>
     </li> -->
        <li class="nav-item"><a href="login.php" class="nav-link"><i class="fas fa-sign-in-alt"></i> signin</a></li>
        <li class="nav-item"><a  href="register_layout.php" class="nav-link"><i class="fas fa-user-plus"></i> signup</a></li>
    </ul>
  </div>  
</div>
</nav>


<div class="container login">
  <div class="header-txt">
    <h2>Sign Up Form</h2>
  </div>

    <div class="form-group" class="signin-form">
      <div class="col-md-6">
      <label>User Type</label>
      <select class="form-control" name="user-type" id="user-type">
        <option>choose one</option>
        <option>Student</option>
        <option>Parent</option>
        <option>Teacher</option>
      </select>
    </div>
    </div>

  <form action="../functions/register.php" method="post" class="signin-form" enctype="multipart/form-data" id="student" style="display:none"><!--  student form elements -->
      <input type="hidden" name="user_type" value="student">

    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="student-name" placeholder="Enter Your Name" name="student_name" required>
        </div>
        <div class="col-md-6">
          <label for="student-email">Email</label>
          <input type="email" class="form-control" id="student-email" placeholder="Enter Email" name="student_email" required>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <label for="student-contact">Contact No:</label>
          <input type="text" class="form-control" id="student-contact" placeholder="03xxxxxxxxx" name="student_contact" required>
        </div>
        <div class="col-md-6">
          <label for="father-name">Father Name:</label>
          <input type="text" class="form-control" id="father-name" placeholder="Father Name" name="father_name" required>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <label for="father-contact-no">Father Contact No:</label>
          <input type="text" class="form-control" id="father-contact-no" placeholder="03xxxxxxxxx" name="father_contact_no" required>
        </div>
        <div class="col-md-6">
          <label for="gender">Class:</label>
          <select name="student_class" class="form-control" required>
            <option>Choose One</option>
            <option>1st</option>
            <option>2nd</option>
            <option>3rd</option>
            <option>4th</option>
            <option>5th</option>
            <option>6th</option>
            <option>7th</option>
            <option>8th</option>
            <option>9th</option>
            <option>10th</option>
          </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <label for="reg-no">Registration No:</label>
          <input type="text" class="form-control" id="reg-no" placeholder="Registration Number" name="reg_no" required>
        </div>
        <div class="col-md-6">
          <label for="roll-no">Roll No:</label>
          <input type="text" class="form-control" id="roll-no" placeholder="Roll Number" name="roll_no" required>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <label for="age">Age:</label>
          <input type="text" class="form-control" id="age" placeholder="Enter Your Age in years" name="age" required>
        </div>
        <div class="col-md-6">
          <label for="gender">Gender:</label>
          <select name="gender" class="form-control">
            <option>Choose One</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <label for="pass">Password:</label>
          <input type="password" name="pass" id="pass" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="cpass">Confirm Password:</label>
          <input type="password" name="cpass" id="cpass" class="form-control">
        </div>
      </div>
    </div>
    <div class="form-group">
      <button class="btn btn-primary">Register Student</button>
    </div>
  </form><!-- student form-elements ends here -->

  <form action="../functions/register.php" method="post" class="signin-form" enctype="multipart/form-data" id="parent" style="display:none"><!--  parent form elements -->
      <input type="hidden" name="user_type" value="parent">

    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <label for="parent-name">Name:</label>
          <input type="text" class="form-control" id="parent-name" placeholder="Enter Your Name" name="parent_name" required>
        </div>
        <div class="col-md-6">
          <label for="parent-email">Email:</label>
          <input type="text" class="form-control" id="parent-email" placeholder="Enter Email" name="parent_email" required>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <label for="parent-contact-no">Contact No:</label>
          <input type="text" class="form-control" id="parent-contact-no" placeholder="Enter First Name" name="parent_contact_no" required>
        </div>
        <div class="col-md-6">
          <label for="relation">Relation</label>
          <input type="text" class="form-control" id="relation" placeholder="Enter First Name" name="relation" required>
        </div>
      </div>
    </div>
     <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <label for="gender">Student Class:</label>
          <select name="std_class" class="form-control" required="">
            <option>Choose One</option>
            <option>1st</option>
            <option>2nd</option>
            <option>3rd</option>
            <option>4th</option>
            <option>5th</option>
            <option>6th</option>
            <option>7th</option>
            <option>8th</option>
            <option>9th</option>
            <option>10th</option>
          </select>        </div>
        <div class="col-md-6">
          <label for="std-roll">Student Roll No:</label>
          <input type="text" class="form-control" id="std-roll" placeholder="Enter First Name" name="std_roll" required>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <label for="pass">Password:</label>
          <input type="password" name="pass" id="pass" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="cpass">Confirm Password:</label>
          <input type="password" name="cpass" id="cpass" class="form-control">
        </div>
      </div>
    </div>
    <div class="form-group">
      <button class="btn btn-primary">Register Parent</button>
    </div>
  </form><!-- parent form-elements ends here -->

  <form action="../functions/register.php" method="post" class="signin-form" enctype="multipart/form-data" id="teacher" style="display:none"><!--  teacher form elements -->
      <input type="hidden" name="user_type" value="teacher">

    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" placeholder="Enter First Name" name="name" required>
        </div>
        <div class="col-md-6">
          <label for="t-email">Email:</label>
          <input type="text" class="form-control" id="t-email" placeholder="Enter First Name" name="t_email" required>
        </div>
      </div>
    </div>
   
    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <label for="t-contact-no">Contact No:</label>
          <input type="text" class="form-control" id="t-contact-no" placeholder="Enter First Name" name="t_contact_no" required>
        </div>
        <div class="col-md-6">
         <label for="gender">Class Assigned:</label>
          <select name="t_class" class="form-control" required>
            <option>Choose One</option>
            <option>1st</option>
            <option>2nd</option>
            <option>3rd</option>
            <option>4th</option>
            <option>5th</option>
            <option>6th</option>
            <option>7th</option>
            <option>8th</option>
            <option>9th</option>
            <option>10th</option>
          </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-md-12">
          <label for="qualification">Qualification:</label>
          <input type="text" class="form-control" id="qualification" placeholder="Enter First Name" name="qualification" required>
        </div>
        
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-6">
          <label for="pass">Password:</label>
          <input type="password" name="pass" id="pass" class="form-control">
        </div>
        <div class="col-md-6">
          <label for="cpass">Confirm Password:</label>
          <input type="password" name="cpass" id="cpass" class="form-control">
        </div>
      </div>
    </div>
  <div class="form-group">
    <button class="btn btn-primary">Register Teacher</button>
  </div>
</form>

    
   <!--  <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required> I agree on blabla.
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Check this checkbox to continue.</div>
      </label>
    </div> -->
    
</div>

<script type="text/javascript">
  $(document).ready(function(e){
    $('#user-type').on('change',function(){
      let v = $('#user-type').val();
      
      if (v == 'Student') {
        document.getElementById('student').style.display = "block";
        document.getElementById('teacher').style.display = "none";
        document.getElementById('parent').style.display = "none";
        //alert(v);
      }
      if (v == 'Parent') {
        document.getElementById('parent').style.display = "block";
        document.getElementById('teacher').style.display = "none";
        document.getElementById('student').style.display = "none";
        //alert(v);
      }
      if (v == 'Teacher') {
        document.getElementById('teacher').style.display = "block";
        document.getElementById('student').style.display = "none";
        document.getElementById('parent').style.display = "none";
        //alert(v);
      }
    });
  });
</script>
</body>
</html>
