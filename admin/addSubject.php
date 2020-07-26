<?php  

include '../functions/database.php';
extract($_POST);
$q = "SELECT * FROM subjects WHERE class='$class' AND subject_name='$sub'";
$c = $con->query($q);
if ($c->num_rows > 0) {
	echo "This subject already exists";
}
else
{
	$q = "INSERT INTO subjects(class,subject_name) VALUES('$class','$sub') ";
	$c = $con->query($q);
	if ($c) {
		echo "Subject added";
	}
	else
	{
		echo "Subject was not added";
	}
}

?>