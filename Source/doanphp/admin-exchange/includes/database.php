<?php

$conn = mysqli_connect("localhost", "root", "", "libraryofstudent");
if (!$conn) {
    die("không nết nối được vào MySQL server");
    exit();
}