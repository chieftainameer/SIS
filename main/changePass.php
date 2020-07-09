<?php  

include '../functions/database.php';
extract($_POST);
$hash = password_hash($pass, PASSWORD_DEFAULT);
$q = "UPDATE students SET password='$hash' WHERE roll_num='$roll'";
$c = $con->query($q);

if ($c) {
	echo "Password updated";
}
else
{
	echo "Sorry some error occured";
}

?>