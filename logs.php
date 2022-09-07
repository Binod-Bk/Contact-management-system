<?php
session_start();
if(!isset($_SESSION['userid'])){
  header('Location:http://localhost/contact/login.php?msg=You Must Log In First');
}
$id = $_SESSION['userid'];
include('include/nav.php');
include('database/connection.php');
?>

<head>
    <style>
      body{
        background: #0F2027;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #2C5364, #203A43, #0F2027); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

      }
        table{
            margin-top:2%;
            margin-left:30%;
            border: 1px solid black;
            border-radius:10px;
            
        };
        thead{
            /* margin:10px;
            padding:25px; */
            background:black;
            color:red;
            border: 1px solid black;
        }
        th{
            background:rgb(1,11,72); 
            color:white;
            padding-right:15px;
            border: 1px solid black;
            padding:5px;
        }
        td{
            text-align:center;
            border: 1px solid black;
            padding:5px;
            background:  rgb(129,139,200);
            color:black;
        }

        h1{
            text-align:center;
        }

    </style>
</head>


<?php

$sql = "SELECT * from log where userid=$id order by date_created DESC";
$result = $conn->query($sql);
    $rowno = 1; ?>

<h1>Your Logs</h1>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Log Id</th>
      <th scope="col">Log Message</th>
      <th scope="col">Log Recorded On</th>
    </tr>
  </thead>
  
  <tbody>
  <?php   while($row=$result->fetch_assoc()){
?>
    <tr>
      <td><?php echo $rowno; ?></td>
      <td><?php echo $row['logs']; ?></td>
      <td><?php echo $row['date_created']; ?></td>
    </tr>
    <?php

$rowno++;
    }

?>
  </tbody>
</table>

