<?php require_once('Connections/myDB.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$r_data = "-1";
if (isset($_GET['m'])) {
  $r_data = $_GET['m'];
}
mysql_select_db($database_myDB, $myDB);
$query_data = sprintf("SELECT `case`.feb, `case`.mar, `case`.apr, `case`.nov, `case`.`dec`, `case`.jan, district.name FROM `case`, district WHERE district.district_id=`case`.district_id AND district.district_id=%s", GetSQLValueString($r_data, "int"));
$data = mysql_query($query_data, $myDB) or die(mysql_error());
$row_data = mysql_fetch_assoc($data);
$totalRows_data = mysql_num_rows($data);
?>
<script src="js/highcharts.js"></script>
<script type="text/javascript">
$(function () {
        $('#analysis').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Malaria Cases Per 1000, <?php echo $row_data['name']; ?>'
            },
            subtitle: {
                text: 'Source: Ministry of Health'
            },
            xAxis: [{
                categories: ['Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr']
            }],
            yAxis: [{ // Primary yAxis
                labels: {
                    format: '{value}',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                },
                title: {
                    text: 'Per 1000',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                }
            }, { // Secondary yAxis
                title: {
                    text: 'Malaria Cases',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                labels: {
                    format: '{value}',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                opposite: false
            }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: 0,
                verticalAlign: 'top',
                y: 100,
                floating: true
            },
            series: [{
                name: 'Malaria Cases per 1000',
                type: 'column',
                data: [<?php echo $row_data['nov']/1000; ?>,<?php echo $row_data['dec']/1000; ?>,<?php echo $row_data['jan']/1000; ?>,<?php echo $row_data['feb']/1000; ?>,<?php echo $row_data['mar']/1000; ?>,<?php echo $row_data['apr']/1000; ?>]
    
            }, {
                name: 'Line',
                type: 'spline',
                data: [<?php echo $row_data['nov']/1000; ?>,<?php echo $row_data['dec']/1000; ?>,<?php echo $row_data['jan']/1000; ?>,<?php echo $row_data['feb']/1000; ?>,<?php echo $row_data['mar']/1000; ?>,<?php echo $row_data['apr']/1000; ?>]
            }]
        });
    });
		</script>
<div id="container">
  <div class="container-inner-data">
    <p><span class="container-inner-data-title">MVP - Ministry of Health</span></p>
<div id="analysis" style="width: 1200px; height: 400px; margin: 0 auto"></div>
</div>
</div>
<?php
mysql_free_result($data);
?>