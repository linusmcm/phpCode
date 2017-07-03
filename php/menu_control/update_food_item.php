<?php
/////////////////////////////////////////////////////
//error reporting
/////////////////////////////////////////////////////
error_reporting (E_ALL ^ E_NOTICE);
//////////////////////////////////////////////////////
/////////////////////////////////////////////////////
include '../includes/vitals.php';
/////////////////////////////////////////////////////
$link = mysql_connect($machine, $uName, $pCode);
mysql_select_db("service", $link);
/////////////////////////////////////////////////////
$mc_category_code = $_POST['mc_category_code'];
$mi_menu_code = $_POST['mi_menu_code'];
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
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////

/////////////////////////////////////////////////////
//datbase query sys_vert_menu_id
$mi_price= number_format($mi_price, 2, '.', '');

$result = mysql_query( "UPDATE menu_master  SET mi_long_name = '$mi_long_name', mi_display_name = '$mi_display_name', mi_price = '$mi_price' WHERE  item_code = '$mi_menu_code' ") or die( "An error has ocured statement 1: " .mysql_error (). ":" .mysql_errno ());



$result = mysql_query( "UPDATE food_master SET fm_description = '$mi_description', fm_culinary_terms = '$mi_culinary_terms', fm_primary_producers = '$mi_primary_producers', fm_region = '$mi_region', fm_misc_details ='$mi_misc_details', fm_garlic = '$mi_garlic', fm_lactose = '$mi_lactose', fm_kosher = '$mi_kosher', fm_halal = '$mi_halal', fm_gluten_free ='$mi_gluten_free', fm_cook_type_marker = '$mi_cook_type_marker', fm_ingredients = '$mi_ingredients', fm_egg_or_cheese = '$mi_egg_or_cheese', fm_image = '$mi_image' WHERE item_code = '$mi_menu_code' " ) or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());
/////////////////////////////////////////////////////
mysql_close($link)

?>
