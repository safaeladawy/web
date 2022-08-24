<?php


$con = mysqli_connect("localhost", "root", "", "coffeedb");

if(!$con)
{
    require "login.html";
    exit();
}

$searchedItem = $_POST["Search"];

$query = "select * from ourproducts where PName = '$searchedItem'";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0)
{
    if($searchedItem == "Latte")    require "latte.html";

    elseif($searchedItem == "Black Coffee") require "blackCoffee.html";

    elseif($searchedItem == "Americano")    require "Americano.html";

    elseif($searchedItem == "Cappuccino")   require "Cappuccino.html";

    elseif($searchedItem == "Mocha")    require "Mocha.html";

    elseif($searchedItem == "Macchiato")    require "Macchiato.html";
}
else
    require "index.html";

?>