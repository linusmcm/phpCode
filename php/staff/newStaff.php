<?php
/////////////////////////////////////////////////////
//error reporting
/////////////////////////////////////////////////////
error_reporting (E_ALL ^ E_NOTICE);
/////////////////////////////////////////////////////
//variable declaration
/////////////////////////////////////////////////////
$em_last_name = "";
$em_first_name = "";
$em_other_name = "";
$em_address = "";
$em_suburb = "";
$em_state = "";
$em_pcode = "";
$em_home_phone = "";
$em_mobile_phone = "";
$em_emergency_name_1 = "";
$em_emergency_phone_1 = "";
$em_email = "";
$em_dob_day = "";
$em_dob_month = "";
$em_dob_year = "";
$em_pwd = "";
$em_gender = "";
$em_classification = "";
$em_id_number = "";
/////////////////////////////////////////////////////
$em_last_name = $_POST['em_last_name'];
$em_first_name = $_POST['em_first_name'];
$em_other_name = $_POST['em_other_name'];
$em_address = $_POST['em_address'];
$em_suburb = $_POST['em_suburb'];
$em_state = $_POST['em_state'];
$em_pcode = $_POST['em_pcode'];
$em_home_phone = $_POST['em_home_phone'];
$em_mobile_phone = $_POST['em_mobile_phone'];
$em_emergency_name_1 = $_POST['em_emergency_name_1'];
$em_emergency_phone_1 = $_POST['em_emergency_phone_1'];
$em_email = $_POST['em_email'];
$em_pwd = $_POST['em_pwd'];
$em_dob_day = $_POST['em_dob_day'];
$em_dob_month = $_POST['em_dob_month'];
$em_dob_year = $_POST['em_dob_year'];
$em_classification = $_POST['em_classification'];
$em_gender = strtoupper($_POST['em_gender']);
////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("payroll", $link);
/////////////////////////////////////////////////////
//datbase query sys_vert_menu_id
$em_code = (rand(0,99999));
$em_id_number = (rand(0,9999999999));
$result = mysql_query( "INSERT INTO employee_master (em_first_name, em_last_name , em_other_name, em_address, em_suburb, em_state, em_pcode, em_home_phone, em_mobile_phone, em_emergency_name_1, em_emergency_phone_1, em_email, em_pwd, em_code, em_classification, em_gender, em_id_number, em_dob_day, em_dob_month, em_dob_year ) VALUES ('$em_first_name', '$em_last_name',  '$em_other_name', '$em_address', '$em_suburb', '$em_state', '$em_pcode', '$em_home_phone', '$em_mobile_phone', '$em_emergency_name_1', '$em_emergency_phone_1', '$em_email', '$em_pwd', '$em_code', '$em_classification', '$em_gender',  '$em_id_number',  '$em_dob_day',  '$em_dob_month', '$em_dob_year')") or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());
/////////////////////////////////////////////////////
mysql_close($link)
?>
