<?php
include('../database/connection.php');
$request = $_SERVER['REQUEST_URI'];

$router = str_replace('/contact/process/loginprocess.php/','',$request);


switch($router){

    case "login":
    
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * from user where email = '$email' ";
        $result =$conn->query($sql);
        if($result->num_rows==1){
           $row = $result->fetch_assoc();
           if($row['password'] == $password){
            session_start();
            $_SESSION['userid']=$row['id'];
            $date =date("Y-m-d");
            $userId = $row['id'];
            $message = $row['first_name']." logged into the system.";
            $sql2 = "INSERT INTO log(logs,date_created,userid) values('$message','$date','$userId')";
            $conn->query($sql2);
            header('Location:http://localhost/contact/home.php');
           }else{
            header('Location:http://localhost/contact/login.php?msg=Incorrect Password');
           }
        }else{
            header('Location:http://localhost/contact/login.php?msg=No account found with given email');
        }
 

    break;

    case "signup":

        $first = $_POST['firstname'];
        $last = $_POST['lastname'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO user(first_name,last_name,contact,email,password) values ('$first','$last','$contact','$email','$password')";

        if($conn->query($sql)){
            header('Location:http://localhost/contact/login.php?msg=Account Created Successfully');
        }
     
    break;
}
