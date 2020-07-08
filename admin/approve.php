<?php  
include '../functions/database.php';
extract($_POST);

if ($section == 'students') {
	$q = "UPDATE students SET status=1 WHERE roll_num='$roll_or_email' AND class='$class'";
	$c = $con->query($q);
	if ($c) {
		echo "Student request approved!";
	}
	else
	{
		echo "Some Error occured";
	}
} /// student section

if ($section == 'parents') {
	$q = "UPDATE parents SET status=1 WHERE student_roll_num='$roll_or_email' AND class='$class'";
	$c = $con->query($q);
	if ($c) {
		echo "Parent request approved!";
	}
	else
	{
		echo "Some Error occured";
	}
} /// parent section

if ($section == 'teachers') {
	$q = "UPDATE teacher SET status=1 WHERE email='$roll_or_email' AND class='$class'";
	$c = $con->query($q);
	if ($c) {
		echo "Teacher request approved!";
	}
	else
	{
		echo "Some Error occured";
	}
} /// student section


?>