<?php

if (!isset($_SESSION['idadmin'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">

            <span class="sr-only">Toggle Navigation</span>

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

        </button>
        <a href="index.php?dashboard" class="navbar-brand"><?php echo $name ?></a>
    </div>

    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i> <?php echo $name ?> <b class="caret"></b>
            </a>

            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?user_profile">
                        <i class="fa fa-fw fa-user"></i> Profile
                    </a>
                </li>

                <li>
                    <a href="index.php?view_books">
                        <i class="fa fa-fw fa-tag"></i> Books
                        <span class="badge"> <?php echo $count_books; ?> </span>
                    </a>
                </li>

                <li>
                    <a href="index.php?view_students">
                        <i class="fa fa-fw fa-users"></i> Students
                        <span class="badge"><?php echo $count_students; ?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_request_cb">
                        <i class="fa fa-fw fa-users"></i> Request
                        <span class="badge"><?php echo $count_book_r; ?></span>
                    </a>
                </li>

                <li class="divider"></li>

                <li>
                    <a href="logout.php">
                        <i class="fa fa-fw fa-power-off"></i> Logout
                    </a>
                </li>

            </ul>
        </li>
    </ul>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                    <i class="fa fa-fw fa-dashboard"></i> Dashboard
                </a>
            </li>

            <?php
            $user=$_SESSION['idadmin'];
            $sql = "Select * from accountmanage where MANAGE_USERNAME='$user'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $role = $row["MANAGE_ROLE"];
            if ($role == 0)
            { ?>
                <li>
                    <a href="/doanphp/admin-library/examples/manage.php">
                        <i class="fa fa-book"></i> Library <sup>lk</sup>
                    </a>
                </li>
            <?php }
            ?>
            <li>
                <a href="/doanphp/home/index.php">
                    <i class="fa fa-exchange"></i> Book Exchange
                </a>
            </li>

            <li>
                <a href="index.php?view_books" data-toggle="collapse" data-target="#books">
                    <i class="fa fa-fw fa-tag"></i> Books
                </a>
            </li>

            <li>
                <a href="index.php?view_students" data-toggle="collapse" data-target="#students">
                    <i class="fa fa-fw fa-users"></i> View Profile Students
                </a>
            </li>

            <li>
                <a href="index.php?view_request_cb">
                    <i class="fa fa-fw fa-book"></i> View Request Create Book
                </a>
            </li>

            <li>
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Logout
                </a>
            </li>


        </ul>
    </div>


</nav>

<?php } ?>