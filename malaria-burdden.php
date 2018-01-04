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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Malaria Visualization Project (MVP)</title>
<link rel="shortcut icon" href="media/khtik.png">
<script type="text/javascript" src="js/import.js"></script>
<link href="css/import.css" rel="stylesheet" type="text/css" />
<script src="js/highcharts.js"></script>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'general',
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Malaria Analysis for <?php echo $row_data['name']; ?>',
                x: -20 //center
            },
            subtitle: {
                text: 'Source: Ministry of Health',
                x: -20
            },
            xAxis: {
                categories: ['November','December','January','February','March','April']
            },
            yAxis: {
                title: {
                    text: 'Figures'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [
			<?php do { ?>{
			name: 'Uganda',
			data: [<?php echo $row_data['nov']; ?>,<?php echo $row_data['dec']; ?>,<?php echo $row_data['jan']; ?>,<?php echo $row_data['feb']; ?>,<?php echo $row_data['mar']; ?>,<?php echo $row_data['apr']; ?>]},
			<?php } while ($row_data = mysql_fetch_assoc($data)); ?>
			]
        });
    });
    
});
</script>
<div id="container">
  <div class="container-inner-data">
  <span class="container-inner-data-title">Malaria Visualization Project</span>
    </div>
    <div id="general" style="height: 400px; width: 1200px; margin: 0 auto"></div>
</div>
</div>
<?php
mysql_free_result($data);
?>