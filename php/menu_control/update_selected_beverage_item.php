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
$bm_sub_category_code = Array();
$bm_category_code = Array();
$bm_long_desc = Array();
$bm_display_name = Array();
$bm_sale_price = Array();
$bm_tasting_notes = Array();
$bm_primary_producer = Array();
$bm_item_region = Array();
$bm_misc_info = Array();
$bm_image = Array();
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
$bm_item_code = $_POST['bm_item_code'];
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("service", $link);
/////////////////////////////////////////////////////
//datbase query
$result = mysql_query("SELECT * FROM menu_master INNER JOIN beverage_master ON  menu_master.item_code = beverage_master.item_code WHERE menu_master.item_code = '$bm_item_code' AND mi_active_flag = '$active' ")or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());
/////////////////////////////////////////////////////

////////////////////////////////////////////////////	

while($row = mysql_fetch_array($result))
	{
			$bm_sub_category_code[$index] = ($row['mi_sub_category_code ']);
			$bm_category_code[$index] = ($row['mi_category']);
			$bm_long_desc[$index] = ($row['mi_long_name']); 
			$bm_display_name[$index] = ($row['mi_display_name']); 
			$bm_sale_price[$index] = ($row['mi_price']); 
			$bm_tasting_notes[$index] = ($row['bm_tasting_notes']); 
			$bm_primary_producer[$index] = ($row['bm_primary_producer']);
			$bm_item_region[$index] = ($row['bm_item_region']);
			$bm_misc_info[$index] = ($row['bm_misc_info']);
			$bm_image[$index] = ($row['bm_image']);
			$index++;
	}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
print "&bm_sub_category_code=" . urlencode(utf8_encode(serialize($bm_sub_category_code)));
print "&bm_category_code=" . urlencode(utf8_encode(serialize($bm_category_code)));
print "&bm_long_desc=" . urlencode(utf8_encode(serialize($bm_long_desc)));
print "&bm_display_name=" . urlencode(utf8_encode(serialize($bm_display_name)));
print "&bm_sale_price=" . urlencode(utf8_encode(serialize($bm_sale_price)));
print "&bm_tasting_notes=" . urlencode(utf8_encode(serialize($bm_tasting_notes)));
print "&bm_primary_producer=" . urlencode(utf8_encode(serialize($bm_primary_producer)));
print "&bm_item_region=" . urlencode(utf8_encode(serialize($bm_item_region)));
print "&bm_misc_info=" . urlencode(utf8_encode(serialize($bm_misc_info)));
print "&bm_image=" . urlencode(utf8_encode(serialize($bm_image)));
mysql_close($link)
?>
