<?php

include 'db_connect.php';

if (isset($_POST['save'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $sql = "INSERT INTO student(name,email,department)
VALUES('$name','$email','$department')";

    if ($conn->query($sql)) {
        echo "Student Added Successfully";
    } else {
        echo "Error";
    }
}

?>

<form method="POST">

    Name

    <input type="text" name="name">

    <br><br>

    Email

    <input type="text" name="email">

    <br><br>

    Department

    <input type="text" name="department">

    <br><br>

    <input type="submit" name="save" value="Save">

</form>

<br>

<a href="index.html">Home</a>