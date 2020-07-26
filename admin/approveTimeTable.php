<?php  

include '../functions/database.php';
extract($_POST);
$q = "UPDATE timetable SET approved=1 WHERE class='$class'";
$c = $con->query($q);
if ($c) {
	echo "Time Table Approved";
}
else
{
	echo "Some error occured";
}

?>