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
$query_kara = "SELECT SUM(`case`.average) AS Total FROM `case` WHERE `case`.region_id=1";
$kara = mysql_query($query_kara, $myDB) or die(mysql_error());
$row_kara = mysql_fetch_assoc($kara);
$totalRows_kara = mysql_num_rows($kara);

mysql_select_db($database_myDB, $myDB);
$query_westnile = "SELECT SUM(`case`.average) AS Total FROM `case` WHERE `case`.region_id=2";
$westnile = mysql_query($query_westnile, $myDB) or die(mysql_error());
$row_westnile = mysql_fetch_assoc($westnile);
$totalRows_westnile = mysql_num_rows($westnile);

mysql_select_db($database_myDB, $myDB);
$query_north = "SELECT SUM(`case`.average) AS Total FROM `case` WHERE `case`.region_id=3";
$north = mysql_query($query_north, $myDB) or die(mysql_error());
$row_north = mysql_fetch_assoc($north);
$totalRows_north = mysql_num_rows($north);

mysql_select_db($database_myDB, $myDB);
$query_eastern = "SELECT SUM(`case`.average) AS Total FROM `case` WHERE `case`.region_id=4";
$eastern = mysql_query($query_eastern, $myDB) or die(mysql_error());
$row_eastern = mysql_fetch_assoc($eastern);
$totalRows_eastern = mysql_num_rows($eastern);

mysql_select_db($database_myDB, $myDB);
$query_eastcentral = "SELECT SUM(`case`.average) AS Total FROM `case` WHERE `case`.region_id=5";
$eastcentral = mysql_query($query_eastcentral, $myDB) or die(mysql_error());
$row_eastcentral = mysql_fetch_assoc($eastcentral);
$totalRows_eastcentral = mysql_num_rows($eastcentral);

mysql_select_db($database_myDB, $myDB);
$query_southwest = "SELECT SUM(`case`.average) AS Total FROM `case` WHERE `case`.region_id=6";
$southwest = mysql_query($query_southwest, $myDB) or die(mysql_error());
$row_southwest = mysql_fetch_assoc($southwest);
$totalRows_southwest = mysql_num_rows($southwest);

mysql_select_db($database_myDB, $myDB);
$query_central2 = "SELECT SUM(`case`.average) AS Total FROM `case` WHERE `case`.region_id=7";
$central2 = mysql_query($query_central2, $myDB) or die(mysql_error());
$row_central2 = mysql_fetch_assoc($central2);
$totalRows_central2 = mysql_num_rows($central2);

mysql_select_db($database_myDB, $myDB);
$query_central1 = "SELECT SUM(`case`.average) AS Total FROM `case` WHERE `case`.region_id=8";
$central1 = mysql_query($query_central1, $myDB) or die(mysql_error());
$row_central1 = mysql_fetch_assoc($central1);
$totalRows_central1 = mysql_num_rows($central1);

mysql_select_db($database_myDB, $myDB);
$query_western = "SELECT SUM(`case`.average) AS Total FROM `case` WHERE `case`.region_id=9";
$western = mysql_query($query_western, $myDB) or die(mysql_error());
$row_western = mysql_fetch_assoc($western);
$totalRows_western = mysql_num_rows($western);

mysql_select_db($database_myDB, $myDB);
$query_kla = "SELECT SUM(`case`.average) AS Total FROM `case` WHERE `case`.region_id=10";
$kla = mysql_query($query_kla, $myDB) or die(mysql_error());
$row_kla = mysql_fetch_assoc($kla);
$totalRows_kla = mysql_num_rows($kla);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                text: 'Malaria Cases by Region',
                x: -20 //center
            },
            subtitle: {
                text: 'Source: MVP',
                x: -20
            },
            xAxis: {
                categories: ['Karamoja','West Nile','North','Eastern','East Central','South West','Central 2','Central 1','Western','Kampala']
            },
            yAxis: {
                title: {
                    text: 'Cases per 1000'
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
			data: [<?php echo $row_kara['Total']; ?>,<?php echo $row_westnile['Total']; ?>,<?php echo $row_north['Total']; ?>,<?php echo $row_eastern['Total']; ?>,<?php echo $row_eastcentral['Total']; ?>,<?php echo $row_southwest['Total']; ?>,<?php echo $row_central2['Total']; ?>,<?php echo $row_central1['Total']; ?>,<?php echo $row_western['Total']; ?>,<?php echo $row_kla['Total']; ?>],
			color: 'green'}
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
    <p><span class="container-inner-data-title">Malaria Visualization Project</span></p>
    <div id="general" style="width: 1200px; height: 400px; margin: 0 auto"></div>
    </div>
</div>
</div>
</body>
</html>
<?php
mysql_free_result($kara);
mysql_free_result($westnile);
mysql_free_result($north);
mysql_free_result($eastern);
mysql_free_result($eastcentral);
mysql_free_result($southwest);
mysql_free_result($central2);
mysql_free_result($central1);
mysql_free_result($western);
mysql_free_result($kla);
?>