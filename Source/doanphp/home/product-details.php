<?php
session_start();

include '../database.php';
if (!isset($_SESSION['idstulog'])) {
    echo "<script>window.open('/doanphp/Logincusexchan/index.php','_self')</script>";
}
$idlog = $_SESSION['idstulog'];
$bookid = $_GET['id'];

$student_id_1 = $_SESSION["idstulog"];
$stuid = $_GET['stuid'];
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>BOOK EXCHANGE FOR STUDENT</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css"/>
    </noscript>
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
            <form method="post">
                <!-- <h1>Lorem ipsum dolor sit amet <span class="pull-right"><del>$99.00</del> $79.00</span></h1> -->
                <?php
                $sql = "SELECT BOOK_NAME,BOOK_IMAGE FROM bookofstudent where STUDENT_ID='$stuid'and BOOK_ID='$bookid'";
                $query = $conn->query($sql);
                while ($row = $query->fetch_assoc()) {
                    echo "<h1>" . $row['BOOK_NAME'] . "</h1>";
                    echo "<div class='container-fluid'>";
                    echo " <div class='row'>";

                    echo "<div class='col-md-5'>";

                    echo "<img src=" . $row['BOOK_IMAGE'] . " class='img-fluid' alt=''  width='400' height='480'>";
                }
                ?>
        </div>

        <div class="col-md-7">
            <?php
            $sql = "SELECT STUDENT_ID,STUDENT_NAME,STUDENT_PHONE,STUDENT_ADDRESS,UNIVERSITY FROM student where STUDENT_ID='$stuid'";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output dữ liệu trên trang
                while ($row = $result->fetch_assoc()) {
                    echo "<p>Name: " . $row["STUDENT_NAME"] . "</p>";
                    echo "<p>Univeristy: " . $row["UNIVERSITY"] . "</p>";
                    echo "<p>Phone: " . $row["STUDENT_PHONE"] . "</p>";
                    echo "<div class='row'>";
                    echo "<div class='col-sm-4'>";
                    echo "<label class='control-label'>Your Book</label>";
                    echo "<div class='form-group'>";
                    echo " <select name='book_id_2'>";
                    $sql1 = " select BOOK_ID,BOOK_NAME from bookofstudent where STUDENT_ID='$student_id_1'";
                    $query = $conn->query($sql1);
                    while ($row = $query->fetch_assoc()) {
                        echo "<option value=" . $row['BOOK_ID'] . ">" . $row["BOOK_NAME"] . "</option>";
                    }
                }
            } else {
                echo "0 results";
            }
            ?>
            </select>
        </div>
    </div>

    <div class="col-sm-8">
        <label class="control-label">Content</label>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" name="content" id="name">
                </div>
            </div>

            <div class="col-sm-6">
                <input type="submit" class="primary" name="request" value="Request">
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
</form>

<?php
header('Content-Type: text/html; charset=UTF-8');
if (isset($_POST['request'])) {
    $student_id_2 = $stuid;
    $book_id_2 = $bookid;
    $book_id_1 = $_POST['book_id_2'];
    $_SESSION['stu1'] = $student_id_1;
    $_SESSION['stu2'] = $student_id_2;
    $_SESSION['b1'] = $book_id_1;
    $_SESSION['b2'] = $book_id_2;

    $sql1="Select STUDENT_NAME,STUDENT_EMAIL from student where STUDENT_ID=$student_id_1";
    $result1=$conn->query($sql1);
    $row1=$result1->fetch_assoc();
    $name1=$row1["STUDENT_NAME"];

    $sql2="Select STUDENT_NAME,STUDENT_EMAIL from student where STUDENT_ID=$student_id_2";
    $result2=$conn->query($sql2);
    $row2=$result2->fetch_assoc();
    $email=$row2["STUDENT_EMAIL"];
    $nd=$_POST['content'];
    $tieude="Yêu Cầu Đổi Sách";
    $noidung=$name1." đã yêu câu đổi sách với với bạn. ".$nd." Thanks!";
    include "includes/sendmail.php";
    $sql = "insert into rqexchange (STUDENT_ID_1,STUDENT_ID_2,BOOK_ID_1,BOOK_ID_2,REQUEST_STATUS) VALUES ($student_id_1,$student_id_2,$book_id_1,$book_id_2,0) ";
    if ($conn->query($sql) === TRUE) {
        echo "<script>window.open('/doanphp/home/requestexchange.php','_self')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<br>
<br>

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