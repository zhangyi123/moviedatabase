<html>
<head>
	<center><h1>Add Comment</h1></center>
	<center>
	<table border="0">
		<tr>
			<th BGCOLOR="lightblue">
			<a href="addperson.php">Add Actor or Director</a>
			</th>
			<th BGCOLOR="lightblue">
			<a href="add_movie.php">Add Movie</a>
			</th>
			<th BGCOLOR="yellow">
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
<form action="add_comment.php" method="GET">
	Name : <input type="text" name="name" ><br/>
	Movie: <input type="text" name="movie"><br/>
	Rating: <select name="rating"><br/>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	</select><br/>
	Comment: <TEXTAREA name="comment" ROWS=7 COLS=50></TEXTAREA>
<input type="submit" value="Add Comment"/>
</form>


<?php
$Name=($_GET["name"]);
$Rate=($_GET["rating"]);
$Movie=($_GET["movie"]);
$Comment=($_GET["comment"]);

//$Mid=
//current_timestamp()


$conn = new mysqli('localhost', 'cs143', '', 'TEST');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$Comment = $conn->real_escape_string($Comment);
$Movie = $conn->real_escape_string($Movie);
$Name = $conn->real_escape_string($Name);
$query="select id from Movie where title='$Movie'";
$rs = $conn->query($query);



while($row = $rs->fetch_assoc()) {

		foreach($row as $key => $value){
		$Id=$value;
		}

}
echo $Id;

echo $Comment;
//$sql = "INSERT INTO Review values('$Name', current_timestamp(), $Id, $Rate,$Comment)";
$sql = "INSERT INTO Review values('$Name', current_timestamp(), '$Id', '$Rate','$Comment')";
$conn->query($sql);



$rs->free();
$conn->close();
?>


</body>
</html>