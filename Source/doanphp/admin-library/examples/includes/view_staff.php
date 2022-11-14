<div class="card table-striped table-full-width">
    <div class="card-header ">
        <h4 class="card-title"><i class="fa fa-book-reader"></i>&nbsp;View Staff</h4>
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
            <th>PHONE</th>
            <th>EMAIL</th>
            <th>ADDRESS</th>
            <th>IDENTITYCARD</th>
            <th>ROLE</th>
            <th>Delete</th>
            <th>Edit</th>
            <tbody>
            <?php
            $sql = "Select * from accountmanage";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["MANAGE_USERNAME"];
                    $password = $row["MANAGE_PASSWORD"];
                    $name = $row["MANAGE_NAME"];
                    $phone = $row["MANAGE_PHONE"];
                    $email = $row["MANAGE_EMAIL"];
                    $address = $row["MANAGE_ADDRESS"];
                    $role = $row["MANAGE_ROLE"];
                    $cmnd = $row["MANAGE_IDENTITYCARD"];
                    if ($role == 0) {
                        $role = "Admin";
                    } elseif ($role == 1) {
                        $role = "User Exchange";
                    } elseif ($role == 2) {
                        $role = "User Library";
                    }
                    echo " <tr>   
        <td>$name</td>
        <td>$phone </td>
        <td>$email</td>
        <td>$address </td>
        <td> $cmnd</td>
        <td>        
           $role
        </td>
         <td>
           <button type='submit' class='btn btn-info btn-fill '>  
            <a href='../examples/manage.php?delete_book'>
                <i class='fa fa-trash'></i> Delete
            </a></button>

         
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