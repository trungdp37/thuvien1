<?php

session_start();
include("includes/database.php");

if (!isset($_SESSION['idadmin'])) {
    echo "<script>window.open('/doanphp/Loginad/index.php','_self')</script>";
} else {
    $admin_session = $_SESSION['idadmin'];
    $name = $_SESSION['nameadmin'];

    $get_admin = "select * from accountmanage where MANAGE_USERNAME ='$admin_session'";
    $run_admin = mysqli_query($conn, $get_admin);
    $row_admin = $run_admin->fetch_assoc();

    //echo "<script>alert('$admin_session')</script>";

//    $admin_username = $row_admin['admin_username'];

    $get_books = "select * from bookofstudent";
    $run_books = mysqli_query($conn, $get_books);
    $count_books = mysqli_num_rows($run_books);

    $get_students = "select * from student";
    $run_students = mysqli_query($conn, $get_students);
    $count_students = mysqli_num_rows($run_students);

    $get_count_book = "select * from bookofstudent join student where bookofstudent.STUDENT_ID=student.STUDENT_ID and BOOK_REQUEST_CREATE=0";

    $run_rqb = mysqli_query($conn, $get_count_book);

    $count_book_r = mysqli_num_rows($run_rqb);



    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap-337.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
        <title>Admin Area</title>
    </head>

    <body>

    <div id="wrapper">

        <?php include("includes/sidebar.php");
        ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <?php

                if (isset($_GET['dashboard'])) {
                    include("dashboard.php");
                }

                if (isset($_GET['view_books'])) {
                    include("view_books.php");
                }

                if (isset($_GET['detail_book'])) {
                    include("detail_book.php");
                }

                if (isset($_GET['view_students'])) {
                    include("view_students.php");
                }

                if (isset($_GET['edit_student'])) {
                    include("edit_student.php");
                }

                if (isset($_GET['delete_student'])) {
                    include("delete_student.php");
                }

                if (isset($_GET['view_request_cb'])) {
                    include("view_request_cb.php");
                }

                if (isset($_GET['detail_request'])) {
                    include("detail_request.php");
                }

                if (isset($_GET['detail_book_request'])) {
                    include("detail_book_request.php");
                }

                ?>
            </div>
        </div>
    </div>

    <script src="js/jquery-331.js"></script>
    <script src="js/boostrap-337.js"></script>
    </body>

    </html>

<?php } ?>