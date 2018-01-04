<?php require_once('Connections/myDB.php'); ?>
<?php
mysql_select_db($database_myDB, $myDB);
$query_region = "SELECT name FROM region";
$region = mysql_query($query_region, $myDB) or die(mysql_error());
$row_region = mysql_fetch_assoc($region);
$totalRows_region = mysql_num_rows($region);

mysql_select_db($database_myDB, $myDB);
$query_district = "SELECT name FROM district";
$district = mysql_query($query_district, $myDB) or die(mysql_error());
$row_district = mysql_fetch_assoc($district);
$totalRows_district = mysql_num_rows($district);

mysql_select_db($database_myDB, $myDB);
$query_case = "SELECT case_id FROM `case`";
$case = mysql_query($query_case, $myDB) or die(mysql_error());
$row_case = mysql_fetch_assoc($case);
$totalRows_case = mysql_num_rows($case);

mysql_select_db($database_myDB, $myDB);
$query_month = "SELECT name FROM `month`";
$month = mysql_query($query_month, $myDB) or die(mysql_error());
$row_month = mysql_fetch_assoc($month);
$totalRows_month = mysql_num_rows($month);
?>
<div id="container">
  <div class="container-inner-data"><span class="container-inner-data-title">Dashboard</span>
  <span class="information">Last received data update <?php echo date('dS-m-Y');?></span>
    <div id="welcome"></div>
    
    <div class="datasummary"><span class="alert">Uganda</span>
      <div class="line"></div>
      <table width="100%">
        <tr>
          <td class="report-table-data-heads">Region/s</td>
          <td class="report-table-data-heads">District/s</td>
        </tr>
        <tr>
          <td class="report-table-data-lows">&nbsp;<?php echo $totalRows_region ?> - <a href="dashboard?p=region">Open</a></td>
          <td class="report-table-data-lows">&nbsp;<?php echo $totalRows_district ?> - <a href="dashboard?p=district">Open</a></td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </div>
    </div>
</div>
<?php
mysql_free_result($region);
mysql_free_result($district);
mysql_free_result($case);
mysql_free_result($month);
?>