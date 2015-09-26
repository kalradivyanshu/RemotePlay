<?php
include "connect.php";
$id = $_GET["id"];
$sql = "SELECT name FROM music WHERE id = '".$id."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sql = "DELETE FROM music WHERE id='".$id."'";
if($conn->query($sql) === TRUE)
{
	if($conn->query($sql) === TRUE)
	{
		$link = $row["name"];
		if(unlink("uploads/".$link))
		{
			echo "Deleted!";
		}
	}
}
$conn->close();
?>