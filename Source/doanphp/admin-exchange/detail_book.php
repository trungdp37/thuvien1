<?php

if (!isset($_SESSION['idadmin'])) {
    echo "<script>window.open('/doanphp/Loginad/index.php','_self')</script>";
}else {

?>

<?php

    if (isset($_GET['detail_book'])) {
        $book_id = $_GET['detail_book'];

        $get_book = "select * from bookofstudent where BOOK_ID='$book_id'";
        $run_book = mysqli_query($conn, $get_book);
        $row_book = mysqli_fetch_array($run_book);

        $book_name = $row_book['BOOK_NAME'];
        $book_type = $row_book['BOOK_TYPE'];
        $book_desc = $row_book['DESCRIPTION'];
        $book_image = $row_book['BOOK_IMAGE'];
    }

    ?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard / View Book / Edit Book
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-pencil fa-fw"></i> Edit Book
                </h3>
            </div>

            <div class="panel-body">
                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label"> Book Name </label>
                        <div class="col-md-6">
                            <input type="text" name="book_name" class="form-control" required
                                value="<?php echo $book_name; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Book Type </label>
                        <div class="col-md-6">
                            <input type="text" name="book_type" class="form-control" required
                                value="<?php echo $book_type; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Book Description </label>
                        <div class="col-md-6">
                            <input type="text" name="book_desc" class="form-control" required
                                value="<?php echo $book_desc; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> Book Image </label>
                        <div class="col-md-6">
                            <input type='file' name='img' value='<?php $book_image ?>' class="form-control">

                            <br/>

                            <img src="<?php echo $book_image; ?>" class="img-responsive">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input name="update" value="Update" type="submit" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

    if (isset($_POST['update'])) {

        $book_name = $_POST['book_name'];

        $book_type = $_POST['book_type'];

        $book_desc = $_POST['book_desc'];

        $img1 = $_POST['img'];

        if ($img1 == '') {
            $img1 = $book_image;
        }

        $update_book = "update bookofstudent set BOOK_NAME='$book_name',BOOK_TYPE='$book_type',DESCRIPTION='$book_desc',BOOK_IMAGE='$img1',BOOK_REQUEST_CREATE=1 where BOOK_ID='$book_id'";

        $run_update_book = mysqli_query($conn, $update_book);

        if ($run_update_book) {

            echo "<script>alert('Update Successful')</script>";

            echo "<script>window.open('index.php?view_books','_self')</script>";
        }
    }

    ?>
<?php } ?>