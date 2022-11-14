<?php

if (!isset($_SESSION['idadmin'])) {
    echo "<script>window.open('/doanphp/Loginad/index.php','_self')</script>";
} else {

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Dashboard </h1>

        <ol class="breadcrumb">
            <li class="active">

                <i class="fa fa-dashboard"></i> Dashboard

            </li>
        </ol>

    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">

                        <i class="fa fa-tasks fa-5x"></i>

                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_books; ?> </div>

                        <div> Books </div>

                    </div>

                </div>
            </div>

            <a href="index.php?view_books">
                <div class="panel-footer">

                    <span class="pull-left">
                        View Details
                    </span>

                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>

                    <div class="clearfix"></div>

                </div>
            </a>

        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">

            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_students; ?> </div>
                        <div> Students </div>
                    </div>
                </div>
            </div>

            <a href="index.php?view_students">
                <div class="panel-footer">
                    <span class="pull-left">
                        View Details
                    </span>

                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>

                    <div class="clearfix"></div>

                </div>
            </a>

        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="panel panel-orange">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tags fa-5x"></i>
                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_book_r; ?> </div>
                        <div> Request Create Book </div>
                    </div>

                </div>
            </div>

            <a href="index.php?view_request_cb">
                <div class="panel-footer">
                    <span class="pull-left">
                        View Details
                    </span>

                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>

                    <div class="clearfix"></div>

                </div>
            </a>

        </div>
    </div>

</div>

<?php } ?>