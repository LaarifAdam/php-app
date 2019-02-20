<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$UE = mysqli_real_escape_string($con, $_POST['UE']);
	$grade = mysqli_real_escape_string($con, $_POST['grade']);
		
	// checking empty fields
	if(empty($name) || empty($UE) || empty($grade)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($UE)) {
			echo "<font color='red'>UE field is empty.</font><br/>";
		}
		
		if(empty($grade)) {
			echo "<font color='red'>grade field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO students(name,UE,grade) VALUES('$name','$UE','$grade')");
		
		//display success message
		echo "<font color='green'>Note attribué avec succées.";
		echo "<br/><a href='index.php'>Voir le resultat</a>";
	}
}
?>
</body>
</html>
