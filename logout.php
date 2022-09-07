<?php
      session_start();
        $userId = $_SESSION['userid'];
      include('database/connection.php');
      $date =date("Y-m-d");
              $date2 = date('h:i:s:a');
              $message = "You logged out of the system at $date2";
      
              $sql2 = "INSERT INTO log(logs,date_created,userid) values('$message','$date','$userId')";
                  if($conn->query($sql2)){
                  header('Location:http://localhost/contact/admin/login.html');
                  }else{
                      echo $conn->connect_error;  
                  }
      
              session_start();
              session_unset();
              session_destroy();
              header('location:login.php');
?>