<?php  

include "../functions/database.php";
extract($_POST);

$q = "SELECT * FROM timetable WHERE class='$class' AND subject='$subject'";
$r = $con->query($q);
if ($r = $r->fetch_assoc() > 0) {
	echo "Time Table for ".$subject." already exists";
}
else{
	$query = "INSERT INTO timetable(teacher_name,class,subject,`time`) VALUES('$teacher','$class','$subject','$time')";
	$result = $con->query($query);
	if ($result) {
		echo "Time Table added successfully";
	}
	else{
		echo "Sorry! ome error occured";
	}
}




?>