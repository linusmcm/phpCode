<?php
/////////////////////////////////////////////////////
//error reporting
$activate = "N";
/////////////////////////////////////////////////////
error_reporting (E_ALL ^ E_NOTICE);
//////////////////////////////////////////////////////
//variable declaration////////////////////////////
/////////////////////////////////////////////////////
$rt_table_num = $_POST['rt_table_num'];
$da_code = $_POST['da_code'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("system", $link);
/////////////////////////////////////////////////////
//datbase query sys_vert_menu_id
$result = mysql_query("UPDATE restaurant_table SET rt_table_active = '$activate' WHERE rt_table_num = '$rt_table_num' AND rt_table_location = '$da_code' ") or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());
/////////////////////////////////////////////////////
mysql_close($link)
?>