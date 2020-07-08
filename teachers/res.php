<?php 
include '../functions/database.php';
extract($_POST); 
$id = $_SESSION['login_user_id'];
$m = "SELECT * FROM teacher WHERE id=$id";
$r = $con->query($m);
$ro = $r->fetch_assoc();
$class = $ro['class'];
//print_r($_POST);
$percent = intval(($obt/$tot)*100);
$query = "SELECT * FROM results WHERE subject='$sub' AND class='$class' AND roll_num='$roll' AND term='$term'";
$result = $con->query($query);
if ($row = $result->fetch_assoc() > 0) {
	$data = "Result of roll no ".$roll." for ".$sub." of ".$term." term already added";
	echo json_encode($data);
}

else{
$q = "INSERT INTO results(subject,roll_num,obt_marks,total_marks,percentage,class,term) VALUES('$sub','$roll',$obt,$tot,$percent,'$class','$term')";
//print_r($q);
$res = $con->query($q);
if ($res) {
	$prompt  = "Result inserted";
	 echo json_encode($prompt);
}
else{
	echo "no insertion some error occured";
}
}

?>