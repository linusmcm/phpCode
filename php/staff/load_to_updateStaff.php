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
$em_classification = Array();
$em_last_name = Array();
$em_first_name  = Array();
$em_id_number = Array();
$em_dob_month = Array();
$em_dob_day = Array();
$em_address = Array();
$em_suburb = Array();
$em_state = Array();
$em_pcode = Array();
$em_home_phone = Array();
$em_mobile_phone = Array();
$em_emergency_name_1 = Array();
$em_emergency_phone_1 = Array();
$em_email = Array();
$em_pwd = Array();
$em_dob_year = Array();
//$ep_code = "";
//$es_code = "";
/////////////////////////////////////////////////////
$em_first_name = $_POST['em_first_name'];
$em_last_name = $_POST['em_last_name'];
$em_id_number = $_POST['em_id_number'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("payroll", $link);
/////////////////////////////////////////////////////
//datbase query
/////////////////////////////////////////////////////
$result = mysql_query("SELECT * FROM employee_master WHERE em_id_number = '$em_id_number' ");
/////////////////////////////////////////////////////
//pass records to array
$lock = "false";
/////////////////////////////////////////////////////	
	while($row = mysql_fetch_array($result))
	{
			$em_last_name[$index] = ($row['em_last_name']);
			$em_first_name [$index] = ($row['em_first_name']);
			$em_gender[$index] = ($row['em_gender']);
			$em_other_name[$index] = ($row['em_other_name']);
			$em_address[$index] = ($row['em_address']);
			$em_suburb[$index] = ($row['em_suburb']);	
			$em_state[$index] = ($row['em_state']);	
			$em_pcode[$index] = ($row['em_pcode']);	
			$em_home_phone[$index] = ($row['em_home_phone']);	
			$em_mobile_phone[$index] = ($row['em_mobile_phone']);	
			$em_emergency_name_1[$index] = ($row['em_emergency_name_1']);	
			$em_emergency_phone_1[$index] = ($row['em_emergency_phone_1']);	
			$em_email[$index] = ($row['em_email']);	
			$em_pwd[$index] = ($row['em_pwd']);	
			$em_dob_year[$index] = ($row['em_dob_year']);	
			$em_dob_day[$index] = ($row['em_dob_day']);	
			$em_dob_month[$index] = ($row['em_dob_month']);
			$em_classification[$index] = ($row['em_classification']);	
			$index++;
	}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
print "&em_last_name=" . urlencode(utf8_encode(serialize($em_last_name)));
print "&em_first_name=" . urlencode(utf8_encode(serialize($em_first_name)));
print "&em_gender=" . urlencode(utf8_encode(serialize($em_gender)));
print "&em_other_name=" . urlencode(utf8_encode(serialize($em_other_name)));
print "&em_address=" . urlencode(utf8_encode(serialize($em_address)));
print "&em_suburb=" . urlencode(utf8_encode(serialize($em_suburb)));
print "&em_state=" . urlencode(utf8_encode(serialize($em_state)));
print "&em_pcode=" . urlencode(utf8_encode(serialize($em_pcode)));
print "&em_home_phone=" . urlencode(utf8_encode(serialize($em_home_phone)));
print "&em_mobile_phone=" . urlencode(utf8_encode(serialize($em_mobile_phone)));
print "&em_emergency_name_1=" . urlencode(utf8_encode(serialize($em_emergency_name_1)));
print "&em_emergency_phone_1=" . urlencode(utf8_encode(serialize($em_emergency_phone_1)));
print "&em_email=" . urlencode(utf8_encode(serialize($em_email)));
print "&em_pwd=" . urlencode(utf8_encode(serialize($em_pwd)));
print "&em_dob_year=" . urlencode(utf8_encode(serialize($em_dob_year)));
print "&em_dob_day=" . urlencode(utf8_encode(serialize($em_dob_day)));
print "&em_dob_month=" . urlencode(utf8_encode(serialize($em_dob_month)));
print "&em_classification=" . urlencode(utf8_encode(serialize($em_classification)));
mysql_close($link);
/////////////////////////////////////////////////////
//open system db
/////////////////////////////////////////////////////
?>
