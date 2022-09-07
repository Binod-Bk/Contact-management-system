<?php

include('../database/connection.php');
session_start();
$userId = $_SESSION['userid'];

$pass = $_POST['pass1'];
$pass2 = $_POST['pass2'];

$date = date('h:i:s:a');
$date2 =date('y-m-d');

$query = "SELECT * from user where id=$userId";
$result = $conn->query($query);
$row = $result->fetch_assoc();
if($row['password'] == $pass){
    $sql = "UPDATE user set password='$pass2' where id=$userId";
    if($conn->query($sql)){
    
        $message = "You update your password at ".$date;
        $sql2 = "INSERT INTO log(logs,date_created,userid) values('$message','$date2','$userId')";
        $conn->query($sql2);
        header('Location:http://localhost/contact/profile.php?msg=Password Updated Successfully');

    }else{

    echo $conn->error;
    }
}else{
    header('Location:http://localhost/contact/profile.php?msg=Password Didnt Matched');
}



?>