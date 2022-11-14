<div class="card table-striped table-full-width">
    <div class="card-header ">
        <h4 class="card-title"><i class="fa fa-book-reader"></i>&nbsp;View Books</h4>
    </div>
    <div class="card-body">
        <style>
            #myTableBook td,th
            {
                text-align: center;
                vertical-align: middle;
            }
        </style>
        <table id="myTableBook" class="table-active table-striped table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Image</th>
                <th>Description</th>
                <th>Cost</th>
                <th>Number</th>
                <th>Detail</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "Select * from bookoflibrary";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $bookid = $row["BOOK_ID"];
                $namebook = $row["BOOK_NAME"];
                $booktype = $row["BOOK_TYPE"];
                $bookimg = $row["BOOK_IMAGE"];
                $bookdescription = $row["DESCRIPTION"];
                $bookcost = $row["BOOK_COST"];
                $booknumber = $row["BOOK_NUMBER"];
                echo " <tr>
        <td>$namebook</td>
        <td>$booktype </td>
        <td><img src='$bookimg' width='40' height='30' class='img-fluid' /></td>
        <td> $bookdescription </td>
        <td>$bookcost </td>
        <td>$booknumber </td>
        <td>
             <button type='submit' class='btn btn-info btn-fill'>   
             <a href='../examples/manage.php?edit_book=".$bookid."'>
                <i class='fa fa-info'></i> Detail
            </a>
            </button>
</form>
        </td>
        
    </tr> </tbody>";
            }
            ?>
        </table>
        <script>
            $(document).ready(function () {
                $('#myTableBook').dataTable();
            });
        </script>