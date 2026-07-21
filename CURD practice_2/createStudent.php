<?php
require_once('db_connect.php');
$connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");

if ( isset($_GET["name"]) && isset($_GET["dept"]) ) {
    // Process insert
    $dept = $_GET["dept"];
    $name = $_GET["name"];
    $nid = $_GET["nid"];
    $birth = $_GET["birth"];
    $address = $_GET["address"];

    $query = "INSERT INTO student (dept, name, nid, birth, address)
              VALUES ('$dept', '$name', '$nid', '$birth', '$address')";
    mysqli_query( $connect, $query ) or die("Insert failed: " . mysqli_error($connect));
    echo "Student created: $name <br><a href='readStudent.php'>View all</a>";
    exit;
}
?>
<h1>Create Student</h1>
<form method="get" action="createStudent.php">
    Dept: <input type="text" name="dept"><br>
    Name: <input type="text" name="name"><br>
    NID: <input type="text" name="nid"><br>
    Birth: <input type="date" name="birth"><br>
    Address: <input type="text" name="address"><br>
    <input type="submit" value="Create">
</form>