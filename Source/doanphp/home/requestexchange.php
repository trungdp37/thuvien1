<?php
session_start();
include '../database.php';
if (!isset($_SESSION['idstulog'])) {
    echo "<script>window.open('/doanphp/Logincusexchan/index.php','_self')</script>";
}
$idlog = $_SESSION['idstulog'];
$id=$_SESSION['idstulog'];
$name=$_SESSION['namestulog'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        #white-background{
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

        #dlgbox{
            /*initially dialog box is hidden*/
            display: none;
            position: fixed;
            width: 480px;
            z-index: 9999;
            border-radius: 10px;
            background-color: #7c7d7e;
        }

        #dlg-header{
            background-color: #f2f2f2;
            color: black;
            font-size: 20px;
            padding: 10px;
            margin: 10px 10px 0px 10px;
        }

        #dlg-body{
            background-color: white;
            color: black;
            font-family: SVN-Avo;
            font-size: 14px;
            padding: 10px;
            margin: 0px 10px 0px 10px;
        }

        #dlg-footer{
            background-color: #f2f2f2;
            text-align: right;
            padding: 10px;
            margin: 0px 10px 10px 10px;
        }


    </style>
    <title>BOOK EXCHANGE FOR STUDENT</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    <script src="searching.js"></script>
    <style>
        .img-book-req{
            width: 18%;
        }
        .child-req-book{
            display: flex;
            margin:50px;
            border-bottom: 2px solid #fa8072;
            padding-bottom: 24px;

        }
        .child-info-book{
            margin-left:20px;
        }
        input[type="submit"]{
            margin:10px;
        }

        .child-sb{
            margin-left:70px;
        }

        .agree-book{
            width:125px;
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
        $(document).ready(function() {

            $('#example').dataTable({}); // dòng này để nhúng bảng biểu thành dạng bảng được phân trang

        } );
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

                </div>
            </div>
            <!--Request create  book-->
            <h3 style="margin-top:50px;">List request exchange book</h3>
            <div class="req-book" style="border:1px solid #434343; padding:12px 20px; margin-bottom: 10px;">

                <div class="container">
                    <style>
                        #example td,th
                        {
                            text-align: center;
                            vertical-align: middle;
                        }
                    </style>
                    <table id="example" class="table table-striped table-bordered" style="border-collapse: collapse;">
                        <thead>
                        <tr>
                            <th>Student Request</th>
                            <th>Book Request</th>
                            <th>Student Confirm</th>
                            <th>Book Confirm</th>
                            <th>REQUEST_STATUS</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $sql = "SELECT STUDENT_ID_1,STUDENT_ID_2,BOOK_ID_1,BOOK_ID_2,REQUEST_STATUS FROM rqexchange where STUDENT_ID_1=$id OR STUDENT_ID_2=$id";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output dữ liệu trên trang
                            while($row = $result->fetch_assoc()) {
                                echo'<tr>';
                                echo"<td>".$row["STUDENT_ID_1"]."</td>";
                                echo"<td>".$row["BOOK_ID_1"]."</td>";
                                echo"<td>".$row["STUDENT_ID_2"]."</td>";
                                echo"<td>".$row["BOOK_ID_2"]."</td>";

                                if ($row["REQUEST_STATUS"] == 1)
                                {
                                    echo"<td style='background-color:#5cd85c'>Successful</td>";
                                }
                                elseif($row["REQUEST_STATUS"] == 0){
                                    echo"<td style='background-color:orange'>Wait</td>";
                                }
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                        <?php
                        if (isset($_POST['refund'])) {
                            $bookiddel=$_POST[' bookid'];
                            $stuidel=$_POST['stuid'];
                            $sql ="delete from bookofstudent where BOOK_ID=$bookiddel and STUDENT_ID=$stuidel";
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
                            <th>Student Request</th>
                            <th>Book Request</th>
                            <th>Student Confirm</th>
                            <th>Book Confirm</th>
                            <th>REQUEST_STATUS</th>
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
            <li>Copyright © 2020 Company Name </li>
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