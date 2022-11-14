<?php

if (!isset($_SESSION['idadmin'])) {
    echo "<script>window.open('/Loginad/index.php','_self')</script>";
} else {

?>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View Request Create Book
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">

                    <h3 class="panel-title">
                        <i class="fa fa-tags"></i> Request Create Book List
                    </h3>

                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> NO </th>
                                    <th> STUDENT NAME </th>
                                    <th> NUMBER BOOK </th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php

                                $i = 0;

                                $get_count_book = "select * from bookofstudent join student where bookofstudent.STUDENT_ID=student.STUDENT_ID and BOOK_REQUEST_CREATE=0";

                                $run_rqb = mysqli_query($conn, $get_count_book);

                                $count_book_r = mysqli_num_rows($run_rqb);

                                $get_rqb = "select DISTINCT student.STUDENT_ID,student.STUDENT_NAME from bookofstudent join student where bookofstudent.STUDENT_ID=student.STUDENT_ID and BOOK_REQUEST_CREATE=0";

                                $run_rqb = mysqli_query($conn, $get_rqb);

                                while ($row_rqb = mysqli_fetch_array($run_rqb)) {

                                    $student_id = $row_rqb['STUDENT_ID'];

                                    $student_name = $row_rqb['STUDENT_NAME'];

                                    $i++;
                                ?>

                                    <tr>
                                        <td> <?php echo $i; ?> </td>
                                        <td> <?php echo $student_name; ?> </td>
                                        <td>

                                            <a href="index.php?detail_request=<?php echo $student_id; ?>">
                                                <i class="fa fa-check"></i> Check
                                                <span class="badge"> <?php
                                                    $sql2="select STUDENT_ID,count(BOOK_ID) as a from bookofstudent where STUDENT_ID=$student_id and BOOK_REQUEST_CREATE=0 GROUP By STUDENT_ID ";
                                                    $result1=$conn->query($sql2);
                                                    while($row1=$result1->fetch_assoc()){
                                                        $count_book_r_stu = $row1["a"];
                                                    }

                                                    echo $count_book_r_stu; ?> </span>
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