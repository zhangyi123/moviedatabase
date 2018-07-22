<html>
<head>
	<center><h1>Add Movie</h1></center>
	<center>
	<table border="0">
		<tr>
			<th BGCOLOR="lightblue">
			<a href="addperson.php">Add Actor or Director</a>
			</th>
			<th BGCOLOR="yellow">
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
<form action="add_movie.php" method="GET">

	Title: <input type="text" name="title" ><br/>
	Year: <input type="text" name="year"><br/>
	Company: <input type="text" name="company"><br/>
	Rating: <select name="rating"><br/>
	<option value="PG-13">PG-13</option>
	<option value="R">R</option>
	<option value="PG">PG</option>
	<option value="NC-17">NC-17</option>
	<option value="surrendere">surrendere</option>
	<option value="G">G</option>
	</select><br/>
	Genre :
			<table border="0">
				<tr>
					<td><input type="checkbox" name="genre[]" value="Action">Action</input></td>
					<td><input type="checkbox" name="genre[]" value="Adult">Adult</input></td>
					<td><input type="checkbox" name="genre[]" value="Comedy">Comedy</input></td>
					<td><input type="checkbox" name="genre[]" value="Adventure">Adventure</input></td>
					<td><input type="checkbox" name="genre[]" value="Animation">Animation</input></td>
					
				</tr>
				<tr>
					<td><input type="checkbox" name="genre[]" value="Mystery">Mystery</input></td>
					<td><input type="checkbox" name="genre[]" value="Romance">Romance</input></td>
					<td><input type="checkbox" name="genre[]" value="Sci-Fi">Sci-Fi</input></td>
					<td><input type="checkbox" name="genre[]" value="Drama">Drama</input></td>
					<td><input type="checkbox" name="genre[]" value="Family">Family</input></td>
					<td><input type="checkbox" name="genre[]" value="Fantasy">Fantasy</input></td>
				</tr>
				<tr>
					<td><input type="checkbox" name="genre[]" value="Crime">Crime</input></td>
					<td><input type="checkbox" name="genre[]" value="Documentary">Documentary</input</td>
					<td><input type="checkbox" name="genre[]" value="Short">Short</input></td>
					<td><input type="checkbox" name="genre[]" value="Thriller">Thriller</input></td>
					<td><input type="checkbox" name="genre[]" value="War">War</input></td>
					<td><input type="checkbox" name="genre[]" value="Western">Western</input></td>
					<td><input type="checkbox" name="genre[]" value="Horror">Horror</input></td>
					<td><input type="checkbox" name="genre[]" value="Musical">Musical</input></td>
					
				</tr>
				<tr>
					
				</tr>
			</table> 
<input type="submit" value="Add Movie"/>
</form>


<?php
$Title=trim($_GET["title"]);
$Rate=($_GET["rating"]);
$Year=($_GET["year"]);
$Company=($_GET["company"]);
$Genre=$_GET["genre"];
//$Mid=
//current_timestamp()


$conn = new mysqli('localhost', 'cs143', '', 'TEST');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo $Title;
$Title = $conn->real_escape_string($Title);

//echo '$Title';
$query="select id from MaxMovieID";
$rs = $conn->query($query);




while($row = $rs->fetch_assoc()) {

		foreach($row as $key => $value){
		$Id=$value;
		}

}
//echo $Id;



$sql = "INSERT INTO Movie values($Id, '$Title', '$Year', '$Rate','$Company')";
$conn->query($sql);


for($i=0; $i <count($Genre); $i++)
			{
				$sql = "INSERT INTO MovieGenre values($Id, '$Genre[$i]' )";
				$conn->query($sql);
			}


$up=$conn->query("update MaxMovieID set id=id+1");
$up->free();
$rs->free();
$conn->close();
?>


</body>
</html>