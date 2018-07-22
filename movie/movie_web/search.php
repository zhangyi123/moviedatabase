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
			<th BGCOLOR="lightblue">
			<a href="movieinfo.php">Show Movie Info</a>
			</th>
			<th BGCOLOR="yellow">
			<a href="search.php">Search</a>
			</th>
		</tr>
	</table>
	</center>
</head>

<body>
	<h2>Search Actors and Movies</h2>
<form action="search.php" method="GET">

 	<input type="text" name="search" ><br/>
	<input type="submit" value="Search"/>
</form>


<?php

	$Search = trim($_GET["search"]);

	$conn = new mysqli('localhost', 'cs143', '', 'TEST');

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	$Search = $conn->real_escape_string($Search);

	$terms=explode(' ', $Search);

	if($Search!=""){
		echo "<h2>found Actors:</h2>";
		$query = "SELECT id, last, first, dob FROM Actor WHERE (first LIKE '%$terms[0]%' OR last LIKE '%$terms[0]%')";
		for($i=1; $i<count($terms); $i++){
			$term=$terms[$i];
			$query=$query."AND (first LIKE '%$terms[$i]%' OR last LIKE '%$terms[$i]%')";
		}
		$rs = $conn->query($query);
		while($row = $rs->fetch_assoc()) { 
			echo "<a href=\"actorinfo.php?last=".$row["last"]."&first=".$row["first"]. "\">
			   " .$row["first"]. "  " .$row["last"]."  (".$row["dob"].")  </a><br/>";
			
		}

		echo "<br/>";
		echo "<hr>";
		echo "<h2>Found Movies</h2>";
		$rs->free();

		$query2 = "SELECT id, title, year FROM Movie WHERE title LIKE '%$terms[0]%'";
		for($i=1; $i<count($terms); $i++){
			$term=$terms[$i];
			$query2=$query2." AND title LIKE '%$terms[$i]%'";
		}
		$rs2 = $conn->query($query2);
		while($row = $rs2->fetch_assoc()) { 
			echo "<a href=\"movieinfo.php?movie=".$row["title"]. " \">
			".$row["title"]." (".$row["year"].")
			</a><br/>";
			//
		}
		echo "<br/>";
		$rs2->free();
		$conn->close();
	}



?>


</body>
</html>