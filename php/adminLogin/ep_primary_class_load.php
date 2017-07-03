<?php
/////////////////////////////////////////////////////
//error reporting    
error_reporting(E_ALL);
/////////////////////////////////////////////////////
//variable declaration
/////////////////////////////////////////////////////
$active = "Y";
$index = 0;
$ep_code = Array();
$ep_desc = Array();
$ep_display = Array();
$success = "angela";
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("payroll", $link);
/////////////////////////////////////////////////////
//datbase query
/////////////////////////////////////////////////////
$result = mysql_query("SELECT * FROM ep_primary_class WHERE ep_active = '$active' ");
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
	while($row = mysql_fetch_array($result))
	{
			$ep_code[$index] = strtoupper ($row['ep_code']);
			$ep_desc[$index] = strtoupper ($row['ep_desc']);
			$ep_display[$index] = strtolower ($row['ep_display']);
			$index++;
	}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
print "ep_code=" . urlencode(utf8_encode(serialize($ep_code)));
print "&ep_desc=" . urlencode(utf8_encode(serialize($ep_desc)));
print "&ep_display=" . urlencode(utf8_encode(serialize($ep_display)));
mysql_close($link)
?>