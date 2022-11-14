<?php
if (!isset($_SESSION['idadmin'])) {
    echo "<script>window.open('/Loginad/index.php','_self')</script>";
} else {

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Books
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">

                <h3 class="panel-title">
                    <i class="fa fa-tags"></i> View Books
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
                                <th> Edit </th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php

                                $i = 0;

                                $get_books = "select * from bookofstudent where BOOK_REQUEST_CREATE=1 group by BOOK_ID";

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

                                    <a href="index.php?detail_book=<?php echo $book_id; ?>">

                                        <i class="fa fa-info"></i> Detail

                                    </a>

                                </td>
                            </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php } ?>