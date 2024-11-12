<?php
/*
#weekly report
*/
?>
<?php require_once(__DIR__.'/../header.php'); ?>
<?php include(__DIR__."/../vendor/fusioncharts/fusioncharts.php"); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Weekly Report</h3>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	
<?php
$query_user = "SELECT * FROM user WHERE approval=1 ORDER BY e_id";
$result_query_user = mysqli_query($conn, $query_user);
$result_count_user = mysqli_num_rows($result_query_user);


        /**
         *  Step 3: Create a `columnChart` chart object using the FusionCharts PHP class constructor. 
         *  Syntax for the constructor: `FusionCharts("type of * chart", "unique chart id", "width of chart", 
         *  "height of chart", "div id to render the chart", "data format", "data source")`
         */

  // If the query returns a valid response, prepare the JSON string
    // The `$arrData` array holds the chart attributes and data
    $arrData = array(
      "chart" => array(
                  "caption"=>"Weekly Report",
                  "subCaption"=>"Number of submitted files of last 7 days",
                  "theme"=>"ocean"
        )
    );

	$arrData["data"] = array();
	$range = date('Y-m-d', strtotime('-7 days'));
	$total = 0;

    // Push the data into the array
	while($row_query_user = mysqli_fetch_assoc($result_query_user)) {
	$count_student = "SELECT COUNT(s.id) AS nos FROM student s
				INNER JOIN assessment ON assessment.id=s.assessment_id
				WHERE (assessment.counselor_id=".$row_query_user['id']. " OR assessment.appointed_to=".$row_query_user['id'].") AND s.date >= '".$range."'";
	$result_count_student = mysqli_query($conn, $count_student);
	while($row_count_student = mysqli_fetch_assoc($result_count_student)) {
		array_push($arrData["data"], array(
          "label" => $row_query_user["name"],
          "value" => $row_count_student["nos"]
          )
      );
	  $total = $total + $row_count_student["nos"];
	}
	}	
	echo "<div style='margin-bottom:20px; font-size:18px;'><div class='label label-success'>Total Available: ".$total."</div></div>";
	
    /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

    $jsonEncodedData = json_encode($arrData);

    /*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

    $columnChart = new FusionCharts("column2D", "myFirstChart" , "100%", 300, "chart-1", "json", $jsonEncodedData);

    // Render the chart
    $columnChart->render();
?>
<div id="chart-1"><!-- Fusion Charts will render here--></div>

<div style="padding:50px"><hr></div>

<?php
$query_user1 = "SELECT * FROM user WHERE approval=1 ORDER BY e_id";
$result_query_user1 = mysqli_query($conn, $query_user1);
$result_count_user1 = mysqli_num_rows($result_query_user1);


        /**
         *  Step 3: Create a `columnChart` chart object using the FusionCharts PHP class constructor. 
         *  Syntax for the constructor: `FusionCharts("type of * chart", "unique chart id", "width of chart", 
         *  "height of chart", "div id to render the chart", "data format", "data source")`
         */

  // If the query returns a valid response, prepare the JSON string
    // The `$arrData` array holds the chart attributes and data
    $arrData1 = array(
      "chart" => array(
                  "caption"=>"Assessment Report",
                  "subCaption"=>"Number of assessment of last 7 days",
                  "theme"=>"ocean"
        )
    );

	$arrData1["data"] = array();
	$total1 = 0;
	
    // Push the data into the array
	while($row_query_user1 = mysqli_fetch_assoc($result_query_user1)) {
	$count_student1 = "SELECT COUNT(id) AS nos FROM assessment
				WHERE (counselor_id=".$row_query_user1['id']. " OR appointed_to=".$row_query_user1['id'].") AND date >= '".$range."'";
	$result_count_student1 = mysqli_query($conn, $count_student1);
	while($row_count_student1 = mysqli_fetch_assoc($result_count_student1)) {
		array_push($arrData1["data"], array(
          "label" => $row_query_user1["name"],
          "value" => $row_count_student1["nos"]
          )
      );
	  $total1 = $total1 + $row_count_student1["nos"];
	}
	}
	echo "<div style='margin-bottom:20px; font-size:18px;'><div class='label label-success'>Total Available: ".$total1."</div></div>";
	
    /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

    $jsonEncodedData1 = json_encode($arrData1);

    /*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

    $columnChart1 = new FusionCharts("column2D", "assessment" , "100%", 300, "chart-2", "json", $jsonEncodedData1);

    // Render the chart
    $columnChart1->render();
    ?>
<div id="chart-2"><!-- Fusion Charts will render here--></div>
</div>
<!-- /#page-wrapper -->

<?php require_once(__DIR__.'/../footer.php'); ?>
<script>
$(document).ready(function(){
    $(".raphael-group-117-creditgroup").hide();
	$(".raphael-group-104-creditgroup").click(function(){
        $(this).hide();
    });
});
</script>