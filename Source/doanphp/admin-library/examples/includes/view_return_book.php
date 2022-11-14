<div class="card table-striped table-full-width">
    <div class="card-header ">
        <h4 class="card-title"><i class="fa fa-book-reader"></i>&nbsp;View Return</h4>
    </div>

    <div class="card-body">
        <style>
            #myTableDetailCard td, th {
                text-align: center;
                vertical-align: middle;
            }
        </style>
        <table id="myTableDetailCard" class="table-active  table-striped table-bordered">
            <thead>
            <th>CARDID</th>
            <th>BOOKID</th>
            <th>BOOK_CALL</th>
            <th>BOOK_RETURN</th>

            <th>Return</th>
            </thead>
            <tbody>
            <?php
            $sql = "Select * from detailcallcard where  CARD_BOOK_STATUS_CALL=100 and CARD_DATE_RETURN is null ";
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
         <form method='post'>
        <td><input type='text' hidden name='cardid' value='$cardid'>$cardid</td>
        <td><input type='text' hidden name='bookid' value='$cardbook'>$cardbook </td>
        <td> $cardbookstatus </td>
        <td><input type='text' maxlength='20' size='10' name='bookreturn'> </td>
         <td>
             <button type='submit' name='Refund' class='btn btn-info btn-fill '>   
                 <i class='fa fa-edit'></i> Return
            </button>
        </td>   
        </form>
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
