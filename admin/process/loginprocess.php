<?php

include('../../database/connection.php');

        $email = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * from admin where email = '$email' ";
        $result =$conn->query($sql);
        if($result->num_rows==1){
           $row = $result->fetch_assoc();
           if($row['password'] == $password){
                session_start();
                $_SESSION['adminid']=$row['id'];
                $date =date("Y-m-d");
                $date2 = date('h:i:s:a');
                $message = "Admin logged into the system at $date2";

                $sql2 = "INSERT INTO adminlogs(logs,date_created) values('$message','$date')";
                    if($conn->query($sql2)){
                    header('Location:http://localhost/contact/admin/home.php');
                    }else{
                        echo $conn->connect_error;  
                    }
           }else{
            header('Location:http://localhost/contact/admin?msg=Incorrect Password');
           }
        }else{
            header('Location:http://localhost/contact/admin?msg=No account found with given email');
        }

?>