<?php
$payment_id = $_GET["payment_id"];
require_once('db_connect.php');
$connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");
mysqli_query( $connect, "DELETE FROM payment WHERE payment_id=$payment_id" ) or die("Delete failed");
echo "Payment deleted.<br><a href='readPayment.php'>View all</a>";
?>