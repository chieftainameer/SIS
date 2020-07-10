<?php 
include 'database.php';
extract($_POST);
/*print_r($_POST);
die();*/
if ($user_type == "student"){ /// this snippet is for student registration
	
	$name = $con->real_escape_string($student_name);
	$email = $con->real_escape_string($student_email);
	$contact = $con->real_escape_string($student_contact);
	$father = $con->real_escape_string($father_name);
	$father_contact = $con->real_escape_string($father_contact_no);
	$student_class = $con->real_escape_string($student_class);
	$reg_no = $con->real_escape_string($reg_no);
	$roll_no = $con->real_escape_string($roll_no);
	$age = $con->real_escape_string($age);
	$gender = $con->real_escape_string($gender);
	$pass = $con->real_escape_string($pass);
	if ($pass == $cpass) {
		$pass = password_hash($pass, PASSWORD_DEFAULT);
	}
	else{
		echo "password does not match";
	}

	
	$query = "INSERT INTO students(name,email,contact_num,father_name,father_cell_num,class,registration_num,roll_num,age,gender,password) VALUES ('$name','$email',$contact,'$father',$father_contact,'$student_class','$reg_no','$roll_no',$age,'$gender','$pass')";
	/*echo $query;
	die();*/
	$res = $con->query($query);
	
	if ($res) {
		echo "<script>alert('worked');</script>";
		$_SESSION['signed_up'] = "You Signed Up Successfully";
		header('Location:../main/login.php');
	}
	else{
		/*$_SESSION['signup_error'] = "Something went wrong try again";
		header('location:login_page.php');*/
		//echo "<script>alert(".$con->error.");</script>";
		echo $con->error;
	}
}



if ($user_type == "parent"){ /// this snippet is for parent registration
	
	$name = $con->real_escape_string($parent_name);
	$email = $con->real_escape_string($parent_email);
	$contact = $con->real_escape_string($parent_contact_no);
	$relation = $con->real_escape_string($relation);
	$student_class = $con->real_escape_string($std_class);
	$roll_no = $con->real_escape_string($std_roll);
	$pass = $con->real_escape_string($pass);
	if ($pass == $cpass) {
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		
	}
	else{
		echo "password doe not match";
	}
	
	$query = "INSERT INTO parents(name,email,contact_num,student_roll_num,class,relation,password) VALUES ('$name','$email',$contact,'$roll_no','$student_class','$relation','$pass')";
	/*echo $query;
	die();*/
	$res = $con->query($query);
	
	if ($res) {
		echo "<script>alert('worked');</script>";
		$_SESSION['signed_up'] = "You Signed Up Successfully";
		header('Location:../main/login.php');
	}
	else{
		/*$_SESSION['signup_error'] = "Something went wrong try again";
		header('location:login_page.php');*/
		echo "<script>alert('error occured');</script>";
	}
}


if ($user_type == "teacher"){ /// this snippet is for student registration
	
	$name = $con->real_escape_string($name);
	$email = $con->real_escape_string($t_email);
	$contact = $con->real_escape_string($t_contact_no);
	$class = $con->real_escape_string($t_class);
	$qual = $con->real_escape_string($qualification);
	$pass = $con->real_escape_string($pass);
	if ($pass == $cpass) {
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		
	}
	else{
		echo "password doe not match";
	}

	
	$query = "INSERT INTO teacher(name,email,contact_num,qualification,class,password) VALUES ('$name','$email',$contact,'$qual','$class','$pass')";
	/*echo $query;
	die();*/
	$res = $con->query($query);
	
	if ($res) {
		echo "<script>alert('worked');</script>";
		$_SESSION['signed_up'] = "You Signed Up Successfully";
		header('Location:../main/login.php');
	}
	else{
		/*$_SESSION['signup_error'] = "Something went wrong try again";
		header('location:login_page.php');*/
		echo "<script>alert('error occured');</script>";
	}
}


?>	