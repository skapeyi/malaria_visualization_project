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

mysql_select_db($database_myDB, $myDB);
$query_feb = "SELECT SUM(feb) AS Total FROM `case`";
$feb = mysql_query($query_feb, $myDB) or die(mysql_error());
$row_feb = mysql_fetch_assoc($feb);
$totalRows_feb = mysql_num_rows($feb);

mysql_select_db($database_myDB, $myDB);
$query_mar = "SELECT SUM(mar) AS Total FROM `case`";
$mar = mysql_query($query_mar, $myDB) or die(mysql_error());
$row_mar = mysql_fetch_assoc($mar);
$totalRows_mar = mysql_num_rows($mar);

mysql_select_db($database_myDB, $myDB);
$query_apr = "SELECT SUM(apr) AS Total FROM `case`";
$apr = mysql_query($query_apr, $myDB) or die(mysql_error());
$row_apr = mysql_fetch_assoc($apr);
$totalRows_apr = mysql_num_rows($apr);

mysql_select_db($database_myDB, $myDB);
$query_nov = "SELECT SUM(nov) AS Total FROM `case`";
$nov = mysql_query($query_nov, $myDB) or die(mysql_error());
$row_nov = mysql_fetch_assoc($nov);
$totalRows_nov = mysql_num_rows($nov);

mysql_select_db($database_myDB, $myDB);
$query_dec = "SELECT SUM(`dec`) AS Total FROM `case`";
$dec = mysql_query($query_dec, $myDB) or die(mysql_error());
$row_dec = mysql_fetch_assoc($dec);
$totalRows_dec = mysql_num_rows($dec);

mysql_select_db($database_myDB, $myDB);
$query_jan = "SELECT SUM(jan) AS Total FROM `case`";
$jan = mysql_query($query_jan, $myDB) or die(mysql_error());
$row_jan = mysql_fetch_assoc($jan);
$totalRows_jan = mysql_num_rows($jan);
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
                type: 'column',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Total Number of Malaria Cases in Quarters',
                x: -20 //center
            },
            subtitle: {
                text: 'Source: MVP',
                x: -20
            },
            xAxis: {
                categories: ['November-January','February-March']
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
            series: [{
			name: 'Uganda',
			data: [<?php echo ($row_nov['Total']+$row_dec['Total']+$row_jan['Total']); ?>,<?php echo ($row_feb['Total']+$row_mar['Total']+$row_apr['Total']); ?>]}
			]
        });
    });
    
});
</script>
</head>
<body onload="doOnLoad();">
<?php include("include/loadui.php");?>
<div id="obj">
<div id="container">
  <div class="container-inner-data">
    <p><span class="container-inner-data-title">Malaria Visualization Project</span><span class="information">Data analysis by quarters</span></p>
    <div id="general" style="width: 1200px; height: 400px; margin: 0 auto"></div>
    </div>
</div>
</div>
</body>
</html>
<?php
mysql_free_result($feb);

mysql_free_result($mar);

mysql_free_result($apr);

mysql_free_result($nov);

mysql_free_result($dec);

mysql_free_result($jan);
?>