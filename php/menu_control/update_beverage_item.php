<?php
/////////////////////////////////////////////////////
//error reporting
/////////////////////////////////////////////////////
error_reporting (E_ALL ^ E_NOTICE);
//////////////////////////////////////////////////////
//variable declaration////////////////////////////
/////////////////////////////////////////////////////
$bm_item_code = $_POST['bm_item_code'];
$bc_sub_category_code = $_POST['bc_sub_category_code'];
$bc_category_code = $_POST['bc_category_code'];
$bm_long_desc = $_POST['bm_long_desc'];
$bm_display_name = $_POST['bm_display_name'];
$bm_sale_price = $_POST['bm_sale_price'];
$bm_tasting_notes = $_POST['bm_tasting_notes'];
$bm_primary_producer = $_POST['bm_primary_producer'];
$bm_item_region = $_POST['bm_item_region'];
$bm_misc_info = $_POST['bm_misc_info'];
$bm_image = $_POST['bm_image'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("service", $link);
/////////////////////////////////////////////////////
//datbase query sys_vert_menu_id
$bm_sale_price= number_format($bm_sale_price, 2, '.', '');
/////////////////////////////////////////////////////
$result = mysql_query( "UPDATE menu_master  SET mi_long_name = '$bm_long_desc', mi_display_name = '$bm_display_name', mi_price = '$bm_sale_price' WHERE  item_code = '$bm_item_code' ") or die( "An error has ocured statement 1: " .mysql_error (). ":" .mysql_errno ());
/////////////////////////////////////////////////////
$result = mysql_query("UPDATE beverage_master SET bm_primary_producer = '$bm_primary_producer', bm_misc_info = '$bm_misc_info', bm_image = '$bm_image', bm_tasting_notes = '$bm_tasting_notes', bm_item_region = '$bm_item_region' WHERE  item_code = '$bm_item_code' ") or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());
/////////////////////////////////////////////////////
mysql_close($link)
?>
