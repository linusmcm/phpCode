<?php
/////////////////////////////////////////////////////
//error reporting
$activate = "Y";
/////////////////////////////////////////////////////
error_reporting (E_ALL ^ E_NOTICE);
//////////////////////////////////////////////////////
//variable declaration////////////////////////////
/////////////////////////////////////////////////////
$loadText = $_POST['loadText'];
$da_code = $_POST['da_code'];
$rt_table_description = $_POST['rt_table_description'];
$rt_table_num = $_POST['rt_table_num'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("system", $link);
/////////////////////////////////////////////////////
//datbase query sys_vert_menu_id
$result = mysql_query("UPDATE restaurant_table SET rt_table_description = '$rt_table_description', rt_table_display = '$loadText' WHERE rt_table_num = '$rt_table_num' AND rt_table_location = '$da_code' ") or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());
/////////////////////////////////////////////////////
mysql_close($link)
?>
