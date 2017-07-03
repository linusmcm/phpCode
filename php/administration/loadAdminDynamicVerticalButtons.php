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
$sy_vert_menu_desc = Array();
$sy_vert_routine_call 	= Array();
$sy_vert_menu_id = Array();
$sy_horiz_menu_id = "";
/////////////////////////////////////////////////////
$sy_horiz_menu_id = $_POST['sy_horiz_menu_id'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("system", $link);
/////////////////////////////////////////////////////
//datbase query
$result = mysql_query("SELECT * FROM dynamic_menu_buttons WHERE sy_horiz_menu_id = '$sy_horiz_menu_id' ORDER BY order_of_apperance");
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	 ,
while($row = mysql_fetch_array($result))
	{
			$sy_vert_menu_desc[$index] = ($row['sy_vert_menu_desc']);
			$sy_vert_routine_call[$index] = ($row['sy_vert_routine_call ']);
			$sy_vert_menu_id[$index] = ($row['sy_vert_menu_id']); 
			$index++;
	}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
print "&sy_vert_menu_desc=" . urlencode(utf8_encode(serialize($sy_vert_menu_desc)));
print "&sy_vert_routine_call=" . urlencode(utf8_encode(serialize($sy_vert_routine_call)));
print "&sy_vert_menu_id=" . urlencode(utf8_encode(serialize($sy_vert_menu_id)));
mysql_close($link)
?>
