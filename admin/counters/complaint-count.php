<?php
	// Connect to the database
	$conn = mysqli_connect("localhost", "root", "", "complaint");

	$sql = "SELECT id FROM complaint";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	echo "$count";
?>
