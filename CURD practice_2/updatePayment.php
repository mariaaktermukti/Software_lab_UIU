<?php
require_once('db_connect.php');
$connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");

if ( isset($_GET["payment_id"]) && isset($_GET["amount"]) ) {
    $payment_id = $_GET["payment_id"];
    $student_id = $_GET["student_id"];
    $amount = $_GET["amount"];
    $date = $_GET["date"];
    $query = "UPDATE payment SET student_id=$student_id, amount=$amount, date='$date' WHERE payment_id=$payment_id";
    mysqli_query( $connect, $query ) or die("Update failed");
    echo "Payment updated! <br><a href='readPayment.php'>View all</a>";
    exit;
}
$payment_id = $_GET["payment_id"];
$result = mysqli_query( $connect, "SELECT * FROM payment WHERE payment_id=$payment_id" );
$row = mysqli_fetch_array($result);
if (!$row) die("Not found");
?>
<h1>Update Payment</h1>
<form method="get">
    <input type="hidden" name="payment_id" value="<?= $row['payment_id'] ?>">
    Student ID: <input type="text" name="student_id" value="<?= $row['student_id'] ?>"><br>
    Amount: <input type="text" name="amount" value="<?= $row['amount'] ?>"><br>
    Date: <input type="date" name="date" value="<?= $row['date'] ?>"><br>
    <input type="submit" value="Update">
</form>