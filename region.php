<?php require_once('Connections/myDB.php'); ?>
<?php
mysql_select_db($database_myDB, $myDB);
$query_region = "SELECT name FROM region";
$region = mysql_query($query_region, $myDB) or die(mysql_error());
$row_region = mysql_fetch_assoc($region);
$totalRows_region = mysql_num_rows($region);
?>
<div id="container">
  <div class="container-inner-data">
    <span class="container-inner-data-title">Regions/<?php echo $totalRows_region ?></span>
    <span class="information">Last received data update <?php echo date('dS-m-Y');?></span>
    <table width="100%" id="report">
      <tr>
        <td class="report-table-data-heads">Region Name</td>
      </tr>
      <?php do { ?>
        <tr>
          <td><?php echo $row_region['name']; ?></td>
        </tr>
        <?php } while ($row_region = mysql_fetch_assoc($region)); ?>
    </table>
  </div>
</div>
<?php
mysql_free_result($region);
?>