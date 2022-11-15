<?php
session_start();
$id = $_GET['id'];
$name = $_GET['namebook'];
$type = $_GET['type'];
$img = $_GET['img'];
if (isset($_SESSION['cart'][$id])) {
    $qty = $_SESSION['cart'][$id] + 1;
} else {
    $qty = 1;
}
if (!isset($_SESSION['arrcart'][$id])) {

    $_SESSION['arrcart'][$id] = array(
        'id' => $id,
        'name' => $name,
        'type' => $type,
        'img' => $img
    );
}
$_SESSION['cart'][$id] = $qty;
header('location:products.php');
?>