<?php
include '../../database.php';

$sql = "SELECT STUDENT_ID,Sum(MONEY) as Money from callcard join detailcallcard on callcard.CARD_ID=detailcallcard.CARD_ID  group BY STUDENT_ID order by Money desc limit 5";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $data = array('y' => $row["Money"], 'label' => $row["STUDENT_ID"]);
    $dataPoints[] = $data;
}
?>
<script>
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Top 5"
            },
            axisY: {
                title: "Tiền Phạt (VND)",
                includeZero: true,
                prefix: "$",
                suffix: "k"
            },
            data: [{
                type: "bar",
                yValueFormatString: "$#,##0K",
                indexLabel: "{y}",
                indexLabelPlacement: "inside",
                indexLabelFontWeight: "bolder",
                indexLabelFontColor: "white",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>