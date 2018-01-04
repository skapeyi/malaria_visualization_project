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
$query_month = "SELECT name FROM `month`";
$month = mysql_query($query_month, $myDB) or die(mysql_error());
$row_month = mysql_fetch_assoc($month);
$totalRows_month = mysql_num_rows($month);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Malaria Visualization Project (MVP)</title>
<link rel="shortcut icon" href="media/khtik.png">
<script type="text/javascript" src="js/import.js"></script>
<link href="css/import.css" rel="stylesheet" type="text/css" />
</head>
<body onload="doOnLoad();">
<?php include("include/loadui.php");?>
<div id="obj">
<div id="container">
  <div class="container-inner-data">
    <p><span class="container-inner-data-title">Malaria Visualization Project</span><span class="information">Months listed for reference</span></p>
    <p class="user-actiontext">Month Setting    </p>
    <table width="100%" id="report">
      <tr>
        <td class="report-table-data-heads">Month Name</td>
      </tr>
      <?php do { ?>
        <tr>
          <td class="report-table-data-lows"><?php echo $row_month['name']; ?></td>
        </tr>
        <?php } while ($row_month = mysql_fetch_assoc($month)); ?>
    </table>
    <div class="lower-information">
      <p><span class="openroute">First Quarter:</span> Jan, Feb, Mar</p>
      <p><span class="openroute">Last Quarter:</span> Nov, Dec, Jan</p>
      </div>
  </div>
</div>
</div>
</body>
</html>
<?php
mysql_free_result($month);
?>