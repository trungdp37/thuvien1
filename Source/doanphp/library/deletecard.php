<?php
session_start();
$removeid=$_GET["id"];
if(isset($_SESSION['arrcart']))
{
    unset($_SESSION['arrcart'][$removeid]);
}
if(isset($_SESSION['cart']))
{
    unset($_SESSION['cart'][$removeid]);
}
header('location:cart.php');
?>