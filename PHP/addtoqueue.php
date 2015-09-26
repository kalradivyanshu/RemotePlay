<?php
	include "connect.php";
	$name = $_GET["name"];
	$id = uniqid();
	$time = time();
	$sql = "INSERT INTO music VALUES('$id','$name','$time')";
	echo $sql;
	$result = $conn->query($sql);
	$conn->close();
?>