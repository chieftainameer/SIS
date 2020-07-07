<?php  
include '../functions/database.php';
extract($_POST);
$query = "SELECT subject_name FROM choosen WHERE roll_num='$roll_num'";
$res = $con->query($query);
//$res = $res->fetch_assoc();
$data = [];
while ($r = $res->fetch_assoc()) {
	array_push($data, $r['subject_name']);
}
echo json_encode($data);

?>