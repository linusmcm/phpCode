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
$ep_code = "";
//$es_code = "";
/////////////////////////////////////////////////////
$ep_code = $_POST['ep_code'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("system", $link);
/////////////////////////////////////////////////////
//datbase query
switch ($ep_code) 
{
    case"S":
        $result = mysql_query("SELECT * FROM menu_items WHERE sy_horiz_standard_user = '$active'");
        break;
    case "U":
    	$result = mysql_query("SELECT * FROM menu_items WHERE sy_horiz_supervisor = '$active'");
        break;
	case "M":
        $result = mysql_query("SELECT * FROM menu_items WHERE sy_horiz_management = '$active'");
        break;
	case "P":
        $result = mysql_query("SELECT * FROM menu_items WHERE sy_horiz_propritor = '$active'");
        break;
}
/////////////////////////////////////////////////////

/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
while($row = mysql_fetch_array($result))
	{
			$sy_horiz_menu_id[$index] = ($row['sy_horiz_menu_id']);
			$sy_horiz_menu_desc [$index] = strtolower ($row['sy_horiz_menu_desc']);
			$sy_horiz_routine_call[$index] = ($row['sy_horiz_routine_call']); 
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
