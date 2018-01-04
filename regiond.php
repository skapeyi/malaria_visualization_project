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
		<script type="text/javascript">
$(function () {

    Highcharts.data({
        csv: document.getElementById('tsv').innerHTML,
        itemDelimiter: '\t',
        parsed: function (columns) {

            var brands = {},
                brandsData = [],
                versions = {},
                drilldownSeries = [];
            
            // Parse percentage strings
            columns[1] = $.map(columns[1], function (value) {
                if (value.indexOf('%') === value.length - 1) {
                    value = parseFloat(value);
                }
                return value;
            });

            $.each(columns[0], function (i, name) {
                var brand,
                    version;

                if (i > 0) {

                    // Remove special edition notes
                    name = name.split(' -')[0];

                    // Split into brand and version
                    version = name.match(/([0-9]+[\.0-9x])/);
                    if (version) {
                        version = version[0];
                    }
                    brand = name.replace(version, '');

                    // Create the main data
                    if (!brands[brand]) {
                        brands[brand] = columns[1][i];
                    } else {
                        brands[brand] += columns[1][i];
                    }

                    // Create the version data
                    if (version !== null) {
                        if (!versions[brand]) {
                            versions[brand] = [];
                        }
                        versions[brand].push(['District Code: ' + version, columns[1][i]]);
                    }
                }
                
            });

            $.each(brands, function (name, y) {
                brandsData.push({ 
                    name: name, 
                    y: y,
                    drilldown: versions[name] ? name : null
                });
            });
            $.each(versions, function (key, value) {
                drilldownSeries.push({
                    name: key,
                    id: key,
                    data: value
                });
            });

            // Create the chart
            $('#analysis').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Malaria Cases, Districts in Region Analysis'
                },
                subtitle: {
                    text: 'Source: MVP'
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Malaria Cases'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true
                            //format: '{point.y:.c3f}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                }, 

                series: [{
                    name: 'Regions',
                    colorByPoint: true,
                    data: brandsData
                }],
                drilldown: {
                    series: drilldownSeries
                }
            })

        }
    });
});

		</script>
<script src="js/highcharts.js"></script>
<script src="js/modules/data.js"></script>
<script src="js/modules/drilldown.js"></script>
</head>
<body onload="doOnLoad();">
<?php include("include/loadui.php");?>
<div id="obj">
<div id="container">
  <div class="container-inner-data">
    <p><span class="container-inner-data-title">Malaria Visualization Project</span><span class="information">Region-District Case Analysis</span></p>
<div id="analysis" style="width: 1200px; height: 400px; margin: 0 auto"></div>
<pre id="tsv" style="display:none">Regions	Malaria Cases
Karamoja 00	4362%
Karamoja 11	1395%
Karamoja 22	11761%
Karamoja 33	6527%
Karamoja 44	4945%
Karamoja 55	5852%
West Nile 2014	4924%
North 2014	59874%
Eastern 2014	190641%
East Central 2014	154337%
South West 2014	118292%
Central One 2014	84190%
Central Two 2014	97999%
Western 2014	110148%
Kampala 2014	22678%
</pre>
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