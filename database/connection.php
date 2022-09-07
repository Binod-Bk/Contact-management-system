<?php

$host = "localhost";
$user ="root";
$password = "8080";
$db = "contact";

$conn = new mysqli($host,$user,$password,$db);

if ($conn -> connect_error){
    echo "$conn->connect_error";
}


?>