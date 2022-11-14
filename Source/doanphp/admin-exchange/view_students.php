<?php

if (!isset($_SESSION['idadmin'])) {
    echo "<script>window.open('/Loginad/index.php','_self')</script>";
}else {

?>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View Students
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <h3 class="panel-title">
                        <i class="fa fa-tags"></i> List Students
                    </h3>

                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> NO </th>
                                    <th> STUDENT NAME </th>
                                    <th> STUDENT PHONE </th>
                                    <th> STUDENT ADDRESS </th>
                                    <th> DELETE </th>
                                    <th> EDIT </th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php

                                $i = 0;

                                $get_students = "select * from student";

                                $run_students = mysqli_query($conn, $get_students);

                                while ($row_students = mysqli_fetch_array($run_students)) {

                                    $student_id = $row_students['STUDENT_ID'];

                                    $student_name = $row_students['STUDENT_NAME'];

                                    $student_phone = $row_students['STUDENT_PHONE'];

                                    $student_address = $row_students['STUDENT_ADDRESS'];

                                    $i++;

                                ?>

                                    <tr>
                                        <td> <?php echo $i; ?> </td>
                                        <td> <?php echo $student_name; ?> </td>
                                        <td> <?php echo $student_phone; ?> </td>
                                        <td> <?php echo $student_address; ?></td>
                                        <td>

                                            <a href="index.php?delete_student=<?php echo $student_id; ?>">

                                                <i class="fa fa-trash-o"></i> Delete

                                            </a>

                                        </td>
                                        <td>

                                            <a href="index.php?edit_student=<?php echo $student_id; ?>">

                                                <i class="fa fa-edit"></i> Edit

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