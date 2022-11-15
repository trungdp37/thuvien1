<?php

session_start();
unset($_SESSION['idstulog']);
echo "<script>sessionStorage.clear();window.open('/doanphp/Logincusexchan/index.php','_self')</script>";
?>