<?php  

include '../functions/database.php';
extract($_POST);
$q = "SELECT * FROM choosen WHERE roll_num='$roll' AND class='$class'";
$c = $con->query($q);
$data = [];
if ($c->num_rows > 0) {
	while ($row = $c->fetch_assoc()) {
		array_push($data, $row['subject_name']);
	}
	echo json_encode($data);
}
else
{
	echo json_encode("No Subjects Found");
}

?>