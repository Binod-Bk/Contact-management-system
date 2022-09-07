<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('Location:http://localhost/contact/login.php?msg=You Must Log In First');
}


  $sid = $_SESSION['userid'];
  include('include/nav.php');

  include('database/connection.php');

  $cid = $_GET['cid'];
  $sql = "SELECT * from contact where id=$cid";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/signup.css">
    <style>
        h2{
            color:white;
        }
    </style>
</head>
<body>

        <form action="process/editcontactprocess.php" method="POST">

            <h2>Edit Contact</h2> <br>
            <label for="name">Name</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="hidden" name="cid" value=<?php echo $row['id']; ?>>
            <input type="text" name="firstname" required="required" value=<?php echo $row['first_name'];  ?>>
            <input type="text" name="lastname" required="required" value=<?php echo $row['last_name'];  ?>>
            <br><br>
            <label for="email">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="email" name="email" value=<?php echo $row['email'];  ?>>
            <br><br>
            <label for="">Contact</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="integer" name="contact" value=<?php echo $row['contact'];  ?> maxlength="10" required="required">
            <br><br>
            <label for="Address">Address</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="address" value=<?php echo $row['address'];  ?> required="required">
            <br><br>
            <label for="Address">Gender</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="gender" value="male">Male 
            <input type="radio" name="gender" value="female">Female 
            <br><br>
            <br><br>&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="but">
            Submit</button> &nbsp;&nbsp;
            <button type="reset" class="but">
                Reset</button>


        </form>
    
    
</body>
</html>