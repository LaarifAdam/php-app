<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM students ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM students ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<h1> Demonstration pour Sophie ! </h1> 
<a href="add.html">Add New Data</a><br/><br/>

<h3> Attribution des notes ! </h3>
<ul>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<li>".$res['name'];
		echo "vous avez eu ".$res['grade'];
		echo "dans l'ue  ".$res['UE'];	
		echo "<a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Veuillez confirmer la suppression.')\">Delete</a></td>";		
	}
	?>
</ul>
</body>
</html>
