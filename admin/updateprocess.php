<?php

include('../database/connection.php');

$uid =  $_POST['uid'];
$pass = $_POST['pass'];
$name = $_POST['name'];

$sql ="UPDATE user set password = '$pass' where id=$uid";
if($conn->query($sql)){
                $date =date("Y-m-d");
                $date2 = date('h:i:s:a');
                $message = "Admin chaged $name s password at $date2";
                $query = "INSERT INTO adminlogs(logs,date_created) values('$message','$date')";
                    if($conn->query($query)){
                        header('Location:http://localhost/contact/admin/userinfo.php?msg=User Updated Successfully');
                    }else{
                        echo $conn->error;  
                        echo "Probelm here";
                    }
    
}



?>