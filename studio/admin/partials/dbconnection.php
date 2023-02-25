<?php
$servername="localhost";
$username="root";
$password="";
$database="foodyfeb";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die ("Connecation faild".mysqli_connect_error());
}

?>