<?php
include '../../database.php';

$sql="SELECT BOOK_ID,count(BOOK_ID) as sl FROM `detailcallcard` GROUP by BOOK_ID order by sl LIMIT 5";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $data = array("label"=> $row['BOOK_ID'], "y"=> $row['sl']);
    $dataPoints[] = $data;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Top 5 "
	},
	axisY: {
		title: "Number of Book"
	},
	data: [{
		type: "column",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
