<?php

include('../database/connection.php');
session_start();
$userId = $_SESSION['userid'];

$first = $_POST['firstname'];
$last = $_POST['lastname'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$address = $_POST['address'];
$file = $_POST['idfile'];
$gender = $_POST['gender'];

$date = date('h:i:s:a');
$date2 =date('y-m-d');


$sql = "INSERT INTO contact(first_name,last_name,contact,email,address,file,gender,userid) values ('$first','$last','$contact','$email','$address','$file','$gender',$userId)";

if($conn->query($sql)){
    
            $message = "You added A New contact at ".$date;
            $sql2 = "INSERT INTO log(logs,date_created,userid) values('$message','$date2','$userId')";
            $conn->query($sql2);
            header('Location:http://localhost/contact/mycontact.php?msg=Contact Added Successfully');

}else{

    echo $conn->error;
}
?>