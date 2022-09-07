<?php

include('../database/connection.php');
session_start();
$userId = $_SESSION['userid'];

$cid = $_POST['cid'];
$first = $_POST['firstname'];
$last = $_POST['lastname'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$address = $_POST['address'];
$gender = $_POST['gender'];

$date = date('h:i:s:a');
$date2 =date('y-m-d');


$sql = "UPDATE contact set first_name='$first',last_name='$last',contact = '$contact',email = '$email', address='$address', gender ='$gender' where id=$cid";

if($conn->query($sql)){
    
            $message = "You edited ".$first." ".$last. " at ".$date;
            $sql2 = "INSERT INTO log(logs,date_created,userid) values('$message','$date2','$userId')";
            $conn->query($sql2);
            header('Location:http://localhost/contact/mycontact.php?msg=Contact Edited Successfully');

}else{

    echo $conn->error;
}
?>