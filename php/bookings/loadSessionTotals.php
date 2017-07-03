<?php
/////////////////////////////////////////////////////
//error reporting
/////////////////////////////////////////////////////
error_reporting (E_ALL ^ E_NOTICE);
/////////////////////////////////////////////////////
include '../includes/vitals.php';
/////////////////////////////////////////////////////
$link = mysql_connect($machine, $uName, $pCode);
mysql_select_db("bookings", $link);
/////////////////////////////////////////////////////
$active = "Y";
$index = 0;
$lunch = "LU";
$dinner = "DN";
$breakfast = "BF";
$other = "OT";
$dinnerCount = Array();
$lunchCount = Array();
$bFastCount = Array();
$otherCount = Array();
$marker = Array();
$marker[0] = 'no';
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
$date_str = $_REQUEST['dateStr'];
$month_str = $_REQUEST['monthStr'];
$year_str = $_REQUEST['yearStr'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
$rm_reservation_date = date("Y:m:d", mktime(0,0,0,$month_str,$date_str,$year_str));
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
$result = mysql_query("SELECT rm_num_pax FROM reservations WHERE rm_reservation_date  = '$rm_reservation_date' AND rm_reservation_session = '$dinner'")or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());

$temp = 0;
$sessionCount = 0;
while($row = mysql_fetch_array($result))
	{
			$temp = $row['rm_num_pax'];
			$sessionCount = $sessionCount + $temp;
			$index++;
	}
if($sessionCount == 0)
	{
	$dinnerCount[0] = "";
	}
else
	{
	$dinnerCount[0] = $sessionCount. " -- dinner ";
	$marker[0] = 'yes';
	}
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
$result = mysql_query("SELECT rm_num_pax FROM reservations WHERE rm_reservation_date  = '$rm_reservation_date' AND rm_reservation_session = '$lunch'")or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());

$temp = 0;
$sessionCount = 0;
while($row = mysql_fetch_array($result))
	{	
			$temp = $row['rm_num_pax'];
			$sessionCount = $sessionCount + $temp;
			$index++;
	}
if($sessionCount == 0)
	{
	$lunchCount[0] = "";
	}
else
	{
	$lunchCount[0] = $sessionCount. " -- lunch ";
	$marker[0] = 'yes';
	}
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
$result = mysql_query("SELECT rm_num_pax FROM reservations WHERE rm_reservation_date  = '$rm_reservation_date' AND rm_reservation_session = '$breakfast'")or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());

$temp = 0;
$sessionCount = 0;
while($row = mysql_fetch_array($result))
	{	
			$temp = $row['rm_num_pax'];
			$sessionCount = $sessionCount + $temp;
			$index++;
	}
if($sessionCount == 0)
	{
	$bFastCount[0] = "";
	}
else
	{
	$bFastCount[0] = $sessionCount. " -- bFast ";
	$marker[0] = 'yes';
	}
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
$result = mysql_query("SELECT rm_num_pax FROM reservations WHERE rm_reservation_date  = '$rm_reservation_date' AND rm_reservation_session = '$other'")or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());

$temp = 0;
$sessionCount = 0;
while($row = mysql_fetch_array($result))
	{	
			$temp = $row['rm_num_pax'];
			$sessionCount = $sessionCount + $temp;
			$index++;
	}
if($sessionCount == 0)
	{
	$otherCount[0] = "";
	}
else
	{
	$otherCount[0] = $sessionCount. " -- function ";
	$marker[0] = 'yes';
	}
/////////////////////////////////////////////////////
print "&dinnerCount=" . urlencode(utf8_encode(serialize($dinnerCount)));
print "&lunchCount=" . urlencode(utf8_encode(serialize($lunchCount)));
print "&bFastCount=" . urlencode(utf8_encode(serialize($bFastCount)));
print "&otherCount=" . urlencode(utf8_encode(serialize($otherCount)));
print "&marker=" . urlencode(utf8_encode(serialize($marker)));							
mysql_close($link);
?>