<?php

	$id = $_GET["id"];

	$name = $_GET["name"];

	$course_id = $_GET["course_id"];



	require_once('db_connect.php');

	$connect = mysqli_connect( HOST, USER, PASS, DB )

		or die("Can not connect");



	$query 	= "UPDATE Teacher SET course_id='$course_id' WHERE id = $id";

	//echo $query;

	mysqli_query( $connect, $query )

		or die("Can not execute query");


	echo "<p>Course updated:<br> Name = $name <br> Course ID = $course_id";


	echo "<p><a href=index.html>Go to Main Page</a>";

?>