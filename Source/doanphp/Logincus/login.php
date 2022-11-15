<?php
session_start();
include '../database.php';
header('Content-Type: text/html; charset=UTF-8');
if (isset($_POST['cus_login'])) {
    $email = $_POST["email"];
    $password = $_POST['password'];
    $sql = "select * from student where STUDENT_EMAIL = '$email' and STUDENT_PASSWORD = '$password' ";
    $query = mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($query);
    while($row = $query -> fetch_assoc()){
        $namestu=$row["STUDENT_NAME"];
        $idstu=$row["STUDENT_ID"];
    }
    if ($num_rows==0)
    {
        echo "<script>alert('Email hoặc mật khẩu sai')</script>";
    }
    else
    {
        $_SESSION['namestulog'] = $namestu;
        $_SESSION['idstulog'] = $idstu;
        echo "<script>alert('Đăng nhập thành công')</script>";
        echo "<script>window.open('../library/index.php','_self')</script>";
    }
}
?>