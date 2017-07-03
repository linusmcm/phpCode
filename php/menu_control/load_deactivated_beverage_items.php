<?php
/////////////////////////////////////////////////////
//error reporting
/////////////////////////////////////////////////////
error_reporting (E_ALL ^ E_NOTICE);
/////////////////////////////////////////////////////
//variable declaration
/////////////////////////////////////////////////////
$active = "N";
$index = 0;
$bm_item_code = Array();
$bm_display_name  = Array();
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
$bc_sub_category_code = $_POST['bc_sub_category_code'];
$bc_category_code = $_POST['bc_category_code'];
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("service", $link);
/////////////////////////////////////////////////////
//datbase query
$result = mysql_query("SELECT * FROM menu_master WHERE mi_sub_category_code = '$bc_sub_category_code' AND mi_category = '$bc_category_code' AND mi_active_flag = '$active' ORDER BY mi_display_name ")or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());
/////////////////////////////////////////////////////

/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
while($row = mysql_fetch_array($result))
	{
			$bm_item_code[$index] = ($row['item_code']);
			$bm_display_name [$index] = strtolower ($row['mi_display_name']); 	
			$index++;
	}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
print "&bm_item_code=" . urlencode(utf8_encode(serialize($bm_item_code)));
print "&bm_display_name=" . urlencode(utf8_encode(serialize($bm_display_name)));
mysql_close($link)
?>
