<?php
/////////////////////////////////////////////////////
//error reporting
/////////////////////////////////////////////////////
error_reporting (E_ALL ^ E_NOTICE);
//////////////////////////////////////////////////////
//variable declaration////////////////////////////
/////////////////////////////////////////////////////
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
$typeMarker  =  $_POST['typeMarker'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("service", $link);
/////////////////////////////////////////////////////
//datbase query sys_vert_menu_id
$bm_item_code = $typeMarker . (rand(0,9999999999));
$bm_sale_price= number_format($bm_sale_price, 2, '.', '');
/////////////////////////////////////////////////////
$result = mysql_query( "INSERT INTO menu_master (item_code, mi_long_name, mi_category, mi_display_name, mi_price, f_or_b_or_c, mi_sub_category_code) VALUES ('$bm_item_code', '$bm_long_desc', '$bc_category_code', '$bm_display_name', '$bm_sale_price', '$typeMarker', '$bc_sub_category_code')") or die( "An error has ocured statement 1: " .mysql_error (). ":" .mysql_errno ());

/*
item_code 	
mi_long_name	 
mi_display_name 	 
mi_category	 
mi_price
mi_active_flag	  	 
f_or_b_or_c 
*/

/////////////////////////////////////////////////////
$result = mysql_query("INSERT INTO beverage_master (bm_category, bm_sub_category, bm_primary_producer, bm_misc_info, bm_image, bm_tasting_notes, bm_item_region, item_code) VALUES ('$bc_category_code', '$bc_sub_category_code', '$bm_primary_producer', '$bm_misc_info', '$bm_image',  '$bm_tasting_notes', '$bm_item_region', '$bm_item_code')") or die( "An error has ocured xs2: " .mysql_error (). ":" .mysql_errno ());
/////////////////////////////////////////////////////
mysql_close($link)
?>
