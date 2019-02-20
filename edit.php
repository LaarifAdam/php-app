<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($con, $_POST['id']);
	
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
	} else {	
		//updating the table
		$result = mysqli_query($con, "UPDATE students SET name='$name',UE='$UE',grade='$grade' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM students WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$UE = $res['UE'];
	$grade = $res['grade'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nom de l'etudiant</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Nom de l'UE</td>
				<td><input type="text" name="UE" value="<?php echo $UE;?>"></td>
			</tr>
			<tr> 
				<td>Note</td>
				<td><input type="text" name="grade" value="<?php echo $grade;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
