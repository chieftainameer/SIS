<?php  

include '../functions/database.php';
extract($_POST);
$percent = intval(($obt_mark/$tot_mark)*100);
$query = "SELECT * FROM results WHERE subject='$sub' AND class='$class' AND roll_num='$roll' AND term='$term'";
$result = $con->query($query);
if ($result->num_rows > 0) {
	$data = "Result of roll no ".$roll." for ".$sub." of ".$term." term already added";
	echo ($data);
}

else{
$q = "INSERT INTO results(subject,roll_num,obt_marks,total_marks,percentage,class,term) VALUES('$sub','$roll',$obt_mark,$tot_mark,$percent,'$class','$term')";
//print_r($q);
$res = $con->query($q);
if ($res) {
	$prompt  = "Result inserted";
	 echo $prompt;
}
else{
	echo "no insertion some error occured";
}
}

?>