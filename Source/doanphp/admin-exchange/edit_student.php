<?php
if (!isset($_SESSION['idadmin'])) {
    echo "<script>window.open('/doanphp/Loginad/index.php','_self')</script>";
}else {

?>

    <?php

    if (isset($_GET['edit_student'])) {
        $student_id = $_GET['edit_student'];

        $get_student = "select * from student where STUDENT_ID='$student_id'";
        $run_student = mysqli_query($conn, $get_student);
        $row_student = mysqli_fetch_array($run_student);

        $student_name = $row_student['STUDENT_NAME'];
        $student_phone = $row_student['STUDENT_PHONE'];
        $student_address = $row_student['STUDENT_ADDRESS'];
        $student_email =$row_student['STUDENT_EMAIL'];
        $student_university =$row_student['UNIVERSITY'];
    }

    ?>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard / View Student / Edit Student
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-pencil fa-fw"></i> Edit Student
                    </h3>
                </div>

                <div class="panel-body">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Student Name </label>
                            <div class="col-md-6">
                                <input type="text" name="student_name" class="form-control" required value="<?php echo $student_name; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"> Student Phone </label>
                            <div class="col-md-6">
                                <input type="text" name="student_phone" class="form-control" required value="<?php echo $student_phone; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"> Student Address </label>
                            <div class="col-md-6">
                                <input type="text" name="student_address" class="form-control" required value="<?php echo $student_address; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> Student Email </label>
                            <div class="col-md-6">
                                <input type="text" name="student_email" class="form-control" required value="<?php echo $student_email; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"> University </label>
                            <div class="col-md-6">
                                <input type="text" name="student_university" class="form-control" required value="<?php echo $student_university; ?>">
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

        $student_name = $_POST['student_name'];

        $student_phone = $_POST['student_phone'];

        $student_address = $_POST['student_address'];

        $update_book = "update student set STUDENT_NAME='$student_name',STUDENT_PHONE='$student_phone',STUDENT_ADDRESS='$student_address' where STUDENT_ID='$student_id'";

        $run_student = $conn->query($update_book);

        if ($run_student) {

            echo "<script>alert('Update Successful')</script>";

            echo "<script>window.open('index.php?view_students','_self')</script>";
        }
    }

    ?>
<?php } ?>