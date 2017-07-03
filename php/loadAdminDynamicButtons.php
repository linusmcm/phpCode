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
$sy_horiz_menu_id = Array();
$sy_horiz_menu_desc  = Array();
$sy_horiz_routine_call = Array();
//$ep_code = "";
//$es_code = "";
/////////////////////////////////////////////////////
$ep_code = $_POST['ep_code'];
$es_code = $_POST['es_code'];
/////////////////////////////////////////////////////
$em_classification = $ep_code . $es_code;
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("system", $link);
/////////////////////////////////////////////////////
//datbase query
/////////////////////////////////////////////////////
$result = mysql_query("SELECT * FROM menu_items")// WHERE em_classification = '$em_classification'  ORDER BY em_last_name ");
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
	while($row = mysql_fetch_array($result))
	{
			$sy_horiz_menu_id[$index] = strtolower ($row['sy_horiz_menu_id']);
			$sy_horiz_menu_desc [$index] = strtolower ($row['sy_horiz_menu_desc']);
			$sy_horiz_routine_call[$index] = strtolower ($row['sy_horiz_routine_call']); 
			$index++;
	}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
print "&sy_horiz_menu_id=" . urlencode(utf8_encode(serialize($sy_horiz_menu_id)));
print "&sy_horiz_menu_desc=" . urlencode(utf8_encode(serialize($sy_horiz_menu_desc)));
print "&sy_horiz_routine_call=" . urlencode(utf8_encode(serialize($sy_horiz_routine_call)));
mysql_close($link)
?>
