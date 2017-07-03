<?php
/////////////////////////////////////////////////////
//error reporting
/////////////////////////////////////////////////////
error_reporting (E_ALL ^ E_NOTICE);
//////////////////////////////////////////////////////
/////////////////////////////////////////////////////
include '../includes/sanitiser.php';
include '../includes/diningSessions.php';
include '../includes/vitals.php';
/////////////////////////////////////////////////////
$link = mysql_connect($machine, $uName, $pCode);
mysql_select_db("bookings", $link);
/////////////////////////////////////////////////////
$cancelledFlag = "Y";
/////////////////////////////////////////////////////
$day_str = $_REQUEST['dayStr'];
$date_str = $_REQUEST['dateStr'];
$month_str = $_REQUEST['monthStr'];
$year_str = $_REQUEST['yearStr'];
$rm_reservation_code = $_REQUEST['rm_reservation_code'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
$rm_reservation_date = date("Y:m:d", mktime(0,0,0,$month_str,$date_str,$year_str));
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
$result = mysql_query( "UPDATE reservations SET rm_cancelled_flag  = '$cancelledFlag' WHERE rm_reservation_code = '$rm_reservation_code' AND rm_reservation_date  = '$rm_reservation_date' ") or die( "An error has ocured statement 1: " .mysql_error (). ":" .mysql_errno ());
mysql_close($link)
?>
