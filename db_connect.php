<?php
	$conn = mysqli_connect("localhost", "root", "", "shop");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>