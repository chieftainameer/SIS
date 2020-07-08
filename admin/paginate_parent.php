<?php  

include '../functions/database.php';
extract($_POST);
$limit = 7;
$q = "SELECT COUNT(*) AS total FROM $table WHERE status=0";
$c = $con->query($q);
$res = $c->fetch_assoc();
$total = $res['total'];
$pages = ceil($total/$limit);
$start = $limit * $page;
$query = "SELECT * FROM $table WHERE status=0 LIMIT $start,$limit";
//die($query);
$co = $con->query($query);
$data = [];
if ($co->num_rows > 0) {
	while ($row = $co->fetch_assoc()) {
		array_push($data, $row);
	}
}

else
{
	echo "No more data";
}
echo json_encode($data);
?>