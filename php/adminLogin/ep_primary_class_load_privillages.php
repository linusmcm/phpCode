<?php
/////////////////////////////////////////////////////
//error reporting    
error_reporting(E_ALL);
/////////////////////////////////////////////////////
//variable declaration
/////////////////////////////////////////////////////
$active = "Y";
$index = 0;
$ep_code = Array();
$ep_desc = Array();
$ep_display = Array();
$ep_code_string;
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("payroll", $link);
/////////////////////////////////////////////////////
$ep_code_string = $_POST['ep_code'];
/////////////////////////////////////////////////////
switch (strtoupper ($ep_code_string)) 
{
    case"S":
		$standard = "S";
        $result = mysql_query("SELECT * FROM ep_primary_class WHERE ep_code = '$standard' ") or die( "An error has ocured: " .mysql_error ());
        break;
    case "U":
		$supervisor  = "U";
		$standard = "S";
    	$result = mysql_query("SELECT * FROM ep_primary_class WHERE ep_code = '$standard' OR ep_code = '$supervisor' ") or die( "An error has ocured: " .mysql_error ());
        break;
	case "M":
		$supervisor  = "U";
		$standard = "S";
		$manager = "M";
    	$result = mysql_query("SELECT * FROM ep_primary_class WHERE ep_code = '$standard' OR ep_code = '$supervisor' OR ep_code = '$manager' ") or die( "An error has ocured: " .mysql_error ());
        break;
	case "P":
        $supervisor  = "U";
		$standard = "S";
		$manager = "M";
		$proprietor  = "P";
    	$result = mysql_query("SELECT * FROM ep_primary_class WHERE ep_code = '$standard' OR ep_code = '$supervisor' OR ep_code = '$manager' OR ep_code = '$proprietor' ") or die( "An error has ocured: " .mysql_error ());
        break;
}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
	while($row = mysql_fetch_array($result))
	{
			$ep_code[$index] =  $row['ep_code'];
			$ep_desc[$index] = strtoupper ($row['ep_desc']);
			$ep_display[$index] = strtolower ($row['ep_display']);
			$index++;
	}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
print "ep_code=" . urlencode(utf8_encode(serialize($ep_code)));
print "&ep_desc=" . urlencode(utf8_encode(serialize($ep_desc)));
print "&ep_display=" . urlencode(utf8_encode(serialize($ep_display)));
mysql_close($link)
?>