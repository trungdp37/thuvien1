<div class="card table-striped table-full-width">
    <div class="card-header ">
        <h4 class="card-title"><i class="fa fa-book-reader"></i>&nbsp;View Call Card</h4>
    </div>
    <div class="card-body">
        <style>
            #myTablecard td,th
            {
                text-align: center;
                vertical-align: middle;
            }
        </style>
        <table id="myTablecard" class="table-active table-striped table-bordered">
            <thead>
            <th>CARD_ID</th>
            <th>STUDENT_ID</th>
            <th>CARD_DATE_CALL</th>
            <th>CARD_DATE_EXP</th>
            <th>CARD_NUMBER_BOOK_ID</th>
            <th>CLERK</th>
            <th>Detail</th>
            </thead>
            <tbody>
            <?php
            $sql = "Select * from callcard where STATUS=1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $cardid = $row["CARD_ID"];
                    $cardstuid = $row["STUDENT_ID"];
                    $carddatecall = $row["CARD_DATE_CALL"];
                    $carddateexp = $row["CARD_DATE_EXP"];
                    $cardnumberbook = $row["CARD_NUMBER_BOOK_ID"];
                    $carduser = $row["CLERK"];
                    echo " <tr>
        <td>$cardid</td>
        <td>$cardstuid </td>
        <td>$carddatecall</td>
        <td> $carddateexp </td>
        <td>$cardnumberbook </td>
        <td>
          $carduser
        </td>
         <td>
             <button type='submit' class='btn btn-info btn-fill'>   
             <a href='../examples/manage.php?edit_call_card=".$cardid."'>
                <i class='fa fa-info'></i> Detail
            </a>
            </button>
        </td>
        
    </tr>";
                }
            }
            ?>

            </tbody>
        </table>
        <script>
            $(document).ready(function () {
                $('#myTablecard').dataTable();
            });
        </script>
