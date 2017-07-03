<?php
/////////////////////////////////////////////////////
//error reporting
/////////////////////////////////////////////////////
error_reporting (E_ALL ^ E_NOTICE);
/////////////////////////////////////////////////////
//variable declaration
/////////////////////////////////////////////////////
$active = "Y";
$index = 0;
$em_last_name = Array();
$em_first_name  = Array();
$em_id_number = Array();
//$ep_code = "";
//$es_code = "";
/////////////////////////////////////////////////////
$em_id_number = $_POST['em_id_number'];
$em_pwd = $_POST['em_pwd'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("payroll", $link);
/////////////////////////////////////////////////////
//datbase query
/////////////////////////////////////////////////////
$result = mysql_query("SELECT * FROM employee_master WHERE em_id_number = '$em_id_number'  AND  em_pwd  = '$em_pwd'");
/////////////////////////////////////////////////////
//pass records to array
$lock = "false";
/////////////////////////////////////////////////////	
	while($row = mysql_fetch_array($result))
	{
			$lock = "true";
			$em_last_name[$index] = strtolower ($row['em_last_name']);
			$em_first_name [$index] = strtolower ($row['em_first_name']);
			$em_id_number[$index] = strtolower ($row['em_id_number']);    
			$index++;
	}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
print "&em_last_name=" . urlencode(utf8_encode(serialize($em_last_name)));
print "&em_first_name=" . urlencode(utf8_encode(serialize($em_first_name)));
print "&em_id_number=" . urlencode(utf8_encode(serialize($em_id_number)));
mysql_close($link);
/////////////////////////////////////////////////////
//open system db
/////////////////////////////////////////////////////	
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("system", $link);
/////////////////////////////////////////////////////
//pass record into administration access
/////////////////////////////////////////////////////	
if($lock == "true")
	{
	$em_first = $em_first_name [0];
	$em_last = $em_last_name [0];
	$access_type = "granted";
	mysql_query( "INSERT INTO administration_access (em_first_name, em_last_name , em_code, access_type) VALUES ('$em_first', '$em_last', '$em_id_number', '$access_type')");	
	}
else
	{
	$em_first = $em_id_number;
	$em_last = $em_pwd;
	$access_type = "denied";
	mysql_query( "INSERT INTO administration_access (em_first_name, em_last_name , em_code, access_type) VALUES ('$em_first', '$em_last', '$em_id_number', '$access_type')");	
	}
mysql_close($link);
?>
