<?php

$con = mysqli_connect("localhost", "root", "", "coffeedb");

if(!$con)
{
    require "sign up.html";
    exit();
}

$uname= $_POST["username"];
$mail= $_POST["E-mail"];
$pass= $_POST["password"];
$contact= $_POST["Contactnumber"];


if($uname=="" || $pass=="" || $contact==""|| $mail=="")
{
    echo '<script> alert("Empty Feild") </script>';
    require "sign up.html";
}

else if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
{
    echo '<script> alert("Invaild email") </script>';
    require "sign up.html";
}
else{
   
    $sql="select * from login1 where username= '$uname'";
    $res=mysqli_query($con,$sql) ;
    
     if(mysqli_num_rows($res)>=1)
    {
        echo'<script>  alert("username taken")  </script>';
        require "sign up.html";
    }
    else
    {
        require "login.html"; 
        mysqli_query($con,"insert into login1 (username , password ) values ('$uname', '$pass')");
    }
}
mysqli_close($con);

?>