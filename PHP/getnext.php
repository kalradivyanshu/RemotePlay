<?php
include "connect.php";
$sql = "SELECT * FROM music ORDER BY time DESC";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if($result->num_rows > 0)
{
	$output = array("id"=>$row["id"],"url"=>"uploads/".$row["name"]);
	echo json_encode($output);
}
else 
{
	$output = array("id"=>"empty");
	echo json_encode($output);
}
?>