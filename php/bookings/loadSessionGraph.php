<?php
/////////////////////////////////////////////////////
//error reporting
/////////////////////////////////////////////////////
error_reporting (E_ALL ^ E_NOTICE);
/////////////////////////////////////////////////////
include '../includes/vitals.php';
include '../includes/diningSessions.php';
//include_once( '../ofc-library/open-flash-chart.php' );
/////////////////////////////////////////////////////
$link = mysql_connect($machine, $uName, $pCode);
mysql_select_db("bookings", $link);
/////////////////////////////////////////////////////
$active = "Y";
$index = 0;
$timeArrayLarge = Array();
$paxCountArray = Array();
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
$date_str = $_REQUEST['dateStr'];
$month_str = $_REQUEST['monthStr'];
$year_str = $_REQUEST['yearStr'];
$controller = $_REQUEST['controller'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
$timeArrayLarge = loadHours($controller);
$rm_reservation_date = date("Y:m:d", mktime(0,0,0,$month_str,$date_str,$year_str));
///////////////////////////////////////////////////////
//////////////////////////////////////////////////////
$arrlength = count($timeArrayLarge);
///////////////////////////////////////////////////////
//////////////////////////////////////////////////////
for($i = 0; $i < $arrlength; $i++)
	{
	$temp = 0;
	$sessionCount = 0;
	$result = mysql_query("SELECT * FROM reservations WHERE rm_reservation_date  = '$rm_reservation_date' AND rm_reservation_hour = '$timeArrayLarge[$i]' ")or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());
	/////////////////////////////////////////////////////
	while($row = mysql_fetch_array($result))
		{
				
			$temp = $row['rm_num_pax'];
			$sessionCount = $sessionCount + $temp;
		}
	$paxCountArray[$i] = $sessionCount;
 
	}
///////////////////////////////////////////////////
///////////////////////////////////////////////////
///////////////////////////////////////////////////
$countMax = max($paxCountArray);
$countCeiling = round(max($paxCountArray), -1)+ 10;
///////////////////////////////////////////////////
print "&paxCountArray=" . urlencode(utf8_encode(serialize($paxCountArray)));
print "&timeArrayLarge=" . urlencode(utf8_encode(serialize($timeArrayLarge)));
print "&countMax=" . urlencode(utf8_encode(serialize($countMax)));
print "&countCeiling=" . urlencode(utf8_encode(serialize($countCeiling)));
print "&arrlength=" . urlencode(utf8_encode(serialize($arrlength)));
///////////////////////////////////////////////////
///////////////////////////////////////////////////
mysql_close($link);
?>


