<div class="card table-striped table-full-width">
    <div class="card-header ">
        <h4 class="card-title"><i class="fa fa-book-reader"></i>&nbsp;View Students</h4>
    </div>
    <div class="card-body">
        <style>
            #myTable td,th
            {
                text-align: center;
                vertical-align: middle;
            }
        </style>
        <table id="myTable" class="table-active table-striped table-bordered">
            <thead>
            <th>NAME</th>
            <th>UNIVERSITY</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>PHONE</th>
            <th>ADDRESS</th>
            <th>LOSTBOOK</th>
            <th>Edit</th>
            <tbody>
            <?php
            $sql = "Select * from student";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $stuid = $row["STUDENT_ID"];
                    $stuname = $row["STUDENT_NAME"];
                    $stuuniversity = $row["UNIVERSITY"];
                    $stuemail = $row["STUDENT_EMAIL"];
                    $stupass = $row["STUDENT_PASSWORD"];
                    $stuphone = $row["STUDENT_PHONE"];
                    $stuaddress = $row["STUDENT_ADDRESS"];
                    $stulost = $row["STUDENT_LOSTBOOK"];
                    echo " <tr>
        <td>$stuname</td>
        <td>$stuuniversity </td>
        <td>$stuemail</td>
        <td> $stupass </td>
        <td>$stuphone </td>
        <td>$stuaddress </td>
        <td>
          $stulost
        </td>
         </td>
             <td>
             <button type='submit' class='btn btn-info btn-fill pull-right'>   
             <a href='../examples/manage.php?delete_book'>
                <i class='fa fa-edit'></i> Edit
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
            $('#myTable').dataTable();
        });
    </script>