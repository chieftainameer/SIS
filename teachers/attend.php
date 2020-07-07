<?php 
include "../functions/database.php";
extract($_POST);
$date = date("Y-m-d");

$q = "INSERT INTO `attendance`(`student_name`,`class`,`teacher_name`,`roll_num`,`status`,`date`) VALUES('$name','$class','$teacher','$roll','$status','$date')";
$result = $con->query($q);
if ($result) {
	$data = "Attendance marked";
	echo $data;
}
 ?>