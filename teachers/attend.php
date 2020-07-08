<?php 
include "../functions/database.php";
extract($_POST);
$date = date("Y-m-d");
$query = "SELECT * FROM attendance WHERE class='$class' AND roll_num='$roll' AND date='$date'";
$r = $con->query($query);
if ($row = $r->fetch_assoc() > 0) {
	$data = "Attendance of this student already marked";
	echo $data;
}
else{
$q = "INSERT INTO `attendance`(`student_name`,`class`,`teacher_name`,`roll_num`,`status`,`date`) VALUES('$name','$class','$teacher','$roll','$status','$date')";
$result = $con->query($q);
if ($result) {
	$data = "Attendance marked";
	echo $data;
}
}
 ?>