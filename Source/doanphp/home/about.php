<?php
session_start();
include '../database.php';
if (!isset($_SESSION['idstulog'])) {
    echo "<script>window.open('/doanphp/Logincusexchan/index.php','_self')</script>";
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
    include "includes/menu.php"
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
                    $sql = "SELECT STUDENT_ID,STUDENT_NAME,STUDENT_PHONE,STUDENT_ADDRESS,UNIVERSITY FROM student where STUDENT_ID='$id'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<p>Name: " . $row["STUDENT_NAME"] . "</p>";
                            echo "<p>Univeristy: " . $row["UNIVERSITY"] . "</p>";
                            echo "<p>Phone: " . $row["STUDENT_PHONE"] . "</p>";
                        }
                    }
                    ?>

                    <div id="white-background">
                    </div>
                    <form method="post">
                      <div id="dlgbox">
                            <div id="dlg-header">ADD NEW BOOK</div>
                            <div id="dlg-body">
                                <input placeholder="BOOK NAME :" name="BOOK_NAME" type="text" required="">
                                <input placeholder="BOOK TYPE :" name="BOOK_TYPE" type="text" required="">
                                <input placeholder="DESCRIPTION :" name="DESCRIPTION" type="text" required="">
                                <input class="form-control" type="file" name="BOOK_IMG">
                            </div>
                            <div id="dlg-footer">
                                <button name="create" class="agree-book">CREATE</button>
                                <button class="agree-book" onclick="javascript:location.href='about.php'">Close</button>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['create'])) {
                        $BOOK_NAME = $_POST['BOOK_NAME'];
                        $BOOK_TYPE = $_POST['BOOK_TYPE'];
                        $DESCRIPTION = $_POST['DESCRIPTION'];
                        $BOOK_IMAGE = "images/" . $_POST['BOOK_IMG'];
                        $sql = "insert into bookofstudent (STUDENT_ID,BOOK_NAME,BOOK_TYPE,BOOK_STATUS,BOOK_IMAGE,DESCRIPTION,BOOK_REQUEST_CREATE) VALUES ($id,'$BOOK_NAME','$BOOK_TYPE',1,'$BOOK_IMAGE','$DESCRIPTION',0) ";
                        if ($conn->query($sql) === TRUE) {
                            echo "<script>alert(' Successfully create')</script>";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                    ?>


                    <!-- rest of the page -->

                    <button class="agree" onclick="showDialog()">ADD BOOK</button>

                    <!-- script of dialog -->
                    <script>

                        function showDialog() {
                            var whitebg = document.getElementById("white-background");
                            var dlg = document.getElementById("dlgbox");
                            whitebg.style.display = "block";
                            dlg.style.display = "block";

                            var winWidth = window.innerWidth;
                            var winHeight = window.innerHeight;

                            dlg.style.left = (winWidth / 2) - 480 / 2 + "px";
                            dlg.style.top = "150px";
                        }
                    </script>
                </div>

                <!--Request change student book-->
                <h3 style="margin-top:50px;">New request exchange book</h3>
                <div class="req-book" style="border:1px solid #434343; padding:12px 20px; margin-bottom: 10px;">
                    <?php
                    $sql = "SELECT STUDENT_ID_1,BOOK_ID_1,BOOK_ID_2 FROM rqexchange where REQUEST_STATUS=0 and STUDENT_ID_2='$id'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $book1 = $row['BOOK_ID_1'];
                            $book2 = $row['BOOK_ID_2'];
                            $idstu1 = $row['STUDENT_ID_1'];
                        };
                        $sql1 = "SELECT BOOK_NAME,BOOK_IMAGE,BOOK_TYPE,STUDENT_NAME FROM bookofstudent b join student s on b.STUDENT_ID=s.STUDENT_ID where BOOK_ID=$book1 and b.STUDENT_ID=$idstu1 ";
                        $result1 = $conn->query($sql1);
                        while ($row1 = $result1->fetch_assoc()) {
                            echo "<div class='child-req-book'>";
                            echo "<img src=" . $row1["BOOK_IMAGE"] . " class='img-book-req'/> ";
                            echo "<div class='child-info-book'>";
                            echo "<h3>" . $row1['BOOK_NAME'] . "</h3>";
                            echo "<p>From:" . $row1['STUDENT_NAME'] . " </p> </div>";
                        };
                        $sql2 = "SELECT BOOK_NAME,BOOK_IMAGE,BOOK_TYPE FROM bookofstudent where BOOK_ID=$book2 ";
                        $result2 = $conn->query($sql2);
                        while ($row2 = $result2->fetch_assoc()) {
                            echo "<img src=" . $row2["BOOK_IMAGE"] . " class='img-book-req'/> ";
                            echo "<div class='child-info-book'>";
                            echo "<h3>" . $row2['BOOK_NAME'] . "</h3>";
                            echo "<p>From: " . $name . "/me</p>";
                        };
                        echo "<div class='action-book'>";
                        echo "<div class='cancel-book-rq child-sb'>";
                        echo "<form method='post'>";
                        echo "<input type='submit' value='Agree' name='Agree' class='agree-book'></div>";

                        echo "<div class='agree-book-rq child-sb'>";
                        echo " <input type='submit' value='Cancel' name='cancel' id='cancel-book'> </form> </div> </div> </div> </div>";
                    } else {
                        echo "0 results";
                    }

                    ?>
                </div>
                <?php

                if (isset($_POST['Agree'])) {
                    $student_id_1 = $idstu1;
                    $student_id_2 = $id;
                    $book_id_1 = $book1;
                    $book_id_2 = $book2;
                    $date = date("Y/m/d");

                    $sql1 = "Select STUDENT_NAME,STUDENT_EMAIL from student where STUDENT_ID=$student_id_1";
                    $result1 = $conn->query($sql1);
                    $row1 = $result1->fetch_assoc();
                    $name1 = $row1["STUDENT_NAME"];
                    $email = $row1["STUDENT_EMAIL"];

                    $sql2 = "Select STUDENT_NAME,STUDENT_EMAIL from student where STUDENT_ID=$student_id_2";
                    $result2 = $conn->query($sql2);
                    $row2 = $result2->fetch_assoc();
                    $email2 = $row2["STUDENT_EMAIL"];
                    $name2 = $row2["STUDENT_NAME"];

                    $tieude = "Yêu Cầu Đổi Sách";
                    $noidung = $name2 . " đã đồng ý đổi sách với với bạn.Email contact: " . $email2 . " Thanks!";

                    $sql1 = "update rqexchange set REQUEST_STATUS=1 where STUDENT_ID_1=$student_id_1 and STUDENT_ID_2 =$student_id_2 and BOOK_ID_1=$book_id_1 and BOOK_ID_2=$book_id_2 ";
                    $conn->query($sql1);
                    $sql = "insert into infoexchange (BOOK_ID_1,BOOK_ID_2,STUDENT_ID_1,STUDENT_ID_2,DATE_EXCHANGE) VALUES ($book_id_1,$book_id_2,$student_id_1,$student_id_2,'$date') ";
                    if ($conn->query($sql) === TRUE) {
                        include "includes/sendmail.php";
                        echo "<script>window.open('../home/about.php','_self')</script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                if (isset($_POST['cancel'])) {
                    $student_id_1 = $idstu1;
                    $student_id_2 = $id;
                    $book_id_1 = $book1;
                    $book_id_2 = $book2;
                    $sql = "delete from rqexchange  where STUDENT_ID_1=$student_id_1 and STUDENT_ID_2 =$student_id_2 and BOOK_ID_1=$book_id_1 and BOOK_ID_2=$book_id_2 ";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('Successfully')</script>";
                        echo "<script>window.open('../home/about.php','_self')</script>";

                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                ?>
                <!-- Products -->

                <h3>My Books</h3>
                <div class="search-book-on-page">
                    <input id="search-book-ip" type="text" autocomplete="off"
                           placeholder=" Find something  . . . . . . . ."
                           style="border-radius:6px; width: 360px; height: 36px; border:1px solid #434343; margin-bottom:80px;">
                </div>
                <section id="tiles-id" class="tiles" style="border-collapse: collapse;">
                    <?php
                    $sql = "SELECT BOOK_ID,BOOK_NAME,DESCRIPTION,BOOK_IMAGE,STUDENT_ID FROM bookofstudent where STUDENT_ID='$id' and BOOK_REQUEST_CREATE =1 AND BOOK_STATUS=1";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output dữ liệu trên trang
                        while ($row = $result->fetch_assoc()) {
                            $id = $row["BOOK_ID"];
                            echo "<article class='style1 style'>";
                            echo "<span class='image'>";
                            echo "<img src=" . $row["BOOK_IMAGE"] . " alt=''/> </span>";
                            echo "<a href='product-edit.php?id=" . $row["BOOK_ID"] . "&stuid=" . $row["STUDENT_ID"] . "'>";
                            echo "<h2 class='product-bk'>" . $row["BOOK_NAME"] . "</h2>";
                            echo "<p>" . $row["DESCRIPTION"] . "</p></a></article>";
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
                    </ul>

                    &nbsp;
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