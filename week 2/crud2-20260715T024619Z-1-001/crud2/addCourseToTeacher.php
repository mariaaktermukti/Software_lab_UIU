<?php

	$id = $_GET["id"];

	$name = $_GET["name"];

	$course_id = $_GET["course_id"];

?>


<h1>Update Course</h1>



<form method=get action=updateCourse.php>



	<input type=hidden name=id value='<?php echo $id; ?>'> <br>



	Name: <input type=text name=name value='<?php echo $name; ?>'>

	<p>

	Course ID: <input type=text name=course_id value='<?php echo $course_id; ?>'>

	<p>

	<input type=submit value=Update>

</form>