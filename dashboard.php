<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<?php
error_reporting(0);
$m=$_GET['p'];
//common pages
if ($m=='mvp'){include('home.php');}
if ($m=='region'){include('region.php');}
if ($m=='district'){include('district.php');}
//search pages
if ($m=='search.case'){include('search-case.php');}
if ($m=='search.region'){include('search-region.php');}
if ($m=='search.district'){include('search-district.php');}
//visualiztion pages
if ($m=='malaria.budden'){include('malaria-budden.php');}
if ($m=='cases.1000'){include('cases-per1k.php');}

if ($m==''){
	include('home.php');
}
?>
</div>
</body>
</html>
