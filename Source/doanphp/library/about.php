<?php
session_start();
include '../database.php';
if (!isset($_SESSION['idstulog'])) {
    echo "<script>window.open('/doanphp/Logincus/index.php','_self')</script>";
}
$idlog = $_SESSION['idstulog'];
$id = $_SESSION['idstulog'];
$name = $_SESSION['namestulog'];
?>

<!DOCTYPE HTML>
<html>
<head>
    <style>
        #white-background {
            display: none;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0px;
            left: 0px;
            background-color: #fefefe;
            opacity: 0.7;
            z-index: 9999;
        }

        #dlgbox {
            /*initially dialog box is hidden*/
            display: none;
            position: fixed;
            width: 480px;
            z-index: 9999;
            border-radius: 10px;
            background-color: #7c7d7e;
        }

        #dlg-header {
            background-color: #f2f2f2;
            color: black;
            font-size: 20px;
            padding: 10px;
            margin: 10px 10px 0px 10px;
        }

        #dlg-body {
            background-color: white;
            color: black;
            font-family: SVN-Avo;
            font-size: 14px;
            padding: 10px;
            margin: 0px 10px 0px 10px;
        }

        #dlg-footer {
            background-color: #f2f2f2;
            text-align: right;
            padding: 10px;
            margin: 0px 10px 10px 10px;
        }


    </style>
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
    <style>
        .img-book-req {
            width: 18%;
        }

        .child-req-book {
            display: flex;
            margin: 50px;
            border-bottom: 2px solid #fa8072;
            padding-bottom: 24px;

        }

        .child-info-book {
            margin-left: 20px;
        }

        input[type="submit"] {
            margin: 10px;
        }

        .child-sb {
            margin-left: 70px;
        }

        .agree-book {
            width: 125px;
        }
    </style>
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
            <nav>
                <ul>
                    <li><a href="#menu">Menu</a></li>
                </ul>
            </nav>

        </div>
    </header>

    <!-- Menu -->
    <?php
    include "menu.php"
    ?>
    <!-- Main -->
    <div id="main">
        <div class="inner">

            <div class="student-details">

                <h1>About your infomation</h1>
                <div class="image main">
                    <img src="images/banner-image-6-1920x500.jpg" class="img-fluid" alt="">
                </div>
                <div class="section-info" style="border:1px solid #434343; padding:12px 20px; margin-bottom: 10px;">
                    <?php
                    $sql = "SELECT STUDENT_ID,STUDENT_NAME,STUDENT_PHONE,STUDENT_EMAIL,STUDENT_ADDRESS,UNIVERSITY FROM student where STUDENT_ID='$id'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<p>Name: " . $row["STUDENT_NAME"] . "</p>";
                            echo "<p>Univeristy: " . $row["UNIVERSITY"] . "</p>";
                            echo "<p>Phone: " . $row["STUDENT_PHONE"] . "</p>";
                            echo "<p>Email:".$row["STUDENT_EMAIL"]."</p>";
                        }
                    }
                    ?>

                    <div id="white-background">
                    </div>


                </div>

            </div>
        </div>

        <!-- Footer -->
        <footer id="footer">
            <div class="inner">
                <section>
                    <h2>Contact Us</h2>
                    <form method="post" action="#">
                        <div class="fields">
                            <div class="field half">
                                <input type="text" name="name" id="name" placeholder="Name"/>
                            </div>

                            <div class="field half">
                                <input type="text" name="email" id="email" placeholder="Email"/>
                            </div>

                            <div class="field">
                                <input type="text" name="subject" id="subject" placeholder="Subject"/>
                            </div>

                            <div class="field text-right">
                                <label>&nbsp;</label>

                                <ul class="actions">
                                    <li><input type="submit" value="Send Message" class="primary"/></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
                <section>
                    <h2>ReView</h2>
                    <style>
                        .rating {
                            unicode-bidi: bidi-override;
                            direction: rtl;
                        }
                        .rating > span {
                            display: inline-block;
                            position: relative;
                            width: 1.1em;
                        }
                        .rating > span:hover:before,
                        .rating > span:hover ~ span:before {
                            content: "\2605";
                            position: absolute;
                        }
                    </style>
                    <ul>
                        <div class="rating">
                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                        </div
                        <div class="fields">
                            <div class="field half">
                                <input type="text" name="email" id="email" placeholder="Email"/>
                            </div>

                            <div class="field">
                                <input type="text" name="subject" id="subject" placeholder="Content"/>
                            </div>

                            <div class="field text-right">
                                <label>&nbsp;</label>

                                <ul class="actions">
                                    <li><input type="submit" value="Submit" class="primary"/></li>
                                </ul>
                            </div>
                        </div>
                    </ul>
                    <h2>Contact Info</h2>
                    <ul class="alt">
                        <li><span class="fa fa-envelope-o"></span> <a href="#">TeamABCXYZ@gmail.com</a></li>
                        <li><span class="fa fa-phone"></span> 0932114205</li>
                        <li><span class="fa fa-map-pin"></span>KTX Khu A</li>
                    </ul>
                </section>
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