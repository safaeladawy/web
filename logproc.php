<?php

$con = mysqli_connect("localhost", "root", "", "coffeedb");

if(!$con)
{
    require "login.html";
    exit();
}
$uname=$_POST["username"];
$pass= $_POST["password"];

$query="select * from login1 where username = '$uname' and password = '$pass'";
$res=mysqli_query($con, $query);
if(mysqli_num_rows($res)>=1)
{
    require 'index.html';
    //echo '<script> alert("you are a validated user. logged in successfully") </script>';
}
else
{
    //echo '<script> alert("Invalid username/password") </script>';
    require "login.html";
    echo'<script> document.getElementById("message").innerhtml = "invaild password of username" </script>';


}
mysqli_close($con);

?>