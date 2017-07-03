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
$sy_vert_menu_id = "";
$loadText  = "";
$routineCall  = "";
/////////////////////////////////////////////////////
$sy_vert_menu_id = $_POST['sy_vert_menu_id'];
$loadText = $_POST['loadText'];
$routineCall = $_POST['routineCall'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("system", $link);
/////////////////////////////////////////////////////
//datbase query sys_vert_menu_id
$secondPart = (rand(0,999999));
$secondPart = $sy_vert_menu_id . $secondPart;
$result = mysql_query( "INSERT INTO  vertical_sub_buttons (vert_sub_descriptor, 	vert_sub_routine_call  , sys_vert_menu_id,  vert_sub_id ) VALUES ('$loadText', '$routineCall',  '$sy_vert_menu_id', '$secondPart' )");
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
//if (mysql_num_rows($result) == 0) 
//{
//    echo "No rows found, nothing to print so am exiting";
//    exit;
//}
$num_rows = mysql_num_rows($result);
echo "$num_rows Rows\n";

/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
mysql_close($link)
?>
