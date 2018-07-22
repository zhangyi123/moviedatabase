<html>
<head>
	<center><h1>Actor Info</h1></center>
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
			<th BGCOLOR="yellow">
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
<form action="actorinfo.php" method="GET">

	Actor Lastname: <input type="text" name="last" ><br/>
	Actor Firstname: <input type="text" name="first"><br/>

<input type="submit" value="Show Actor Info"/>
</form>


<?php
$Last=trim($_GET["last"]);
$First=($_GET["first"]);



$conn = new mysqli('localhost', 'cs143', '', 'TEST');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$First = $conn->real_escape_string($First);
$Last = $conn->real_escape_string($Last);

$query="select id from Actor where last='$Last' and first= '$First' ";
$rs = $conn->query($query);
while($row = $rs->fetch_assoc()) {

		foreach($row as $key => $value){
		$Mid=$value;


		}

}

$query1="select * from Actor where last='$Last' and first= '$First' ";
$rs = $conn->query($query1);




while($row = $rs->fetch_assoc()) {

		foreach($row as $key => $value){
		//$Id=$value;
		echo "$key :	 $value <br>";


		}

}
//echo $Mid;
$query2="select mid from MovieActor where aid=$Mid";
$rs = $conn->query($query2);
while($row = $rs->fetch_assoc()) {

		foreach($row as $key => $value){
			
			$querry3="select title from Movie where id=$value";
			$movie=$conn->query($querry3);
			$temp=$movie->fetch_assoc();
			foreach($temp as $key_m => $value_m){
				echo '<a href="url">'  .$value_m .' </a>';

		}


		}

}






$rs->free();
$conn->close();
?>


</body>
</html>