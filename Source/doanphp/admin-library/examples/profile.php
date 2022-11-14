<?php

session_start();
if (!isset($_SESSION['idadmin'])) {
    echo "<script>window.open('/doanphp/Loginad/index.php','_self')</script>";
}
$user = $_SESSION['idadmin'];
$name = $_SESSION['nameadmin'];
$dem = 0;
include '../database.php';
$sql = "select * from accountmanage where MANAGE_USERNAME  = '$user' ";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $email = $row["MANAGE_EMAIL"];
    $address = $row["MANAGE_ADDRESS"];
    $birthday = $row["MANAGE_BIRTHDAY"];
    $role = $row["MANAGE_ROLE"];
    $phone = $row["MANAGE_PHONE"];
    $cmnd = $row["MANAGE_IDENTITYCARD"];
    $about = $row["MANAGE_ABOUT"];
    $name=$row["MANAGE_NAME"];
    $_SESSION['nameadmin']=$name;

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>User</title>
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
                   href="index.html">
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
                        <i class="fa fa-book"></i>
                        <p>Manage</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="background.php">
                        <i class="nc-icon nc-album-2"></i>
                        <p>Background</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="product.php">
                        <i class="nc-icon nc-notes"></i>
                        <p>Product</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="rqcallcard.php">
                        <i class="nc-icon nc-cart-simple"></i>
                        <p>Request Card</p>
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-5 pr-1">
                                            <div class="form-group">
                                                <label>Company (disabled)</label>
                                                <input type="text" class="form-control" disabled=""
                                                       placeholder="Company" value="Library LKL">
                                            </div>
                                        </div>
                                        <div class="col-md-3 px-1">
                                            <div class="form-group">
                                                <label>Role (disabled)</label>
                                                <input type="text" class="form-control" disabled placeholder="Username"
                                                       value="<?php
                                                       if ($role == 0) {
                                                           echo "Admin";
                                                       } else if ($role == 1) {
                                                           echo "Staff";
                                                       }

                                                       ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" name="Email"
                                                       value="<?php echo $email
                                                       ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" name="FullName"
                                                       value="<?php echo $name
                                                       ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="Address"
                                                       value="<?php echo $address
                                                       ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>Birthday</label>
                                                <input type="date" class="form-control" name='date'
                                                       value="<?php echo $birthday
                                                       ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" name="phone"
                                                       value="<?php echo $phone
                                                       ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label>Identity Card</label>
                                                <input type="text" class="form-control" name="cmnd"
                                                       value="<?php echo $cmnd
                                                       ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="4" cols="80" class="form-control"
                                                          placeholder="Here can be your description" name='about'
                                                          value="Mike"><?php echo $about
                                                    ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="updateprofile" class="btn btn-info btn-fill pull-right">
                                        Update Profile
                                    </button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST["updateprofile"])) {
                        $email = $_POST["Email"];
                        $address = $_POST["Address"];
                        $birthday = $_POST["date"];
                        $phone = $_POST["phone"];
                        $cmnd = $_POST["cmnd"];
                        $about = $_POST["about"];
                        $name = $_POST["FullName"];
                        $sql = "Update accountmanage set MANAGE_NAME='$name', MANAGE_PHONE ='$phone',MANAGE_EMAIL ='$email',MANAGE_ADDRESS='$address',MANAGE_BIRTHDAY='$birthday',MANAGE_IDENTITYCARD=$cmnd,MANAGE_ABOUT='$about' where MANAGE_USERNAME='$user' ";
                        if ($conn->query($sql) == true) {
                            echo "<script>alert(' Successfully update ')</script>";
                            echo "<script>window.open('../examples/profile.php','_self')</script>";
                        }


                    }
                    ?>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400"
                                     alt="...">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="../assets/img/faces/khale.jpg" alt="...">
                                        <h5 class="title"><?php echo $name
                                            ?></h5>
                                    </a>
                                    <p class="description">
                                        <?php
                                        if ($role == 0) {
                                            echo "Admin";
                                        } else if ($role == 1) {
                                            echo "Staff";
                                        }

                                        ?>
                                    </p>
                                </div>
                                <p class="description text-center">
                                    <?php echo $about
                                    ?>
                                </p>
                            </div>
                            <hr>
                            <div class="button-container mr-auto ml-auto">
                                <button onclick="location.href='https://www.facebook.com/lekhapkt2000';"
                                        class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </button>
                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                    <a href="tel:<?php echo $phone
                                    ?>"> <span class="text-hotline"><?php echo $phone
                                            ?></span> </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Footer-->

    </div>
</div>

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
