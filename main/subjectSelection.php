<?php  

include '../functions/database.php';
extract($_POST);

$q = "INSERT INTO choosen(subject_name,class,roll_num) VALUES('$subject','$class','$roll')";
$c = $con->query($q);
$data = [];
if ($c) {
	$msg = "Subject added";
	$result = true;
	array_push($data, $msg);
	array_push($data, $result);
	echo json_encode($data);
}
else
{
	echo json_encode("Error Occured");
}
?>