<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Book</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        $id=$_GET['edit_book'];
                        $sql = "Select * from bookoflibrary where BOOK_ID=$id";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            $bookid = $row["BOOK_ID"];
                            $bookname = $row["BOOK_NAME"];
                            $booktype = $row["BOOK_TYPE"];
                            $bookimg = $row["BOOK_IMAGE"];
                            $bookdescription = $row["DESCRIPTION"];
                            $bookcost = $row["BOOK_COST"];
                            $booknumber = $row["BOOK_NUMBER"];
                        }
                        ?>
                        <form method="post">
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>BookID</label>
                                        <input type="text" class="form-control" disabled=""
                                               placeholder="bookid" value="<?php echo $bookid
                                        ?>">
                                    </div>
                                </div>

                                <div class="col-md-5 pl-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Book Name</label>
                                        <input type="text" class="form-control" name="bookname"
                                               value="<?php echo $bookname
                                               ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Book type</label>
                                        <input type="text" class="form-control" name="booktype"
                                               value="<?php echo $booktype
                                               ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="bookimg"

                                        >
                                        <img src="<?php echo $bookimg
                                        ?>" width='200' height='230' class='img-fluid'/></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>COST</label>
                                        <input type="text" class="form-control" name='bookcost'
                                               value="<?php echo $bookcost
                                               ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 px-1">
                                    <div class="form-group">
                                        <label>NUMBER</label>
                                        <input type="number" class="form-control" name="booknumber"
                                               value="<?php echo $booknumber
                                               ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea rows="4" cols="80" class="form-control"
                                                  placeholder="Here can be your description" name='bookdescription'
                                                  value="Mike"><?php echo $bookdescription
                                            ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="updateprofile" class="btn btn-info btn-fill pull-right">
                                Update book
                            </button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_POST["updateprofile"])) {
                $bookname = $_POST["bookname"];
                $booktype = $_POST["booktype"];
                $bookimg1 = $_POST["bookimg"];
                if($bookimg1 == ''){
                    $bookimg1=$bookimg;
                }
                $bookcost = $_POST["bookcost"];
                $booknumber = $_POST["booknumber"];
                $bookdescription = $_POST["bookdescription"];
                $sql = "Update bookoflibrary set BOOK_NAME='$bookname', BOOK_TYPE ='$booktype',BOOK_IMAGE ='$bookimg1',DESCRIPTION='$bookdescription',BOOK_COST='$bookcost',BOOK_NUMBER=$booknumber where BOOK_ID ='$bookid' ";
                if ($conn->query($sql) == true) {
                    echo "<script>alert(' Successfully update ')</script>";
                    echo "<script>window.open('manage.php?view_books','_self')</script>";
                }


            }
            ?>

        </div>
    </div>
</div>