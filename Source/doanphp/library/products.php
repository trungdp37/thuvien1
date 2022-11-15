<?php
session_start();
include '../database.php';
if (!isset($_SESSION['idstulog'])) {
    echo "<script>window.open('/doanphp/Logincus/index.php','_self')</script>";
}
$idlog = $_SESSION['idstulog'];

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>BOOK EXCHANGE FOR STUDENT</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css"/>
    </noscript>
    <script src="searching.js"></script>
</head>
<body class="is-preload">
<!-- Wrapper -->
<div id="wrapper">
    <!-- Header -->
    <header id="header">
        <div class="inner">

            <!-- Logo -->
            <a href="index.php" class="logo">
                <span class="fa fa-book"></span> <span class="title">Book Exchange Website</span>
            </a>
            <!-- Nav -->
            <?php
            include "cartmenu.php"
            ?>

        </div>
    </header>
    <!-- Menu -->
    <?php
    include "menu.php"
    ?>
    <!-- Main -->
    <div id="main">
        <div class="inner">
            <h1>Products</h1>

            <div class="image main">
                <img src="images/banner-image-6-1920x500.jpg" class="img-fluid" alt=""/>
            </div>
            <!---Find some thing-->
            <div class="search-book-on-page">
                <h3>Find some thing ... </h3>
                <input id="search-book-ip" type="text" autocomplete="off" placeholder=" Find something  . . . . . . . ."
                       style="border-radius:6px; width: 360px; height: 36px; border:1px solid #434343; margin-bottom:80px;">
            </div>
            <!-- Products -->
            <section id="tiles-id" class="tiles" style="border-collapse: collapse;">
                <?php
                $sql = "SELECT BOOK_ID,BOOK_NAME,BOOK_TYPE,BOOK_IMAGE,STUDENT_ID FROM bookofstudent where STUDENT_ID <> $idlog and BOOK_REQUEST_CREATE =1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output dữ liệu trên trang
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["BOOK_ID"];
                        echo "<article class='style1 style'>";
                        echo "<span class='image'>";
                        echo "<img src=" . $row["BOOK_IMAGE"] . " alt=''/> </span>";
                        echo "<a href='addcartproduct.php?id=".$row["BOOK_ID"]."&namebook=".$row["BOOK_NAME"]."&type=".$row["BOOK_TYPE"]."&img=".$row["BOOK_IMAGE"]."'>";
                        echo "<h2 class='product-bk'>Add to cart</h2>";
                        echo "</a></article>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </section>
        </div>
    </div>
    <!-- Footer -->
    <footer id="footer">
        <div class="inner">
            <section>
                <ul class="icons">
                    <li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
                </ul>&nbsp;
            </section>

            <ul class="copyright">
                <li>Copyright © 2020 Company Name</li>
                <li>Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></li>
            </ul>
        </div>
    </footer>

</div>
<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>