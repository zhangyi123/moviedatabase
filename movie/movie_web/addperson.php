<html>
<head>
	<center><h1>Add Actor or Director</h1></center>
	<center>
	<table border="0">
		<tr>
			<th BGCOLOR="yellow">
			<a href="addperson.php">Add Actor or Director</a>
			</th>
			<th BGCOLOR="lightblue">
			<a href="add_movie.php">Add Movie</a>
			</th>
			<th BGCOLOR="lightblue">
			<a href="add_comment.php">Add Movie Comment</a>
			</th>
			<th BGCOLOR="lightblue">
			<a href="actor_to_movie.php">Add Actor to Movie</a>
			</th>
			<th BGCOLOR="lightblue">
			<a href="director_to_movie.php">Add Movie to Director</a>
			</th>
			<th BGCOLOR="lightblue">
			<a href="actorinfo.php">Show Actor Info</a>
			</th>
			<th BGCOLOR="lightblue">
			<a href="movieinfo.php">Show Movie Info</a>
			</th>
			<th BGCOLOR="lightblue">
			<a href="search.php">Search</a>
			</th>
		</tr>
	</table>
	</center>
</head>
<body>
<form action="addperson.php" method="GET">
	Type: <input type="radio" name="type" value="Actor">Actor
	<input type="radio" name="type" value="Director">Director<br/>
	First Name: <input type="text" name="first" ><br/>
	Last Name: <input type="text" name="last"><br/>
	Sex: <input type="radio" name="sex" value="Male">Male
	<input type="radio" name="sex" value="Female">Female<br/>
	Date of Birth: <input type="text" name="birth" >(YYYY-MM-DD)<br/>
	Date of Death: <input type="text" name="death" >(leave blank if N/A)<br/>
<input type="submit" value="Add Person"/>
</form>


<?php
$Type=($_GET["type"]);
$First=($_GET["first"]);
$Last=($_GET["last"]);
$Sex=($_GET["sex"]);
$Dob=($_GET["birth"]);
$Dod=($_GET["death"]);


//$Mid=
//current_timestamp()


$conn = new mysqli('localhost', 'cs143', '', 'TEST');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo $Title;
$First = $conn->real_escape_string($First);
$Last = $conn->real_escape_string($Last);


//echo '$Title';
$query="select id from MaxPersonID";
$rs = $conn->query($query);




while($row = $rs->fetch_assoc()) {

		foreach($row as $key => $value){
		$Id=$value;
		}

}

if($Type=='Actor'){
	if($Dod==''){
		$sql = "INSERT INTO Actor values($Id, '$Last', '$First', '$Sex','$Dob',null)";
	}
	else{
		$sql = "INSERT INTO Actor values($Id, '$Last', '$First', '$Sex','$Dob','$Dod')";

	}

	$conn->query($sql);
}
	
	else{

	if($Dod==''){
		$sql = "INSERT INTO Director values($Id, '$Last', '$First', '$Dob',null)";
	}
	else{
		$sql = "INSERT INTO Director values($Id, '$Last', '$First', '$Dob','$Dod')";

	}
	$conn->query($sql);

}



$up=$conn->query("update MaxPersonID set id=id+1");
$up->free();
$rs->free();
$conn->close();
?>


</body>
</html>