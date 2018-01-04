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

$currentPage = $_SERVER["PHP_SELF"];
$maxRows_district = 18;
$pageNum_district = 0;
if (isset($_GET['pageNum_district'])) {
  $pageNum_district = $_GET['pageNum_district'];
}
$startRow_district = $pageNum_district * $maxRows_district;

mysql_select_db($database_myDB, $myDB);
$query_district = "SELECT name, population, district.district_id FROM district";
$query_limit_district = sprintf("%s LIMIT %d, %d", $query_district, $startRow_district, $maxRows_district);
$district = mysql_query($query_limit_district, $myDB) or die(mysql_error());
$row_district = mysql_fetch_assoc($district);

if (isset($_GET['totalRows_district'])) {
  $totalRows_district = $_GET['totalRows_district'];
} else {
  $all_district = mysql_query($query_district);
  $totalRows_district = mysql_num_rows($all_district);
}
$totalPages_district = ceil($totalRows_district/$maxRows_district)-1;

$queryString_district = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_district") == false && 
        stristr($param, "totalRows_district") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_district = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_district = sprintf("&totalRows_district=%d%s", $totalRows_district, $queryString_district);
?>
<div id="container">
  <div class="container-inner-data">
  <span class="container-inner-data-title">Districts (<?php echo ($startRow_district + 1) ?> to <?php echo min($startRow_district + $maxRows_district, $totalRows_district) ?> of <?php echo $totalRows_district ?>)</span>
  <span class="information">Last received data update <?php echo date('dS-m-Y');?></span>
    <table width="100%" id="report">
      <tr>
        <td class="report-table-data-heads">Name</td>
        <td class="report-table-data-heads">Region</td>
        <td class="report-table-data-heads">Population</td>
        <td align="right" class="report-table-data-heads-charge">District level Malaria burden</td>
        <td align="right" class="report-table-data-heads-charge">Malaria Cases per 1000</td>
      </tr>
      <?php do { ?>
        <tr>
          <td class="report-table-data-lows"><?php echo $row_district['name']; ?></td>
          <td class="report-table-data-lows"><?php include('district-region.php');?></td>
          <td class="report-table-data-lows"><?php echo number_format($row_district['population']); ?></td>
          <td align="right" class="report-table-data-lows"><a href="dashboard?p=malaria.budden&m=<?php echo $row_district['district_id'];?>">Analyze</a></td>
          <td align="right" class="report-table-data-lows"><a href="dashboard?p=cases.1000&m=<?php echo $row_district['district_id'];?>">Open</a></td>
        </tr>
        <?php } while ($row_district = mysql_fetch_assoc($district)); ?>
    </table>
  
    <div class="lower-information">
      <table border="0">
          <tr>
            <td><?php if ($pageNum_district > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_district=%d%s", $currentPage, 0, $queryString_district); ?>">First</a>
              <?php } // Show if not first page ?>        </td>
            <td><?php if ($pageNum_district > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_district=%d%s", $currentPage, max(0, $pageNum_district - 1), $queryString_district); ?>">Previous</a>
              <?php } // Show if not first page ?>        </td>
            <td><?php if ($pageNum_district < $totalPages_district) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_district=%d%s", $currentPage, min($totalPages_district, $pageNum_district + 1), $queryString_district); ?>">Next</a>
              <?php } // Show if not last page ?>        </td>
            <td><?php if ($pageNum_district < $totalPages_district) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_district=%d%s", $currentPage, $totalPages_district, $queryString_district); ?>">Last</a>
              <?php } // Show if not last page ?>        </td>
          </tr>
      </table>
    </div>
  </div>
</div>
<?php
mysql_free_result($district);
?>