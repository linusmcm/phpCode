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
$vert_sub_descriptor = Array();
$vert_sub_code = Array();
$vert_sub_id = Array();
$special_code = Array();
$sy_vert_menu_id = "";
/////////////////////////////////////////////////////
$sy_vert_menu_id = $_POST['sy_vert_menu_id'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("system", $link);
/////////////////////////////////////////////////////
//datbase query sys_vert_menu_id
$result = mysql_query("SELECT * FROM vertical_sub_buttons WHERE sys_vert_menu_id = '$sy_vert_menu_id'");
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
while($row = mysql_fetch_array($result))
	{
			$vert_sub_descriptor[$index] = ($row['vert_sub_descriptor']);
			$vert_sub_routine_call[$index] = ($row['vert_sub_routine_call']);
			$vert_sub_id[$index] = ($row['vert_sub_id']);
			$special_code[$index] = ($row['special_code']); 
			$index++;
	}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
print "&vert_sub_descriptor=" . urlencode(utf8_encode(serialize($vert_sub_descriptor)));
print "&vert_sub_routine_call=" . urlencode(utf8_encode(serialize($vert_sub_routine_call)));
print "&vert_sub_id=" . urlencode(utf8_encode(serialize($vert_sub_id)));
print "&special_code=" . urlencode(utf8_encode(serialize($special_code)));
mysql_close($link)
?>
