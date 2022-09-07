<!-- 
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="../home.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="../mycontact.php">Contact</a>
      <a class="nav-item nav-link" href="../profile.php">Profile</a>
      <a class="nav-item nav-link disabled" href="../logs.php">Logs</a>
      <a class="nav-item nav-link disabled" href="../logout.php">Logs</a>
    </div>
  </div>
</nav> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
    margin: 0;
    padding: 0;
}
header{
    background-image: linear-gradient(to right, #2c3e50, #4ca1af);
    color:white;
    padding: 0px 22px;
    display:flex;
    justify-content:space-between;
    height:50px;
    
}
.myli{
    margin:2px;
    padding:5px;
    
    
}

header img{
    width:99px;
    height:60px;
    
    
}
 .menu{
    display:inline-block;
    padding: 12px 0px;
    
}
ul{
    margin-top:-12px;
}
 ul li{
    display: inline-block;
    list-style: none;
    padding:7px 15px;
    margin-top:10px;
    border: 1px solid black;
    border-radius:7px;
}
 ul li a{
    text-decoration: none;
    color:white;
}

 ul li:hover{
    background:black;
}

    .dropdown{
        top:6px;
    }
 ul li:hover .dropdown {
    display:block;
    position:relative;
    margin-top:5px;
    z-index: 1;
    background:black;
}

ul li:hover .dropdown ul {
    display:block;
    position:absolute;
    margin:1px;
    border-radius:8px;
    /* z-index: 0.5; */
    background-image: linear-gradient(to right, #2c3e50, #4ca1af);
}

.dropdown ul{
    display:none;
}
.dropdown ul li{
    border:none;
    display:block;
}

li  #proimg{
display:inline-block;
width:35px;
height: 25px;
border-radius:5px;
margin:0px;
padding:0px;
}
#zin{
z-index: -2;
}
h3{
    margin-top:12px;
}
    </style>
</head>
<body>
    <header>
        
            
               <h3>Contact Management System</h3>
                
                <div class="menu">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li> <a class="nav-item nav-link" href="mycontact.php">Contacts</a></li>
                <li>  <a class="nav-item nav-link" href="profile.php">Profile</a></li>
                <li>  <a class="nav-item nav-link disabled" href="logs.php">Logs</a></li>
                
               <?php 
            
        if( isset($_SESSION["userid"]) ){
            $id=$_SESSION['userid'];
            include('./database/connection.php');
            $sql ="SELECT * FROM user where id=$id";
            $result = $conn ->query($sql);
            if($result->num_rows==1){
                $row=$result->fetch_assoc();
                ?>
          <li class="myli">Welcome <?php echo $row['first_name']." ".$row['last_name']; ?> 
          <div class="dropdown">
                    <ul>
                    <li>  <a class="nav-item nav-link disabled" href="logout.php">Logout</a></li>
                    </ul>  
                    </div></li> 
              
                <?php
            }
            }else{ ?>
           <li>  <a href="login.php">Log In</a></li>
            <?php
            } ?>
            
                <!-- <li>
                    <img src="../Images/user.png" alt="">
                </li> -->
            </ul>
            </div>
    </header>