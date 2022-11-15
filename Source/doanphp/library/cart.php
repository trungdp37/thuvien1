<?php
session_start();
if (!isset($_SESSION['idstulog'])) {
    echo "<script>window.open('/doanphp/Logincus/index.php','_self')</script>";
}
$idstu=$_SESSION['idstulog'];
include '../database.php';
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>LIBRARY LK</title>
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
                <span class="fa fa-book"></span> <span class="title">Library LK</span>
            </a>

        </div>
    </header>

    <!-- Menu -->


    <!-- Main -->
    <div id="main">
        <div class="inner">

            <div class="student-details">
                <div class="image main">
                    <img src="images/banner-image-6-1920x500.jpg" class="img-fluid" alt="">
                </div>
            </div>

            <!--Request change student book-->
            <h3 style="margin-top:50px;">My Card</h3>
            <style>
                #table th,td
                {
                    text-align: center;
                    vertical-align: middle;

                }
            </style>
            <table id="table" border="1">
                <thead>
                <tr>
                    <th>BOOK ID</th>
                    <th>BOOK NAME</th>
                    <th>BOOK TYPE</th>
                    <th>BOOK IMAGE</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (!$_SESSION['arrcart']) {
                    echo "<script>alert('No item in cart')</script>";
                    echo "<script>window.open('../library/index.php','_self')</script>";
                }
                else{
                foreach ($_SESSION['arrcart'] as $book) {
                    ?>
                    <tr>
                        <td><?php echo $book['id'] ?></td>
                        <td><?php echo $book['name'] ?></td>
                        <td><?php echo $book['type'] ?></td>
                        <td><img src="<?php echo $book['img'] ?>" width='40' height='30' class='img-fluid' /></td>
                        <td><a href='../library/deletecard.php?id=<?php echo $book['id']?>'>
                                <i class='fa fa-trash'></i> delete
                            </a></td>
                    </tr>
                <?php }} ?>
                </tbody>
            </table>

            <button type='submit' class='btn btn-outline-dark btn-fill pull-left'><a href='../library/products.php'>
                    <i class="fa fa-long-arrow-left"></i>
                    Continue
                </a>

            </button>
            <form method="post">
                <button name="request" type='submit' class='btn btn-outline-warning btn-fill pull-right'>Request</button>
            </form>
            <?php
                if(isset($_POST['request'])){

                    $sqlselect="select * from student where STUDENT_ID=$idstu";
                    $resultselect=$conn->query($sqlselect);
                    $rowselect=$resultselect->fetch_assoc();
                    $lostbook=$rowselect['STUDENT_LOSTBOOK'];
                    if( $lostbook >= 3)
                    {
                        echo "<script>alert('Bạn mất sách 3 lần. Vui lòng liên hệ quản trị.')</script>";
                        echo "<script>window.open('../library/index.php','_self')</script>";
                        exit();
                    }


                    $date=date("Y-m-d");
                    $dateexp = strtotime ( '+1 month' , strtotime ( $date ) ) ;
                    $dateexp = date ( 'Y-m-d' , $dateexp );
                    $items = $_SESSION['cart'];
                    $count=count($items);

                    $sql="insert into callcard(STUDENT_ID,CARD_DATE_CALL,CARD_DATE_EXP,CARD_NUMBER_BOOK_ID,STATUS) values ($idstu,'$date','$dateexp',$count,0)";
                    $result=$conn->query($sql);
                    $sql1="Select CARD_ID from callcard order by CARD_ID desc limit 1";
                    $result1=$conn->query($sql1);
                    $row=$result1->fetch_assoc();
                    $cardid=$row["CARD_ID"];

                    foreach ($_SESSION['arrcart'] as $book){
                        $bookid=$book['id'];


                        $sql3="Select BOOK_NUMBER from bookoflibrary where BOOK_ID=$bookid";
                        $result3=$conn->query($sql3);
                        $row3=$result3->fetch_assoc();
                        $number=$row3["BOOK_NUMBER"];
                        $number=$number-1;

                        $sql2="insert into detailcallcard(CARD_ID ,BOOK_ID) values ($cardid,$bookid)";
                        $result2=$conn->query($sql2);

                        $sql4="update bookoflibrary set BOOK_NUMBER=$number where BOOK_ID=$bookid";
                        $result4=$conn->query($sql4);
                    }
                    if($result == true){
                        unset($_SESSION['cart']);
                        unset($_SESSION['arrcart']);
                        echo "<script>alert(' Successfully')</script>";
                        echo "<script>window.open('../library/index.php','_self')</script>";
                    }
                    else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            ?>
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