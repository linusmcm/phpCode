<?php
/////////////////////////////////////////////////////
//error reporting
error_reporting (E_ALL ^ E_NOTICE);
/////////////////////////////////////////////////////
include '../includes/vitals.php';
/////////////////////////////////////////////////////
$link = mysql_connect($machine, $uName, $pCode);
/////////////////////////////////////////////////////
$active = "Y";
$index = 0;
$em_last_name = Array();
$em_first_name  = Array();
$em_id_number = Array();
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
mysql_select_db("payroll", $link);
/////////////////////////////////////////////////////
//datbase query
$yes = 'Y';
/////////////////////////////////////////////////////
$result = mysql_query("SELECT * FROM employee_master WHERE em_currently_active = '$yes' ORDER BY em_last_name, em_first_name");
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////
	while($row = mysql_fetch_array($result))
	{
			$em_last_name[$index] = strtolower ($row['em_last_name']);
			$em_first_name [$index] = strtolower ($row['em_first_name']);
			$em_id_number[$index] = strtolower ($row['em_code']);
			$index++;
	}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////
print "&em_last_name=" . urlencode(utf8_encode(serialize($em_last_name)));
print "&em_first_name=" . urlencode(utf8_encode(serialize($em_first_name)));
print "&em_id_number=" . urlencode(utf8_encode(serialize($em_id_number)));
mysql_close($link)
?>
