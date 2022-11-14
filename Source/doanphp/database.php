<?php

$conn = mysqli_connect("sql204.epizy.com", "epiz_32989419", "13eY3BdjCXxqXyz", "epiz_32989419_demo");
if (!$conn) {
    die("không nết nối được vào MySQL server");
    exit();
}