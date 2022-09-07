<?php
session_start();
if(!isset($_SESSION['userid'])){
  header('Location:http://localhost/contact/login.php?msg=You Must Log In First');
}
include('include/nav.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <style>
        body{
        background: #0F2027;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #2C5364, #203A43, #0F2027); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

      }
      h1{
        text-align:center;
        margin-top:15%;
      }
    </style>
</head>
<body>
    <h1>WELCOME HOME</h1>
</body>
</html>