<?php
require_once('db_connect.php');
$connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");

$dept_filter = isset($_GET["dept"]) ? $_GET["dept"] : '';
$semester_filter = isset($_GET["semester"]) ? $_GET["semester"] : '';

$sql = "SELECT DISTINCT c.* FROM course c
        LEFT JOIN course_semester cs ON c.id = cs.course_id
        WHERE 1=1";
if( $dept_filter ) $sql .= " AND c.dept='$dept_filter'";
if( $semester_filter ) $sql .= " AND cs.semester='$semester_filter'";
$results = mysqli_query( $connect, $sql ) or die("Query failed");

echo "<h1>Courses</h1>";
echo "<form method='get'>
        Dept: <input name='dept' value='$dept_filter'>
        Semester: <input name='semester' value='$semester_filter'>
        <input type='submit' value='Filter'>
      </form>";

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Dept</th><th>Title</th><th>Credit</th><th>Syllabus</th><th>Action</th></tr>";
while( $rows = mysqli_fetch_array($results) ) {
    extract( $rows );
    echo "<tr>";
    echo "<td> $id </td>";
    echo "<td> $dept </td>";
    echo "<td> $title </td>";
    echo "<td> $credit </td>";
    echo "<td> $syllabus </td>";
    echo "<td> <a href='updateCourse.php?id=$id'>Update</a> | <a href='deleteCourse.php?id=$id'>Delete</a> </td>";
    echo "</tr>";
}
echo "</table>";
echo "<p><a href='index.html'>Home</a></p>";