<?php
/////////////////////////////////////////////////////
//error reporting
/////////////////////////////////////////////////////
error_reporting (E_ALL ^ E_NOTICE);
/////////////////////////////////////////////////////
//variable declaration
include '../includes/vitals.php';
/////////////////////////////////////////////////////
$link = mysql_connect($machine, $uName, $pCode);
/////////////////////////////////////////////////////
$active = "Y";
$index = 0;
$ss_section_id = Array();
$ss_section_name  = Array();
$ss_section_description  = Array();
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
mysql_select_db("bookings", $link);
/////////////////////////////////////////////////////
//datbase query
/////////////////////////////////////////////////////
$result = mysql_query("SELECT * FROM sections WHERE ss_section_active = '$active' ORDER BY ss_section_name ")or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////
	while($row = mysql_fetch_array($result))
	{
			$ss_section_id[$index] = ($row['ss_section_id']);
			$ss_section_name [$index] = ($row['ss_section_name']);
            $ss_section_description [$index] = ($row['ss_section_description']);
			$index++;
	}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////
print "&ss_section_id=" . urlencode(utf8_encode(serialize($ss_section_id)));
print "&ss_section_name=" . urlencode(utf8_encode(serialize($ss_section_name)));
print "&ss_section_description=" . urlencode(utf8_encode(serialize($ss_section_description)));
mysql_close($link);
?>
