<?php
session_start();
if (!isset($_SESSION['idadmin'])) {
    echo "<script>window.open('/doanphp/Loginad/index.php','_self')</script>";
}
$user = $_SESSION['idadmin'];
$name = $_SESSION['nameadmin'];
$dem = 0;
include '../database.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Dashboard - Admin</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet"/>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!--    scripcopy-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet"/>
</head>


<body>
<div class="wrapper">
    <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
    Tip 2: you can also add an image using data-image tag
-->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a class="sidebar-brand d-flex align-items-center justify-content-centersi simple-text"
                   href="/doanphp/home/index.php">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">LIBRARY<sup>lk</sup></div>
                </a>
            </div>
            <div class="logo">
                Name: <?php echo $name ?>
                </a>
            </div>
            <ul class="nav">
                <li>
                    <a class="nav-link" href="manage.php">
                        <i class="fas fa-book"></i>
                        <p>Manage</p>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="background.php">
                        <i class="nc-icon nc-album-2"></i>
                        <p>Background</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="product.php">
                        <i class="nc-icon nc-notes"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="rqcallcard.php">
                        <i class="nc-icon nc-cart-simple"></i>
                        <p>Request card</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="student.php">
                        <i class="fas fa-users"></i>
                        <p>Student</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="callcard.php">
                        <i class="fas fa-list"></i>
                        <p>Call Card</p>
                    </a>
                </li>
                <li >
                    <a class="nav-link" href="statistic.php?statisticmoney">
                        <i class="fas fa-star"></i>
                        <p>statistic</p>
                    </a>
                </li>
                <?php
                $sql = "Select * from accountmanage where MANAGE_USERNAME='$user'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $role = $row["MANAGE_ROLE"];
                if ($role == 0) { ?>
                    <li>
                        <a class="nav-link" href="staff.php">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Staff</p>
                        </a>
                    </li>
                    <div class="logo">
                        Book Exchange
                    </div>
                    <li>
                        <a class="nav-link" href="/doanphp/admin-exchange/index.php?dashboard">
                            <i class="fas fa-exchange-alt"></i>
                            <p>Manage</p>
                        </a>
                    </li>
                <?php }
                ?>

            </ul>

        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <?php
        include("../examples/includes/navbar.php");
        ?>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Background</h4>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-3 px-1">
                                            <div class="form-group">
                                                <label>Sidebar 1</label>
                                                <input type="file" class="form-control" name="img">
                                            </div>
                                        </div>
                                        <div class="col-md-5 pr-1">
                                            <div class="form-group">
                                                <img src="images/blog-fullscreen-1-1920x700.jpg" class='img-fluid' alt=''  width='400' height='480'>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 px-1">
                                            <div class="form-group">
                                                <label>Sidebar 2</label>
                                                <input type="file" class="form-control" name="img">
                                            </div>
                                        </div>
                                        <div class="col-md-5 pr-1">
                                            <div class="form-group">
                                                <img src="images/slider-image-1	-1920x700.jpg" class='img-fluid' alt=''  width='400' height='480'>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 px-1">
                                            <div class="form-group">
                                                <label>Sidebar 3</label>
                                                <input type="file" class="form-control" name="img">
                                            </div>
                                        </div>
                                        <div class="col-md-5 pr-1">
                                            <div class="form-group">
                                                <img src="images/slider-image-3-1920x700.jpg" class='img-fluid' alt=''  width='400' height='480'>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--Side bar-->
<?php
    include 'includes/settingimgsidebar.php';
?>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

</html>
