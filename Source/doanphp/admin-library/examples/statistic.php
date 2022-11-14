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


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    </style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>


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
                        <i class="fas fa-book"></i>
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
                <li class="nav-item active">
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
        <nav class="navbar navbar-expand-lg " color-on-scroll="500">
            <div class="container-fluid">

                <a class="navbar-brand" href="#pablo"> Manage </a>
                <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="dropdown">
                                <i class="fa fa-magic"></i>
                                <span class="d-lg-none">Dashboard</span>
                            </a>

                        </li>
                        <style>


                            .dropdown {
                                position: relative;
                                display: inline-block;
                            }

                            .dropdown-content {
                                display: none;
                                position: absolute;
                                background-color: #f1f1f1;
                                min-width: 160px;
                                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                                z-index: 1;
                            }

                            .dropdown-content a {
                                color: black;
                                padding: 5px 10px;
                                text-decoration: none;
                                display: block;
                            }

                            .dropdown-content a:hover {
                                background-color: #ddd;
                            }

                            .dropdown:hover .dropdown-content {
                                display: block;
                            }

                            .dropdown:hover .dropbtn {
                                background-color: #3e8e41;
                            }
                        </style>
                        <li class="dropdown nav-item">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="fas fa-list"></i>
                                    <span class="d-lg-none">Notification </span>
                                </a>
                                <div class="dropdown-content">
                                    <a class="dropdown-item" href="statistic.php?statisticmoney">Thống kê tiền phạt</a>
                                    <a class="dropdown-item" href="statistic.php?statisticbook">Thống kê sách</a>
                                    <a class="dropdown-item" href="statistic.php?statisticbook">Thống kê người mượn</a>
                                </div>
                            </div>
                        </li>


                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                        <li class="dropdown nav-item">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name ?></span>
                                    <img class="img-profile rounded-circle"
                                         src="../assets/img/undraw_profile.svg" width="30" height="30">

                                </a>
                                <div class="dropdown-content">
                                    <a class="dropdown-item" href="profile.php">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Setting
                                    </a>
                                    <a class="dropdown-item" href="logout.php">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Log out
                                    </a>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!--view-->
                    <?php
                    if (isset($_GET['statisticmoney'])) {
                        include "includes/statisticmoney.php";

                    }
                    if (isset($_GET['statisticbook'])) {
                        include "includes/statisticbook.php";
                    }
                    ?>
                        <!--end-->
                    </div>

                    <!--end-->
                </div>

            </div>
        </div>
    </div>
    <!--Footer-->

</div>
</div>

</body>
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
<!--<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>-->
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

