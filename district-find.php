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

$r_case = "-1";
if (isset($_POST['dist'])) {
  $r_case = $_POST['dist'];
}
mysql_select_db($database_myDB, $myDB);
$query_case = sprintf("SELECT district.code, `case`.feb, `case`.mar, `case`.apr, district.population, region.name, `case`.nov, `case`.`dec`, `case`.jan, `case`.Q4, `case`.Q5, `case`.average, district.district_id FROM district, `case`, region WHERE district.district_id=`case`.district_id AND region.region_id=`case`.region_id AND district.name LIKE %s", GetSQLValueString("%" . $r_case . "%", "text"));
$case = mysql_query($query_case, $myDB) or die(mysql_error());
$row_case = mysql_fetch_assoc($case);
$totalRows_case = mysql_num_rows($case);
?>
<?php if ($row_case['code']!="") { ?>
<span class="empty"><?php echo $totalRows_case ?> records matched for <?php echo $r_case;?> district</span>
      <table width="100%" id="report">
      <tr>
        <td class="report-table-data-heads">District Code</td>
        <td class="report-table-data-heads">Feb</td>
        <td class="report-table-data-heads">Mar</td>
        <td class="report-table-data-heads">Apr</td>
        <td class="report-table-data-heads">Population</td>
        <td class="report-table-data-heads">Region</td>
        <td class="report-table-data-heads">Nov</td>
        <td class="report-table-data-heads">Dec</td>
        <td class="report-table-data-heads">Jan</td>
        <td class="report-table-data-heads">Q4</td>
        <td class="report-table-data-heads">Q5</td>
        <td class="report-table-data-heads">Average</td>
        <td align="right" class="report-table-data-heads-charge">Malaria burden</td>
      </tr>
      <?php do { ?>
        <tr>
          <td class="report-table-data-lows"><?php echo $row_case['code']; ?></td>
          <td class="report-table-data-lows"><?php echo number_format($row_case['feb']); ?></td>
          <td class="report-table-data-lows"><?php echo number_format($row_case['mar']); ?></td>
          <td class="report-table-data-lows"><?php echo number_format($row_case['apr']); ?></td>
          <td class="report-table-data-lows"><?php echo number_format($row_case['population']); ?></td>
          <td class="report-table-data-lows"><?php echo $row_case['name']; ?></td>
          <td class="report-table-data-lows"><?php echo number_format($row_case['nov']); ?></td>
          <td class="report-table-data-lows"><?php echo number_format($row_case['dec']); ?></td>
          <td class="report-table-data-lows"><?php echo number_format($row_case['jan']); ?></td>
          <td class="report-table-data-lows"><?php echo number_format($row_case['Q4']); ?></td>
          <td class="report-table-data-lows"><?php echo number_format($row_case['Q5']); ?></td>
          <td class="report-table-data-lows"><?php echo number_format($row_case['average']); ?></td>
          <td align="right" class="report-table-data-lows"><a href="dashboard?p=malaria.budden?m=<?php echo $row_case['district_id'];?>">Analyze</a></td>
        </tr>
        <?php } while ($row_case = mysql_fetch_assoc($case)); ?>
    </table>
<?php } else { ?>
<div class="empty">No record found for <?php echo $r_case;?> district</div> 
<?php } ?>
<?php
mysql_free_result($case);
?>