<?php
  session_start();
  if(!isset($_SESSION['userid'])){
    header('Location:http://localhost/contact/login.php?msg=You Must Log In First');
  }
  $sid = $_SESSION['userid'];
  include('include/nav.php');
?>

<head>
    <style>
        /* Add a black background color to the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #A9A9A9;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  background:#808080;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the "active" element to highlight the current page */
.topnav a.active {
  background-color: #2196F3;
  color: white;
}

/* Style the search box inside the navigation bar */
.topnav input{
  float: right;
  padding: 6px;
  border: none;
  margin-top: 8px;
  margin-right: 16px;
  font-size: 17px;
}

/* When the screen is less than 600px wide, stack the links and the search field vertically instead of horizontally */
@media screen and (max-width: 600px) {
  .topnav a, .topnav input[type=text] {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;
  }
  .but{
    padding:6px;
    border-radius:5px;
    background:green;
    color:white;
  }
}
    </style>
</head>
<?php
$request = $_SERVER['REQUEST_URI'];

$router = str_replace('/contact/mycontact.php/','',$request);

switch($router){
  case "search": 
  
    $search =  $_POST['search'];?>
    <head>
   
   <style>
     body{
        background: #0F2027;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #2C5364, #203A43, #0F2027); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

                }
                .table{
                  margin-left:2%;
                  width: 95%;
                  border-radius: 10px;
                  border-bottom: 2px solid white;
                  border-left: 2px solid white;
                  border-right: 2px solid white;
                }
                td{
                  text-align:center;
                  color:white;
                }
                .col{
                  border: 2px solid white;
                }
                h2{
                  text-align:center;
                  margin-top:10px;
                }


                
              </style>
            </head>
            <div class="topnav">
            <a href="http://localhost/contact/mycontact.php/add_contact">Add Contacts</a>
            <form action="http://localhost/contact/mycontact.php/search" method="post">
            <input type="submit" value="Search">
            <input type="text" name="search" placeholder="Search by Name..">
            </form>
            </div> 
            <h2>My Contatcs</h2>

            <?php include('database/connection.php');

            $query3 = "SELECT * FROM contact where first_name='$search' AND userid=$sid";
            $result3 = $conn->query($query3);
            $rowno =1;
            ?>

                        <table class="table table-striped table-dark">
                          <thead>
                            <tr>
                              <th class="col">#</th>
                              <th class="col">Name</th>
                              <th class="col">Email</th>
                              <th class="col">Contact</th>
                              <th class="col">Address</th>
                              <th class="col">Gender</th>
                              <th class="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              while($row3 = $result3->fetch_assoc()){ ?>
                            <tr>
                              <th scope="row"><?php echo $rowno ?></th>
                              <td><?php echo  $row3['first_name']." ".$row['last_name']; ?></td>
                              <td><?php echo  $row3['email']; ?></td>
                              <td><?php echo $row3['contact']; ?></td>
                              <td><?php echo $row3['address']; ?></td>
                              <td><?php echo $row3['gender']; ?></td>
                              <td>
                                <a href="editcontact.php?cid=<?php echo $row['id'];?>"> <button><img src="edit.png" alt=""></button></a>
                                <a href="process/delete.php?cid=<?php echo $row['id'];?>"> <button><img src="delete.png" alt=""></button></a>
                            </td>
                            </tr>
                            <?php 
                            $rowno++;
                            } ?>
                          </tbody>
                        </table>    
 
                <?php
        break;
  case "add_contact":
    ?>
   

   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/signup.css">
    <style>
        h2{
            color:white;
        }
    </style>
</head>
<body>

        <form action="../process/addcontactprocess.php" method="POST">

            <h2>Add New Contact</h2> <br>
            <label for="name">Name</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="firstname" required="required" placeholder="First">
            <input type="text" name="lastname" required="required" placeholder="Last">
            <br><br>
            <label for="email">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="email" name="email" placeholder="Enter Your Email">
            <br><br>
            <label for="">Contact</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="integer" name="contact" placeholder="Enter Your Contact" maxlength="10" required="required">
            <br><br>
            <label for="Address">Address</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="address" placeholder="Enter Your Address" required="required">
            <br><br>
            <label for="Address">Gender</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="gender" value="male">Male 
            <input type="radio" name="gender" value="female">Female 
            <br><br>
            <label for="image">Identity Card</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="file" name="idfile" accept=".doc,.pdf,.docx">
            <br><br>&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="but">
            Submit</button> &nbsp;&nbsp;
            <button type="reset" class="but">
                Reset</button>


        </form>
    
    
  </body>
  </html>

    <?php
    break;

  default:
  ?>

  <head>
   
    <style>
      body{
        background: #0F2027;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #2C5364, #203A43, #0F2027); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

      }
      .table{
        margin-left:2%;
        width: 95%;
        border-radius: 10px;
        border-bottom: 2px solid white;
        border-left: 2px solid white;
        border-right: 2px solid white;
      }
      td{
        text-align:center;
        color:white;
      }
      .col{
        border: 2px solid white;
      }
      h2{
        text-align:center;
        margin-top:10px;
      }


     
    </style>
  </head>
  <div class="topnav">
  <a href="http://localhost/contact/mycontact.php/add_contact">Add Contacts</a>
  <form action="http://localhost/contact/mycontact.php/search" method="post">
  <input type="submit" value="Search">
  <input type="text" name="search" placeholder="Search by Name..">
  </form>
  </div> 
  <h2>My Contatcs</h2>

  <?php include('database/connection.php');

  $query = "SELECT * FROM contact where userid=$sid order by first_name ASC";
  $result = $conn->query($query);
  $rowno =1;
?>

              <table class="table table-striped table-dark">
                <thead>
                  <tr>
                    <th class="col">#</th>
                    <th class="col">Name</th>
                    <th class="col">Email</th>
                    <th class="col">Contact</th>
                    <th class="col">Address</th>
                    <th class="col">Gender</th>
                    <th class="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                   while($row = $result->fetch_assoc()){ ?>
                  <tr>
                    <th scope="row"><?php echo $rowno ?></th>
                    <td><?php echo  $row['first_name']." ".$row['last_name']; ?></td>
                    <td><?php echo  $row['email']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td>
                     <a href="editcontact.php?cid=<?php echo $row['id'];?>"> <button><img src="edit.png" alt=""></button></a>
                     <a href="process/delete.php?cid=<?php echo $row['id'];?>"> <button><img src="delete.png" alt=""></button></a>
                  </td>
                  </tr>
                  <?php 
                  $rowno++;
                 } ?>
                </tbody>
              </table>    


<?php
}

?>

