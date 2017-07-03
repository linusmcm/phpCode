<?php
/////////////////////////////////////////////////////
//error reporting
/////////////////////////////////////////////////////
error_reporting (E_ALL ^ E_NOTICE);
/////////////////////////////////////////////////////
//variable declaration
/////////////////////////////////////////////////////
$active = "N";
$index = 0;
$rt_table_description = Array();
$rt_table_display = Array();
$rt_table_num = Array();
/////////////////////////////////////////////////////
$da_code = $_POST['da_code'];
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("system", $link);
/////////////////////////////////////////////////////
//datbase query
/////////////////////////////////////////////////////
$result = mysql_query("SELECT * FROM restaurant_table WHERE rt_table_location = '$da_code' AND rt_table_active = '$active' ORDER BY rt_table_display ")or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());
/////////////////////////////////////////////////////
//
/////////////////////////////////////////////////////	
	while($row = mysql_fetch_array($result))
	{
			$rt_table_description[$index] = ($row['rt_table_description']);
			$rt_table_display[$index] = ($row['rt_table_display']);
			$rt_table_num[$index] = ($row['rt_table_num']); 
			$index++;
	}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
print "&rt_table_description=" . urlencode(utf8_encode(serialize($rt_table_description)));
print "&rt_table_display=" . urlencode(utf8_encode(serialize($rt_table_display)));
print "&rt_table_num=" . urlencode(utf8_encode(serialize($rt_table_num)));
mysql_close($link)
?>
