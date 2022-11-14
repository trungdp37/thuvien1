<div class="card table-striped table-full-width">
    <div class="card-header ">
        <h4 class="card-title"><i class="fa fa-book-reader"></i>&nbsp;View Detail Card</h4>
    </div>
    <div class="card-body">
        <style>
            #myTableDetailCard td,th
            {
                text-align: center;
                vertical-align: middle;
            }
        </style>
    <table id="myTableDetailCard" class="table-active  table-striped table-bordered">
        <thead>
        <th>CARDID</th>
        <th>BOOKID</th>
        <th>DATERETURN</th>
        <th>BOOK_CALL</th>
        <th>BOOK_RETURN</th>
        <th>NOTES</th>
        <th>CLERK_RETURN</th>
        <th>MONEY</th>
        <th>Edit</th>
        </thead>
        <tbody>
        <?php
        $sql = "Select * from detailcallcard";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $cardid = $row["CARD_ID"];
            $cardbook = $row["BOOK_ID"];
            $carddatereturn = $row["CARD_DATE_RETURN"];
            $cardbookstatus = $row["CARD_BOOK_STATUS_CALL"];
            $cardbookreturn = $row["CARD_BOOK_STATUS_RETURN"];
            $cardnote = $row["NOTES"];
            $carduserreturn = $row["CLERK_RETURN"];
            $cardmoney = $row["MONEY"];
            echo " <tr>
        <td>$cardid</td>
        <td>$cardbook </td>
        <td>$carddatereturn</td>
        <td> $cardbookstatus </td>
        <td>$cardbookreturn </td>
        <td>$cardnote </td>
        <td>
          $carduserreturn
        </td>
         <td>
          $cardmoney
        </td>
             <td>
             <button type='submit' class='btn btn-info btn-fill'>   
             <a href='../examples/manage.php?delete_book'>
                <i class='fa fa-edit'></i> Edit
            </a>
            </button>
        </td>
        
    </tr>";
        }
        ?>
        </tbody>
    </table>
<script>
    $(document).ready(function () {
        $('#myTableDetailCard').dataTable();
    });
</script>
