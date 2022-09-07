<?php
session_start();
if(!isset($_SESSION['userid'])){
    header('Location:http://localhost/contact/login.php?msg=You Must Log In First');
  }
include('include/nav.php');

include("database/connection.php");
$id =$_SESSION['userid'];


?>

    <style>
        body{
        background: #0F2027;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #2C5364, #203A43, #0F2027); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

      }
         .container1{
            display:flex;
            /* background-image: linear-gradient(to right, #0f0c29, #302b63, #24243e); */
            height:90vh;
           
         }
         .container1 h1{
             position:relative;
             top:0%;
            
             font-size:40px;
         }
         .card{
        margin-top:60px;
        margin-left:200px;
        display:inline-block;
        background:#DFCAA0;
        border-radius:20px;
        height:430px;
        width: 400px;
    }
    .but{
        border:1px blue solid;
        margin-left:170px;
        border-radius:5px;
        margin-top:5px;
        width:150px;
        background:green;
        color:white;
    }
    input{
        border:1px blue solid;
        padding:5px;
        margin: 10px;
        border-radius:5px;
        width:200px;

    }
    label{
        width:140px;
        display:inline-block;
        text-align:right;
        font-size:14px;
        color:white;
    }
    .img{
        margin-top:200px;
    }
 form{
  
    margin-top:20px;
 }
    </style>

<div class="container1">
        <h1>My Details</h1>
        <?php
    

 $sql  = "SELECT * from user where id='$id'";
 $result = $conn->query($sql);
     $row = $result->fetch_assoc()
         ?>
<br><br><br>
        <form action="process/updateprofile.php" Method="POST">
           
                <input type="hidden" value="<?php echo $row['id']; ?>" name="uid">
                <br><br>
                <label for="name">Name :</label>
                <input type="text" value="<?php echo $row['first_name']." ".$row['last_name']; ?>" name="name" readonly><br>
                <label for="name">Contact :</label>
                <input type="text" value="<?php echo $row['contact'];  ?> " name="contact" readonly><br>
                <label for="name">Email :</label>
                <input type="text" value="<?php echo $row['email'];  ?> " name="email" readonly><br>
                <label for="name">Current Password :</label>
                <input type="password" name="pass1" > <br>
                <label for="name">New Password :</label>
                <input type="password" name="pass2" > <br>
                <input type="submit" value="UPDATE" class="but">
        </form>
     
     

<?php
?>
    </div>

    </body>
    </html>