<?php

if (!isset($_SESSION['idadmin'])) {
    echo "<script>window.open('/doanphp/Loginad/index.php','_self')</script>";
} else {

?>

    <?php

    if (isset($_GET['detail_request'])) {
        $student_id = $_GET['detail_request'];

        $get_student = "select * from student where STUDENT_ID='$student_id'";

        $run_student = mysqli_query($conn, $get_student);

        $row_student = mysqli_fetch_array($run_student);

        $student_name = $row_student['STUDENT_NAME'];
    }

    ?>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Detail Request Create Book
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <h3 class="panel-title">
                        <i class="fa fa-tags"></i> List Book Need Create of Student <h1><?php echo $student_name; ?></h1>
                    </h3>

                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> NO </th>
                                    <th> BOOK NAME </th>
                                    <th> BOOK IMAGE </th>
                                    <th> BOOK TYPE </th>
                                    <th> BOOK DESCRIPTION </th>
                                    <th> CHECK </th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php

                                if (isset($_GET['detail_request'])) {
                                    $i = 0;

                                    $student_id = $_GET['detail_request'];

                                    $get_books = "select * from bookofstudent where STUDENT_ID='$student_id' and BOOK_REQUEST_CREATE=0";

                                    $run_books = mysqli_query($conn, $get_books);

                                    while ($row_books = mysqli_fetch_array($run_books)) {

                                        $book_id = $row_books['BOOK_ID'];

                                        $book_name = $row_books['BOOK_NAME'];

                                        $book_image = $row_books['BOOK_IMAGE'];

                                        $book_type = $row_books['BOOK_TYPE'];

                                        $book_des = $row_books['DESCRIPTION'];

                                        $i++;




                                ?>

                                        <tr>
                                            <td> <?php echo $i; ?> </td>
                                            <td> <?php echo $book_name; ?> </td>
                                            <td> <img src="<?php echo $book_image; ?>" width="60" height="60"> </td>
                                            <td> <?php echo $book_type; ?></td>
                                            <td> <?php echo $book_des; ?></td>
                                            <td>

                                                <a href="index.php?detail_book_request=<?php echo $book_id; ?>&student_request=<?php echo $student_id; ?>">

                                                    <i class="fa fa-check"></i> Check

                                                </a>

                                            </td>
                                        </tr>

                                <?php }
                                } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>