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
$B = "B";
$C = "C";
$bc_category_code = Array();
$bc_category_description  = Array();
$bc_display_name = Array();
$bc_f_or_b = Array();
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("service", $link);
/////////////////////////////////////////////////////
//datbase query
$result = mysql_query("SELECT * FROM menu_item_categories WHERE mc_active_flag = '$active' AND (mc_f_or_b_or_c = '$B' OR mc_f_or_b_or_c = '$C') ORDER BY mc_display_name") or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());;
/////////////////////////////////////////////////////

/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
while($row = mysql_fetch_array($result))
	{
			$bc_category_code[$index] = ($row['mc_category_code']);
			$bc_category_description [$index] = strtolower ($row['mc_category_description']);
			$bc_display_name[$index] = ($row['mc_display_name']); 
			$bc_f_or_b[$index] = ($row['mc_f_or_b_or_c']); 	
			$index++;
	}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
print "&bc_category_code=" . urlencode(utf8_encode(serialize($bc_category_code)));
print "&bc_category_description=" . urlencode(utf8_encode(serialize($bc_category_description)));
print "&bc_display_name=" . urlencode(utf8_encode(serialize($bc_display_name)));
print "&bc_f_or_b=" . urlencode(utf8_encode(serialize($bc_f_or_b)));
mysql_close($link)
?>
