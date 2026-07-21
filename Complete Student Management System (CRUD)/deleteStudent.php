<?php

include 'db_connect.php';

if(isset($_POST['delete']))
{

$id=$_POST['id'];

$sql="DELETE FROM student WHERE id=$id";

if($conn->query($sql))
{
echo "Deleted Successfully";
}
else
{
echo "Error";
}

}

?>

<form method="POST">

Student ID

<input type="number" name="id">

<br><br>

<input type="submit" name="delete" value="Delete">

</form>

<br>

<a href="index.html">Home</a>