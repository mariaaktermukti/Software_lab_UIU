<?php
require_once('db_connect.php');
$connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");

if ( isset($_GET["student_id"]) && isset($_GET["amount"]) ) {
    $student_id = $_GET["student_id"];
    $amount = $_GET["amount"];
    $date = $_GET["date"];
    $query = "INSERT INTO payment (student_id, amount, date) VALUES ($student_id, $amount, '$date')";
    mysqli_query( $connect, $query ) or die("Insert failed");
    echo "Payment created. <br><a href='readPayment.php'>View all</a>";
    exit;
}
?>
<h1>Create Payment</h1>
<form method="get">
    Student ID: <input type="text" name="student_id"><br>
    Amount: <input type="text" name="amount"><br>
    Date: <input type="date" name="date"><br>
    <input type="submit" value="Create">
</form>