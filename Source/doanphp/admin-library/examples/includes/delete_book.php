 <?php
    if (isset($_GET['delete_book'])) {
        $sql = "delete from bookoflibrary where BOOK_ID=$bookid";

        if ($conn->query($sql) === TRUE) {
            echo $bookid;

            echo "<script>alert('Successful Delete')</script>";

            echo "<script>window.open('manage.php?view_books','_self')</script>";
        }
        else
            echo "<script>alert('$conn->error')</script>";
        }
    ?>