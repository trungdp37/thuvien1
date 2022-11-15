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
            $sql = "SELECT BOOK_ID,BOOK_NAME,BOOK_TYPE,DESCRIPTION,BOOK_IMAGE,STUDENT_ID FROM bookofstudent where STUDENT_ID='$stuid'and BOOK_ID='$bookid'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output dữ liệu trên trang
                while ($row = $result->fetch_assoc()) {
                    echo "Name <input type='text' name='name' value='" . $row["BOOK_NAME"] . "'> <br>";
                    echo "Type <input type='text' name='type' value='" . $row["BOOK_TYPE"] . "'>  <br>";
                    echo "Description <input type='text' name='des' value='" . $row["DESCRIPTION"] . "'>  <br>";
                    echo "<input type='file' name='img' value='" . $row["BOOK_IMAGE"] . "'> <br><br>";
                    $img = $row["BOOK_IMAGE"];
                }
            }
            ?>
            <div class="col-sm-6">
                <input type="submit" class="primary" name="up" value="Upload">
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
if (isset($_POST['up'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $des = $_POST['des'];
    $img1 = $_POST['img'];
    if ($img1 == '') {
        echo $img1 = $img;
    }
    $sql = "update bookofstudent set BOOK_NAME='$name',BOOK_TYPE='$type',DESCRIPTION='$des',BOOK_IMAGE='$img1' where BOOK_ID=$bookid and STUDENT_ID=$stuid";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert(' Successfully Edit')</script>";
        echo "<script>window.open('../home/requestcreate.php','_self')</script>";

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