<html>
<head>
	<center><h1>Add Director to Movie</h1></center>
	<center>
	<table border="0">
		<tr>
			<th BGCOLOR="lightblue">
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
			<th BGCOLOR="yellow">
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
<form action="director_to_movie.php" method="GET">
	Director Lastname : <input type="text" name="last" ><br/>
	Director FirstName : <input type="text" name="first" ><br/>
	Movie: <input type="text" name="movie"><br/>

<input type="submit" value="Add Director to Movie"/>
</form>


<?php
$First=($_GET["first"]);
$Last=($_GET["last"]);
$Movie=($_GET["movie"]);




$conn = new mysqli('localhost', 'cs143', '', 'TEST');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$First = $conn->real_escape_string($First);
$Last = $conn->real_escape_string($Last);
$Movie = $conn->real_escape_string($Movie);

$query="select id from Movie where title='$Movie'";
$rs = $conn->query($query);

while($row = $rs->fetch_assoc()) {

		foreach($row as $key => $value){
		$Mid=$value;
		}

}

echo $Mid;
$query="select id from Director where last='$Last' and first='$First'";
$rs = $conn->query($query);

while($row = $rs->fetch_assoc()) {

		foreach($row as $key => $value){
		$Did=$value;
		}

}

Echo $Did;
$sql = "INSERT INTO MovieDirector values($Mid,$Did )";
$conn->query($sql);



$rs->free();
$conn->close();
?>


</body>
</html>