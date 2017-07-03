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
$bc_f_or_b = "";
$loadText  = "";
/////////////////////////////////////////////////////
$bc_f_or_b = $_POST['bc_f_or_b'];
$loadText = $_POST['loadText'];
$bc_category_code = $_POST['bc_category_code'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("service", $link);
/////////////////////////////////////////////////////
//datbase query sys_vert_menu_id
$secondPart = (rand(0,9999999999));
$secondPart = $bc_f_or_b . $secondPart;
$result = mysql_query( "INSERT INTO beverage_categories_sub (bc_sub_category_description, bc_sub_display_name,  bc_sub_category_code, bc_category_code ) VALUES ('$loadText',  '$loadText',  '$secondPart', '$bc_category_code')") or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());
/////////////////////////////////////////////////////
mysql_close($link)
?>
