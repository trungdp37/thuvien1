<?php
if (isset($_GET['check_rq'])) {
    $idcard=$_GET["check_rq"];
    $sql = "update callcard set STATUS=1,CLERK='$user'  where CARD_ID=$idcard";
    $sql1 = "update detailcallcard set CARD_BOOK_STATUS_CALL=100  where CARD_ID=$idcard";
    $resul=$conn->query($sql1);
    if ($conn->query($sql) === TRUE and $resul==true) {
        echo "<script>alert('Successful check')</script>";

        echo "<script>window.open('rqcallcard.php?view_rq_card','_self')</script>";
    }
    else
        echo "<script>alert('$conn->error')</script>";
}
?>