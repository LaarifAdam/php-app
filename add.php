<html>
<head>
	<title>Ajout d'une note</title>
</head>

<body>
<?php
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$UE = mysqli_real_escape_string($con, $_POST['UE']);
	$grade = mysqli_real_escape_string($con, $_POST['grade']);
		
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
		
		echo "<br/><a href='javascript:self.history.back();'>Retour</a>";
	} else { 
		//insert data to database	
		$result = mysqli_query($con, "INSERT INTO students(name,UE,grade) VALUES('$name','$UE','$grade')");
		
		//display success message
		echo "<font color='green'>Note attribué avec succées.";
		echo "<br/><a href='index.php'>Voir le resultat</a>";
	}
}
?>
</body>
</html>
