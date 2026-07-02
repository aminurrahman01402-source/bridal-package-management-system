<?php
include('db_connect.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $pid = $_POST['package_id']; $n = $_POST['name']; $p = $_POST['phone']; $d = $_POST['event_date'];
    $conn->query("INSERT INTO bridal_bookings (package_id, client_name, client_phone, event_date) VALUES ('$pid', '$n', '$p', '$d')");
    echo "<script>alert('Booking Successful!'); window.location.href='packages.php';</script>";
}
?>