<?php

include('../database/connection.php');
$date =date("Y-m-d");
        $date2 = date('h:i:s:a');
        $message = "Admin logged out of the system at $date2";

        $sql2 = "INSERT INTO adminlogs(logs,date_created) values('$message','$date')";
            if($conn->query($sql2)){
            header('Location:http://localhost/contact/admin/login.html');
            }else{
                echo $conn->connect_error;  
            }

        session_start();
        session_unset();
        session_destroy();
        header('location:index.html');
?>