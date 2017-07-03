<?php
/////////////////////////////////////////////////////
//error reporting
/////////////////////////////////////////////////////
error_reporting (E_ALL ^ E_NOTICE);
//////////////////////////////////////////////////////
//variable declaration////////////////////////////
/////////////////////////////////////////////////////
$mc_category_code = $_POST['mc_category_code'];
$mi_long_name = $_POST['mi_long_name'];
$mi_display_name = $_POST['mi_display_name'];
$mi_price = $_POST['mi_price'];
$mi_description = $_POST['mi_description'];
$mi_culinary_terms = $_POST['mi_culinary_terms'];
$mi_primary_producers = $_POST['mi_primary_producers'];
$mi_region = $_POST['mi_region'];
$mi_misc_details = $_POST['mi_misc_details'];
$mi_garlic = $_POST['mi_garlic'];
$mi_lactose = $_POST['mi_lactose'];
$mi_kosher = $_POST['mi_kosher'];
$mi_halal = $_POST['mi_halal'];
$mi_gluten_free = $_POST['mi_gluten_free'];
$mi_cook_type_marker =  $_POST['mi_cook_type_marker'];
$mi_ingredients =  $_POST['mi_ingredients'];
$mi_egg_or_cheese =  $_POST['mi_egg_or_cheese'];
$mi_image =  $_POST['mi_image'];
$typeMarker  =  $_POST['typeMarker'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
print $mi_long_name;
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("service", $link);
/////////////////////////////////////////////////////
//datbase query sys_vert_menu_id
$mi_menu_code = $typeMarker . (rand(0,99999999));
$mi_price= number_format($mi_price, 2, '.', '');
/////////////////////////////////////////////////////
$result = mysql_query( "INSERT INTO menu_master (item_code, mi_long_name, mi_category, mi_display_name , mi_price, f_or_b_or_c, mi_sub_category_code) VALUES ('$mi_menu_code', '$mi_long_name', '$mc_category_code', '$mi_display_name', '$mi_price', '$typeMarker', '$typeMarker' )") or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());
/////////////////////////////////////////////////////
$result = mysql_query( "INSERT INTO food_master (item_code, fm_description, fm_culinary_terms, fm_primary_producers, fm_region, fm_misc_details, fm_garlic, fm_lactose, fm_kosher, fm_halal, fm_gluten_free, fm_cook_type_marker, fm_ingredients, fm_egg_or_cheese, fm_image) VALUES ('$mi_menu_code', '$mi_description', '$mi_culinary_terms', '$mi_primary_producers', '$mi_region', '$mi_misc_details', '$mi_garlic', '$mi_lactose',  '$mi_kosher', '$mi_halal', '$mi_gluten_free', '$mi_cook_type_marker', '$mi_ingredients',  '$mi_egg_or_cheese', '$mi_image')") or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno());
/////////////////////////////////////////////////////
mysql_close($link)

?>
