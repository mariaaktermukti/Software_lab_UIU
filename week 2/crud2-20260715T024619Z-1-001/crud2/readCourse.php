<?php
	require_once('db_connect.php');
	$connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");

	$results = mysqli_query( $connect, "SELECT * FROM Course" )
		or die("Can not execute query");

	echo "<table border> \n";
	echo "<th>ID</th> <th>Title</th>\n";

	while( $rows = mysqli_fetch_array( $results ) ) {
		extract( $rows );
		echo "<tr>";
		echo "<td> $id </td>";
		echo "<td> $title </td>";
		echo "</tr> \n";
	}

	echo "</table> \n";

	echo "<p><a href=index.html>Go to main page</a>";
?>