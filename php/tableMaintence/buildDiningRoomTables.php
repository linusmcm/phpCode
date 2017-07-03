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
$loadText = $_POST['loadText'];
$da_code = $_POST['da_code'];
$rt_table_description = $_POST['rt_table_description'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////  
$link = mysql_connect("localhost", "root", "lm1112gs");  
mysql_select_db("system", $link);
/////////////////////////////////////////////////////
//datbase query sys_vert_menu_id
$tableNumber = "T" . (rand(0,9999));
$result = mysql_query( "INSERT INTO  restaurant_table(rt_table_num, rt_table_location, rt_table_display, rt_table_active, rt_table_description) VALUES ('$tableNumber', '$da_code', '$loadText', '$active', '$rt_table_description' )") or die( "An error has ocured: " .mysql_error (). ": error number:" .mysql_errno ());
/////////////////////////////////////////////////////
//pass records to array
$num_rows = mysql_num_rows($result);
echo "$num_rows Rows\n";
/////////////////////////////////////////////////////	
mysql_close($link)
?>
