<?php
session_start();
include '../database.php';
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>BOOK EXCHANGE FOR STUDENT</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="../library/assets/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../library/assets/css/main.css"/>
    <noscript>
        <link rel="stylesheet" href="../home/assets/css/noscript.css"/>
    </noscript>
</head>
<body class="is-preload">
<!-- Wrapper -->
<div id="wrapper">
    <!-- Header -->
    <header id="header">
        <div class="inner">

            <!-- Logo -->
            <a href="../home/index.php" class="logo">
                <span class="fa fa-book"></span> <span class="title">Library LK</span>
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
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../home/images/blog-fullscreen-1-1920x700.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/slider-image-1	-1920x700.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../home/images/slider-image-3-1920x700.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <br>
        <br>

        <div class="inner">
            <!-- About Us -->
            <header id="inner">
                <h1>Find book!</h1>
                <p></p>
            </header>

            <br>

            <h2 class="h2">New Book</h2>

            <!-- Products -->
            <section class="tiles">
                <?php
                $sql = "SELECT BOOK_ID,BOOK_NAME,BOOK_TYPE,BOOK_IMAGE FROM bookoflibrary  where BOOK_NUMBER <> 0 order by BOOK_ID desc limit 6";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output dữ liệu trên trang
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["BOOK_ID"];
                        echo "<article class='style1 style'>";
                        echo "<span class='image'>";
                        echo "<img src=" . $row["BOOK_IMAGE"] . " alt=''/> </span>";
                        echo "<a href='addcart.php?id=".$row["BOOK_ID"]."&namebook=".$row["BOOK_NAME"]."&type=".$row["BOOK_TYPE"]."&img=".$row["BOOK_IMAGE"]."'>";
                        echo "<h2 class='product-bk'>Add to cart</h2>";
                        echo "</a></article>";
                    }
                } else {
                   echo "";
                }
                $conn->close();
                ?>
            </section>

            <p class="text-center"><a href="../library/products.php">More Books &nbsp;<i
                            class="fa fa-long-arrow-right"></i></a></p>

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
    <script src="../library/assets/js/jquery.min.js"></script>
    <script src="../library/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../library/assets/js/jquery.scrolly.min.js"></script>
    <script src="../library/assets/js/jquery.scrollex.min.js"></script>
    <script src="../library/assets/js/main.js"></script>

</div>
</body>
</html>