<html>
<head>
	<center><h1>Movie Info</h1></center>
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
			<th BGCOLOR="lightblue">
			<a href="director_to_movie.php">Add Movie to Director</a>
			</th>
			<th BGCOLOR="lightblue">
			<a href="actorinfo.php">Show Actor Info</a>
			</th>
			<th BGCOLOR="yellow">
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
<form action="movieinfo.php" method="GET">

	Movie: <input type="text" name="movie" ><br/>

<input type="submit" value="Show Movie Info"/>
</form>

	<center>
	<table border="0">
		<tr>
			<th BGCOLOR="lightblue">
			<a href="add_comment.php">Add Movie Comment</a>
			</th>

		</tr>
	</table>
	</center>

<?php
$Movie=trim($_GET["movie"]);




$conn = new mysqli('localhost', 'cs143', '', 'TEST');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$Movie = $conn->real_escape_string($Movie);




$query1="select * from Movie where title='$Movie' ";
$rs = $conn->query($query1);




while($row = $rs->fetch_assoc()) {

		foreach($row as $key => $value){
		//$Id=$value;
			if($key=='id'){
				$Mid=$value;
			}
			else{
				echo "$key :	 $value <br>";
			}
		


		}

}
echo "<h4>" . "Genre:". "</h4>";
$query1="select * from MovieGenre where mid='$Mid' ";
$rs = $conn->query($query1);

while($row = $rs->fetch_assoc()) {
		foreach($row as $key => $value){
		//$Id=$value;
			if($key!='mid')
				echo "	 $value <br>";

		}

}
echo "<h4>" . "Actor/Actress:". "</h4>";

$query1="select aid from MovieActor where mid='$Mid' ";
$rs = $conn->query($query1);
while($row = $rs->fetch_assoc()) {
		foreach($row as $key => $value){
		//$Id=$value;
				$query2="select first, last from Actor where id='$value' ";
				$sub_rs = $conn->query($query2);
				while($row1 = $sub_rs->fetch_assoc()) {
					foreach($row1 as $key1 => $value1){

						echo "	 $value1 ";

					}
					echo "<br>";

				}

		}

}

echo "<h4>" . "Comment:". "</h4>";

$query1="select * from Review where mid='$Mid' ";
$rs = $conn->query($query1);

while($row = $rs->fetch_assoc()) {
		foreach($row as $key => $value){
		//$Id=$value;
			if($key=='comment')
				echo "	 $value <br>";

		}

}

echo "<h4>" . "Average rating:". "</h4>";


$query1="select Avg(rating) from Review where mid='$Mid' ";
$rs = $conn->query($query1);
while($row = $rs->fetch_assoc()) {
		foreach($row as $key => $value){
				echo "	 $value <br>";

		}

}

$sub_rs->free();

$rs->free();
$conn->close();
?>


</body>
</html>