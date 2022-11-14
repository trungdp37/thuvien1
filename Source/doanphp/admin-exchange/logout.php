<?php

session_start();
session_destroy();

echo "<script>window.open('/doanphp/Loginad/index.php','_self')</script>";
?>