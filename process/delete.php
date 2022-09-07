<?php

include('../database/connection.php');

session_start();
$userId = $_SESSION['userid'];
$uid = $_GET['cid'];

$sql = "SELECT * from contact where id=$uid";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$first = $row['first_name'];
$last = $row['last_name'];
$date = date('h:i:s:a');
$date2 =date('y-m-d');

$sql = "DELETE from contact where id=$uid";
if($conn->query($sql)){
    $message = "You Deleted A contact ".$first." ".$last." at ".$date;
    $sql2 = "INSERT INTO log(logs,date_created,userid) values('$message','$date2','$userId')";
    $conn->query($sql2);
    header('Location:http://localhost/contact/mycontact.php?msg=Contact Deleted Successfully');
}else{
    echo $conn->connect_error;
}




?>