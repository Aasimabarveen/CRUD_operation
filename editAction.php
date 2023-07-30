<?php
// Include the database connection file
require_once("dbconnection.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
	$subject = mysqli_real_escape_string($mysqli, $_POST['subject']);	
	
	// Check for empty fields
	if (empty($name) || empty($age) || empty($phone) || empty($subject)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if (empty($phone)) {
			echo "<font color='red'>phone field is empty.</font><br/>";
		}
		
		if (empty($subject)) {
			echo "<font color='red'>subject field is empty.</font><br/>";
		}
	} else {

		// Update the database table
		$result = mysqli_query($mysqli, "UPDATE teachers SET `name` = '$name', `age` = '$age', `phone` = '$phone', `subject_name` = '$subject' WHERE `id` = $id");
		
		// Display success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}

?>