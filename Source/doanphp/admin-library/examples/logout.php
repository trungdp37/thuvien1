<?php

session_start();
unset($_SESSION['idadmin']);

echo "<script>window.open('/doanphp/Loginad/index.php','_self')</script>";
?>