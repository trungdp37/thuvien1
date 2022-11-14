<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Card</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        $id=$_GET['edit_call_card'];
                        $sql = "Select * from callcard where CARD_ID=$id";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $cardid = $row["CARD_ID"];
                                $cardstuid = $row["STUDENT_ID"];
                                $carddatecall = $row["CARD_DATE_CALL"];
                                $carddateexp = $row["CARD_DATE_EXP"];
                                $cardnumberbook = $row["CARD_NUMBER_BOOK_ID"];
                                $carduser = $row["CLERK"];
                            }
                        }
                        ?>
                        <form method="post">
                            <div class="row">
                                <div class="col-md-3 pr-1">
                                    <div class="form-group">
                                        <label>Id card</label>
                                        <input type="text" class="form-control" disabled=""
                                               placeholder="bookid" value="<?php echo $cardid
                                        ?>">
                                    </div>
                                </div>

                                <div class="col-md-3 pr-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">id student</label>
                                        <input type="text" class="form-control" name="cardstuid"
                                               value="<?php echo $cardstuid
                                               ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Date call card</label>
                                        <input type="date" class="form-control" name="carddatecall"
                                               value="<?php echo $carddatecall
                                               ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Date Exp</label>
                                        <input type="date" class="form-control" name="carddateexp"
                                               value="<?php echo $carddateexp
                                               ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 pr-1">
                                    <div class="form-group">
                                        <label>Number Book</label>
                                        <input type="number" class="form-control" name='cardnumberbook'
                                               value="<?php echo $cardnumberbook
                                               ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>CLERK</label>
                                        <input type="Text" class="form-control" disabled name="cardcost"
                                               value="<?php echo $carduser
                                               ?>">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="updateprofile" class="btn btn-info btn-fill pull-right">
                                Update Card
                            </button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_POST["updateprofile"])) {

                $cardstuid = $_POST["cardstuid"];
                $carddatecall = $_POST["carddatecall"];
                $carddateexp = $_POST["carddateexp"];
                $cardnumberbook = $_POST["cardnumberbook"];
                $cardcost = $_POST["cardcost"];
                $carduser = $_POST["carduser"];
                $sql = "Update callcard set STUDENT_ID='$cardstuid', CARD_DATE_CALL ='$carddatecall',CARD_DATE_EXP ='$carddateexp',CARD_NUMBER_BOOK_ID='$cardnumberbook',BOOK_COST='$cardcost' where CARD_ID ='$cardid' ";
                if ($conn->query($sql) == true) {
                    echo "<script>alert(' Successfully update ')</script>";
                    echo "<script>window.open('manage.php?view_call_card','_self')</script>";
                }


            }
            ?>

        </div>
    </div>
</div>