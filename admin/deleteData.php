<?php  

include '../functions/database.php';
extract($_POST);
$query = "DELETE FROM ".$table." WHERE id=".$id;

$result = $con->query($query);
if ($result) {
	echo "Deleted succesfully";
}
else
{

	echo "Could not delete data";
}

?>