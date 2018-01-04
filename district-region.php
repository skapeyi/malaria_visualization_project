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

$r_region = "-";
if (isset($row_district['district_id'])) {
  $r_region = $row_district['district_id'];
}
mysql_select_db($database_myDB, $myDB);
$query_region = sprintf("SELECT `case`.district_id, region.name FROM `case`, region WHERE `case`.region_id=region.region_id AND `case`.district_id=%s", GetSQLValueString($r_region, "int"));
$region = mysql_query($query_region, $myDB) or die(mysql_error());
$row_region = mysql_fetch_assoc($region);
$totalRows_region = mysql_num_rows($region);
?>
<?php echo $row_region['name']; ?>
<?php
mysql_free_result($region);
?>