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
$bc_sub_category_code = Array();
$bc_sub_category_description  = Array();
$bc_sub_display_name = Array();
$bc_sub_f_or_b = Array();
/////////////////////////////////////////////////////
$bc_category_code = $_POST['bc_category_code'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("service", $link);
/////////////////////////////////////////////////////
//datbase query
$result = mysql_query("SELECT * FROM beverage_categories_sub WHERE bc_category_code = '$bc_category_code'  AND bc_sub_active_flag = '$active' ORDER BY bc_sub_display_name");
/////////////////////////////////////////////////////

/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
while($row = mysql_fetch_array($result))
	{
			$bc_sub_category_code[$index] = ($row['bc_sub_category_code']);
			$bc_sub_category_description [$index] = strtolower ($row['bc_sub_category_description']);
			$bc_sub_display_name[$index] = ($row['bc_sub_display_name']); 
			$bc_sub_f_or_b[$index] = ($row['bc_sub_f_or_b']); 	
			$index++;
	}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
print "&bc_sub_category_code=" . urlencode(utf8_encode(serialize($bc_sub_category_code)));
print "&bc_sub_category_description=" . urlencode(utf8_encode(serialize($bc_sub_category_description)));
print "&bc_sub_display_name=" . urlencode(utf8_encode(serialize($bc_sub_display_name)));
print "&bc_sub_f_or_b=" . urlencode(utf8_encode(serialize($bc_sub_f_or_b)));
mysql_close($link)
?>
