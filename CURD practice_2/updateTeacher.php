<?php
require_once('db_connect.php');
$connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");

if ( isset($_GET["id"]) && isset($_GET["name"]) ) {
    $id = $_GET["id"];
    $dept = $_GET["dept"];
    $name = $_GET["name"];
    $nid = $_GET["nid"];
    $birth = $_GET["birth"];
    $address = $_GET["address"];
    $query = "UPDATE teacher SET dept='$dept', name='$name', nid='$nid', birth='$birth', address='$address' WHERE id=$id";
    mysqli_query( $connect, $query ) or die("Update failed");
    echo "Teacher updated! <br><a href='readTeacher.php'>View all</a>";
    exit;
}
$id = $_GET["id"];
$result = mysqli_query( $connect, "SELECT * FROM teacher WHERE id=$id" );
$row = mysqli_fetch_array($result);
if (!$row) die("Not found");
?>
<h1>Update Teacher</h1>
<form method="get">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    Dept: <input type="text" name="dept" value="<?= $row['dept'] ?>"><br>
    Name: <input type="text" name="name" value="<?= $row['name'] ?>"><br>
    NID: <input type="text" name="nid" value="<?= $row['nid'] ?>"><br>
    Birth: <input type="date" name="birth" value="<?= $row['birth'] ?>"><br>
    Address: <input type="text" name="address" value="<?= $row['address'] ?>"><br>
    <input type="submit" value="Update">
</form>