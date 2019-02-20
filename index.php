<?php
include_once("config.php");

$result = mysqli_query($con, "SELECT * FROM students ORDER BY id DESC"); 
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
}
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<h1> Démonstration pour Sophie ! </h1> 
<a href="add.html">Ajouter de nouvelles notes</a><br/><br/>

<h3> Attribution des notes ! </h3>
<ul>
	<?php  
	while($res = mysqli_fetch_array($result)) { 		
		echo "<li><font color='blue'>".$res['name']. " </font>";
		echo "vous avez eu <font color='green'>".$res['grade']." </font>";
		echo "dans l'ue  <font color='red'>".$res['UE']." </font>";	
		echo "<a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Veuillez confirmer la suppression.')\">Delete</a></td>";		
	}
	?>
</ul>
</body>
</html>
