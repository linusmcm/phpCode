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
$mi_menu_code = Array();
$mi_display_name  = Array();
$mi_long_name =  Array(); 
$mi_category = Array();
$mi_price = Array();
$mi_description = Array();
$mi_culinary_terms = Array();
$mi_primary_producers = Array();
$mi_region = Array();
$mi_misc_details = Array();
$mi_garlic = Array();	 
$mi_lactose = Array();
$mi_kosher = Array();
$mi_halal = Array(); 
$mi_gluten_free = Array(); 	  	 
$mi_cook_type_marker = Array();
$mi_ingredients = Array();
$mi_egg_or_cheese = Array();
$mi_image = Array();
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
$mi_menu_code = $_POST['mi_menu_code'];
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("service", $link);
/////////////////////////////////////////////////////
//datbase query
//$result = mysql_query("SELECT * FROM menu_master WHERE mi_menu_code = '$mi_menu_code' ")or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());

$result = mysql_query("SELECT * FROM menu_master INNER JOIN food_master ON  menu_master.item_code = food_master.item_code WHERE menu_master.item_code = '$mi_menu_code' AND mi_active_flag = '$active' ")or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());
/////////////////////////////////////////////////////

/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
while($row = mysql_fetch_array($result))
	{
			$mi_menu_code[$index] = ($row['item_code']);
			$mi_display_name[$index] = strtolower ($row['mi_display_name']);
			$mi_long_name[$index] = strtolower ($row['mi_long_name']); 
			$mi_category[$index] = ($row['mi_category']); 
			$mi_price[$index] = ($row['mi_price']); 
			$mi_description[$index] = ($row['fm_description']); 
			$mi_culinary_terms[$index] = ($row['fm_culinary_terms']);
			$mi_primary_producers[$index] = ($row['fm_primary_producers']);
			$mi_region[$index] = ($row['fm_region']);
			$mi_misc_details[$index] = ($row['fm_misc_details']);
			$mi_garlic[$index] = ($row['fm_garlic']);
			$mi_lactose[$index] = ($row['fm_lactose']);
			$mi_kosher[$index] = ($row['fm_kosher']);
			$mi_halal[$index] = ($row['fm_halal']);
			$mi_gluten_free[$index] = ($row['fm_gluten_free']);
			$mi_cook_type_marker[$index] = strtoupper($row['fm_cook_type_marker']); 	 
			$mi_ingredients[$index] = ($row['fm_ingredients']); 
			$mi_egg_or_cheese[$index] = ($row['fm_egg_or_cheese']); 
			$mi_image[$index] = ($row['fm_image']); 
			
			
			
			$index++;
	}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
print "&mi_menu_code=" . urlencode(utf8_encode(serialize($mi_menu_code)));
print "&mi_display_name=" . urlencode(utf8_encode(serialize($mi_display_name)));
print "&mi_long_name=" . urlencode(utf8_encode(serialize($mi_long_name)));
print "&mi_category=" . urlencode(utf8_encode(serialize($mi_category)));
print "&mi_price=" . urlencode(utf8_encode(serialize($mi_price)));
print "&mi_description=" . urlencode(utf8_encode(serialize($mi_description)));
print "&mi_culinary_terms=" . urlencode(utf8_encode(serialize($mi_culinary_terms)));
print "&mi_primary_producers=" . urlencode(utf8_encode(serialize($mi_primary_producers)));
print "&mi_region=" . urlencode(utf8_encode(serialize($mi_region)));
print "&mi_garlic=" . urlencode(utf8_encode(serialize($mi_garlic)));
print "&mi_lactose=" . urlencode(utf8_encode(serialize($mi_lactose)));
print "&mi_kosher=" . urlencode(utf8_encode(serialize($mi_kosher)));
print "&mi_halal=" . urlencode(utf8_encode(serialize($mi_halal)));
print "&mi_gluten_free=" . urlencode(utf8_encode(serialize($mi_gluten_free)));
print "&mi_cook_type_marker=" . urlencode(utf8_encode(serialize($mi_cook_type_marker)));
print "&mi_ingredients=" . urlencode(utf8_encode(serialize($mi_ingredients)));
print "&mi_egg_or_cheese=" . urlencode(utf8_encode(serialize($mi_egg_or_cheese)));
print "&mi_image=" . urlencode(utf8_encode(serialize($mi_image)));
print "&mi_misc_details=" . urlencode(utf8_encode(serialize($mi_misc_details)));
mysql_close($link)
?>
