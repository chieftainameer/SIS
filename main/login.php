<?php  
include '../functions/database.php';
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

if (isset($_POST['login'])) {
	extract($_POST);

	if ($role == 'student') {
		$query = "SELECT * FROM students WHERE email='$email'";
		$res = $con->query($query);
		$res = $res->fetch_assoc();
		if ($res > 1) {
			/*print_r($res);
			die;*/
			extract($res);
			
			if (password_verify($pass, $password)) {
				$_SESSION['login_user_id'] = $id;
				$_SESSION['name'] = $name;
				$_SESSION['roll'] = $roll_num;
				$_SESSION['user_type'] = "student";
				$_SESSION['status'] = $status;
				$_SESSION['login_status'] = "Logged in successfully";
				$_SESSION['login_email'] = $email;
				header('Location:home.php');

			}
			else{
			$_SESSION['login_error'] = "Incorrect email and password combination";
				
			}
			
		}
		else{
			$_SESSION['login_error'] = "No user found against this email";
			
	}
		} // student login


		if ($role == 'parent') {
		$query = "SELECT * FROM parents WHERE email='$email'";
		$res = $con->query($query);
		$res = $res->fetch_assoc();
		if ($res > 1) {
			/*print_r($res);
			die;*/
			extract($res);
			
			if (password_verify($pass, $password)) {
				$_SESSION['login_user_id'] = $id;
				$_SESSION['name'] = $name;
				$_SESSION['roll_num'] = $student_roll_num;
				$_SESSION['user_type'] = "parent";
				$_SESSION['status'] = $status;
				$_SESSION['login_status'] = "Logged in successfully";
				$_SESSION['login_email'] = $email;
				header('Location:../parents/home.php');

			}
			else{
			$_SESSION['login_error'] = "Incorrect email and password combination";
				
			}
			
		}
		else{
			$_SESSION['login_error'] = "No user found against this email";
			
	}
		} // parent login


		if ($role == 'teacher') {
		$query = "SELECT * FROM teacher WHERE email='$email'";
		$res = $con->query($query);
		$res = $res->fetch_assoc();
		if ($res > 1) {
			/*print_r($res);
			die;*/
			extract($res);
			
			if (password_verify($pass, $password)) {
				$_SESSION['login_user_id'] = $id;
				$_SESSION['name'] = $name;
				$_SESSION['user_type'] = "teacher";
				$_SESSION['login_status'] = "Logged in successfully";
				$_SESSION['login_email'] = $email;
				$_SESSION['status'] = $status;
				header('Location:../teachers/home.php');

			}
			else{
			$_SESSION['login_error'] = "Incorrect email and password combination";
				
			}
			
		}
		else{
			$_SESSION['login_error'] = "No user found against this email";
			
	}
		} // student login
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>NCBA&E Sharing-Knowledge</title>
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
          margin-top: 15px;
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
       <!--  <li class="nav-item">
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
<?php 
if (isset($_SESSION['signed_up'])) {
?>
	<div class="alert alert-success" style="text-align: center;"><?php echo $_SESSION['signed_up'] ?></div>

<?php
unset($_SESSION['signed_up']);
}
?>

<?php
if (isset($_SESSION['login_error'])) {
?>
	<div class="alert alert-danger"><?php echo $_SESSION['login_error'] ?></div>
	
<?php
unset($_SESSION['login_error']);
}
?>

<div class="container">
	<div class="header-txt">
    <h2>Log in</h2>
  </div>
<form class="signin-form login" action="login.php" method="POST">
	<div style="margin-left: 30%">
	<div class="form-group">
		<div class="col-md-6 ">
			<label>Email:</label>
	        <input type="email" name="email" class="form-control" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-6">
			<label>Password:</label>
	        <input type="password" name="pass" class="form-control" required>
		</div>
	</div>
	<div class="form-group" style="margin-left:15px ">
			<div class="form-check-inline">
			  <label class="form-check-label">
			    <input type="radio" class="form-check-input" name="role" value="student" checked>Student
			  </label>
			</div>
			<div class="form-check-inline">
			  <label class="form-check-label">
			    <input type="radio" class="form-check-input" name="role" value="parent">Parent
			  </label>
			</div>
			<div class="form-check-inline disabled">
			  <label class="form-check-label">
			    <input type="radio" class="form-check-input" name="role" value="teacher">Teacher
			  </label>
		    </div>
		</div>
		<div class="form-group">
			<div class="row" style="margin-left: 15px;">
				<div class="col-md-4">
					<h6>If admin click <a href="../admin/login.php">admin</a></h6>
				</div>
			</div>
		</div>
	<div class="form-group">
		<button class="btn btn-primary" style="margin-left: 20%" name="login">Login</button>
	</div>
</div>
</form>
</div>
</body>
</html>
