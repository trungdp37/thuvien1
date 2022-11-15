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

<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="assets/css/main.css"/>
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

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>

    <script>
        $(document).ready(function () {

            $('#example').dataTable({}); // dòng này để nhúng bảng biểu thành dạng bảng được phân trang

        });
    </script>


</head>
<body>
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
                    $sql = "SELECT STUDENT_ID,STUDENT_NAME,STUDENT_PHONE,STUDENT_ADDRESS,UNIVERSITY FROM student where STUDENT_ID=$id";
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
                                <button class="agree-book" onclick="javascript:location.href='requestcreate.php'">
                                    Close
                                </button>
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
            </div>
            <!--Request create  book-->
            <h3 style="margin-top:50px;">list request add book</h3>
            <div class="req-book" style="border:1px solid #434343; padding:12px 20px; margin-bottom: 10px;">
                <style>
                    #example td,th
                    {
                        text-align: center;
                        vertical-align: middle;
                    }
                </style>
                <div class="container">
                    <table id="example" class="table table-striped table-bordered" style="border-collapse: collapse;">
                        <thead>
                        <tr>
                            <th>NAME</th>
                            <th>TYPE</th>
                            <th>IMAGE</th>
                            <th>DESCRIPTION</th>
                            <th>STATUS CREATE</th>
                            <th colspan="2">FUNCTION</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $sql = "SELECT BOOK_ID,BOOK_TYPE,BOOK_NAME,DESCRIPTION,BOOK_IMAGE,BOOK_REQUEST_CREATE FROM bookofstudent where STUDENT_ID='$id'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output dữ liệu trên trang
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo "<td>" . $row["BOOK_NAME"] . "</td>";
                                echo "<td>" . $row["BOOK_TYPE"] . "</td>";
                                echo "<td><img src='" . $row["BOOK_IMAGE"] . "'  style='width:100px;height:120px;' class='ImageCell' /></td>";
                                echo "<td>" . $row["DESCRIPTION"] . "</td>";

                                if ($row["BOOK_REQUEST_CREATE"] == 1) {
                                    echo "<td style='background-color:#5cd85c'>Successful</td>";
                                } elseif ($row["BOOK_REQUEST_CREATE"] == 0) {
                                    echo "<td style='background-color:orange'>Wait</td>";
                                }
                                echo "<td> <form action='product-edit.php?id=" . $row["BOOK_ID"] . "&stuid=" . $id . "'method='post'>
                                            <input type='text' name='bookid' hidden  value='" . $row["BOOK_ID"] . "'/>
                                            <input type='text' name='stuid' hidden value='" . $id . "'/>
                                            <input type='submit' name='edit' value='edit'/>
                                       </form> </td>";
                                echo "<td> <form action='#'method='post'>
                                            <input type='text' name='bookid'hidden value='" . $row["BOOK_ID"] . "'/>
                                            <input type='text' name='stuid'hidden value='" . $id . "'/>
                                            <input type='submit' name='delete' value='delete' />
                                       </form> </td>";
                                echo '</tr>';

                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                        <?php
                        if (isset($_POST['delete'])) {
                            $bookiddel = $_POST['bookid'];
                            $stuidel = $_POST['stuid'];
                            $sql = "delete from bookofstudent where BOOK_ID=$bookiddel and STUDENT_ID=$stuidel";
                            if ($conn->query($sql) === TRUE) {
                                echo "<script>alert(' Successfully delete')</script>";
                                echo "<script>window.open('../home/requestcreate.php','_self')</script>";

                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                        ?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>NAME</th>
                            <th>TYPE</th>
                            <th>IMAGE</th>
                            <th>DESCRIPTION</th>
                            <th>STATUS CREATE</th>
                            <th colspan="2">FUNCTION</th>

                        </tr>
                        </tfoot>
                    </table>
                </div>


            </div>
        </div>
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
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>