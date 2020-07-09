<?php  

include '../functions/database.php';
extract($_POST);
$q = "SELECT * FROM students WHERE class='$class'";
$c = $con->query($q);
$data = [];
if ($c->num_rows > 0) {
	while ($row = $c->fetch_assoc()) {
		array_push($data, $row['roll_num']);
	}
	echo json_encode($data);
}
else
{
	echo json_encode("No Students Found");
}

?>