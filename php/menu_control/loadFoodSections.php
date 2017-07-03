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
$food = "F";
$mc_category_code = Array();
$mc_category_description  = Array();
$mc_display_name = Array();
$mc_f_or_b = Array();
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("service", $link);
/////////////////////////////////////////////////////
//datbase query
$result = mysql_query("SELECT * FROM menu_item_categories WHERE mc_active_flag = '$active' AND mc_f_or_b_or_c = '$food'  ORDER BY mc_order_of_appearance");
/////////////////////////////////////////////////////

/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
while($row = mysql_fetch_array($result))
	{
			$mc_category_code[$index] = ($row['mc_category_code']);
			$mc_category_description [$index] = strtolower ($row['mc_category_description']);
			$mc_display_name[$index] = ($row['mc_display_name']); 
			$mc_f_or_b[$index] = ($row['mc_f_or_b']); 	
			$index++;
	}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
print "&mc_category_code=" . urlencode(utf8_encode(serialize($mc_category_code)));
print "&mc_category_description=" . urlencode(utf8_encode(serialize($mc_category_description)));
print "&mc_display_name=" . urlencode(utf8_encode(serialize($mc_display_name)));
print "&mc_f_or_b=" . urlencode(utf8_encode(serialize($mc_f_or_b)));
mysql_close($link)
?>