<script>
    // =========================================================
    //  Light Bootstrap Dashboard - v2.0.1
    // =========================================================
    //
    //  Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
    //  Copyright 2019 Creative Tim (https://www.creative-tim.com)
    //  Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)
    //
    //  Coded by Creative Tim
    //
    // =========================================================
    //
    //  The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

    var searchVisible = 0;
    var transparent = true;

    var transparentDemo = true;
    var fixedTop = false;

    var navbar_initialized = false;
    var mobile_menu_visible = 0,
        mobile_menu_initialized = false,
        toggle_initialized = false,
        bootstrap_nav_initialized = false,
        $sidebar,
        isWindows;

    $(document).ready(function () {
        window_width = $(window).width();

        // check if there is an image set for the sidebar's background
        lbd.checkSidebarImage();

        // Init navigation toggle for small screens
        if (window_width <= 991) {
            lbd.initRightMenu();
        }

        //  Activate the tooltips
        $('[rel="tooltip"]').tooltip();

        //      Activate regular switches
        if ($("[data-toggle='switch']").length != 0) {
            $("[data-toggle='switch']").bootstrapSwitch();
        }

        $('.form-control').on("focus", function () {
            $(this).parent('.input-group').addClass("input-group-focus");
        }).on("blur", function () {
            $(this).parent(".input-group").removeClass("input-group-focus");
        });

        // Fixes sub-nav not working as expected on IOS
        $('body').on('touchstart.dropdown', '.dropdown-menu', function (e) {
            e.stopPropagation();
        });
    });

    // activate collapse right menu when the windows is resized
    $(window).resize(function () {
        if ($(window).width() <= 991) {
            lbd.initRightMenu();
        }
    });

    lbd = {
        misc: {
            navbar_menu_visible: 0
        },
        checkSidebarImage: function () {
            $sidebar = $('.sidebar');
            image_src = $sidebar.data('image');

            if (image_src !== undefined) {
                sidebar_container = '<div class="sidebar-background" style="background-image: url(' + image_src + ') "/>'
                $sidebar.append(sidebar_container);
            } else if (mobile_menu_initialized == true) {
                // reset all the additions that we made for the sidebar wrapper only if the screen is bigger than 991px
                $sidebar_wrapper.find('.navbar-form').remove();
                $sidebar_wrapper.find('.nav-mobile-menu').remove();

                mobile_menu_initialized = false;
            }
        },

        initRightMenu: function () {
            $sidebar_wrapper = $('.sidebar-wrapper');

            if (!mobile_menu_initialized) {

                $navbar = $('nav').find('.navbar-collapse').first().clone(true);

                nav_content = '';
                mobile_menu_content = '';

                //add the content from the regular header to the mobile menu
                $navbar.children('ul').each(function () {

                    content_buff = $(this).html();
                    nav_content = nav_content + content_buff;
                });

                nav_content = '<ul class="nav nav-mobile-menu">' + nav_content + '</ul>';

                $navbar_form = $('nav').find('.navbar-form').clone(true);

                $sidebar_nav = $sidebar_wrapper.find(' > .nav');

                // insert the navbar form before the sidebar list
                $nav_content = $(nav_content);
                $nav_content.insertBefore($sidebar_nav);
                $navbar_form.insertBefore($nav_content);

                $(".sidebar-wrapper .dropdown .dropdown-menu > li > a").click(function (event) {
                    event.stopPropagation();

                });

                mobile_menu_initialized = true;
            } else {
                console.log('window with:' + $(window).width());
                if ($(window).width() > 991) {
                    // reset all the additions that we made for the sidebar wrapper only if the screen is bigger than 991px
                    $sidebar_wrapper.find('.navbar-form').remove();
                    $sidebar_wrapper.find('.nav-mobile-menu').remove();

                    mobile_menu_initialized = false;
                }
            }

            if (!toggle_initialized) {
                $toggle = $('.navbar-toggler');

                $toggle.click(function () {

                    if (mobile_menu_visible == 1) {
                        $('html').removeClass('nav-open');

                        $('.close-layer').remove();
                        setTimeout(function () {
                            $toggle.removeClass('toggled');
                        }, 400);

                        mobile_menu_visible = 0;
                    } else {
                        setTimeout(function () {
                            $toggle.addClass('toggled');
                        }, 430);


                        main_panel_height = $('.main-panel')[0].scrollHeight;
                        $layer = $('<div class="close-layer"></div>');
                        $layer.css('height', main_panel_height + 'px');
                        $layer.appendTo(".main-panel");

                        setTimeout(function () {
                            $layer.addClass('visible');
                        }, 100);

                        $layer.click(function () {
                            $('html').removeClass('nav-open');
                            mobile_menu_visible = 0;

                            $layer.removeClass('visible');

                            setTimeout(function () {
                                $layer.remove();
                                $toggle.removeClass('toggled');

                            }, 400);
                        });

                        $('html').addClass('nav-open');
                        mobile_menu_visible = 1;

                    }
                });

                toggle_initialized = true;
            }
        }
    }


    // Returns a function, that, as long as it continues to be invoked, will not
    // be triggered. The function will be called after it stops being called for
    // N milliseconds. If `immediate` is passed, trigger the function on the
    // leading edge, instead of the trailing.

    function debounce(func, wait, immediate) {
        var timeout;
        return function () {
            var context = this,
                args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(function () {
                timeout = null;
                if (!immediate) func.apply(context, args);
            }, wait);
            if (immediate && !timeout) func.apply(context, args);
        };
    };

</script>


</html>
