<?php
require_once('db_connect.php');
$connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");

$student_filter = isset($_GET["student_id"]) ? $_GET["student_id"] : '';
$where = $student_filter ? "WHERE student_id=$student_filter" : "";
$results = mysqli_query( $connect, "SELECT * FROM payment $where" ) or die("Query failed");

echo "<h1>Payments</h1>";
echo "<form method='get'><label>Student ID: <input name='student_id' value='$student_filter'></label> <input type='submit' value='Filter'></form>";

echo "<table border='1'>";
echo "<tr><th>Payment ID</th><th>Student ID</th><th>Amount</th><th>Date</th><th>Action</th></tr>";
while( $rows = mysqli_fetch_array($results) ) {
    extract( $rows );   // creates $payment_id, $student_id, $amount, $date
    echo "<tr>";
    echo "<td> $payment_id </td>";
    echo "<td> $student_id </td>";
    echo "<td> $amount </td>";
    echo "<td> $date </td>";
    echo "<td> <a href='updatePayment.php?payment_id=$payment_id'>Update</a> | <a href='deletePayment.php?payment_id=$payment_id'>Delete</a> </td>";
    echo "</tr>";
}
echo "</table>";
echo "<p><a href='index.html'>Home</a></p>";
?>