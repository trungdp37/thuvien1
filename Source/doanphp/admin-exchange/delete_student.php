<?php

if (!isset($_SESSION['idadmin'])) {
    echo "<script>window.open('/doanphp/Loginad/index.php','_self')</script>";
} else {

?>

<?php

    if (isset($_GET['delete_student'])) {

        $student_id = $_GET['delete_student'];

        $delete_student = "delete from student where STUDENT_ID='$student_id'";

        $run_delete = mysqli_query($conn, $delete_student);

        if ($run_delete) {

            echo "<script>alert('Delete Sucessful')</script>";

            echo "<script>window.open('index.php?view_students','_self')</script>";
        }
    }

?>

<?php } ?>