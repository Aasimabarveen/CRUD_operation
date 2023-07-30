<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
// Include the database connection file
require_once("dbconnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
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
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO teachers ( `name`, `age`, `phone`, `subject_name`) VALUES ('$name', '$age', '$phone', '$subject')");
		
		// Display success message
		echo "<p><font color='green'>Data added successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}

?>
</body>
</html>