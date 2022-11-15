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
        echo "<script type='text/javascript' src='http://code.jquery.com/jquery-latest.js'></script>
<script type='text/javascript'>
    var result = sessionStorage.getItem('url');
    var url1='../home/';
    var url2= result;
    var url3=url1+url2;
    if(result == null){
        window.open('../home/index.php','_self')
    }
    else
     window.open(url3,'_self');
</script>
";
    }
}
?>
