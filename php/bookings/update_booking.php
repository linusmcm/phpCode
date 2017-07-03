<?php
/////////////////////////////////////////////////////
//error reporting
/////////////////////////////////////////////////////
error_reporting (E_ALL ^ E_NOTICE);
//////////////////////////////////////////////////////
/////////////////////////////////////////////////////
include '../includes/sanitiser.php';
include '../includes/diningSessions.php';
include '../includes/vitals.php';
/////////////////////////////////////////////////////
$link = mysql_connect($machine, $uName, $pCode);
mysql_select_db("bookings", $link);
/////////////////////////////////////////////////////
$day_str = $_REQUEST['dayStr'];
$date_str = $_REQUEST['dateStr'];
$month_str = $_REQUEST['monthStr'];
$year_str = $_REQUEST['yearStr'];
$totalDate = $_REQUEST['$totalDate'];
$bookingNameText = $_REQUEST['bookingNameText'];
$phoneNumberText = $_REQUEST['phoneNumberText'];
$paxNumberText = $_REQUEST['paxNumberText'];
$bookingHour = $_REQUEST['bookingHour'];
$bookingMinute = $_REQUEST['bookingMinute'];
$bookingTimeText = $_REQUEST['bookingTimeText'];
$bookingTimeAMPM = $_REQUEST['bookingTimeAMPM'];
$emailAddressText = $_REQUEST['emailAddressText'];
$generalNotesText = $_REQUEST['generalNotesText'];
$chefMessageText = $_REQUEST['chefMessageText'];
$sommelierMessageText = $_REQUEST['sommelierMessageText'];
$staffMemberID = $_REQUEST['staffMemberID'];
$tableRequestID = $_REQUEST['tableRequestID'];
$rm_reservation_code = $_REQUEST['rm_reservation_code'];
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
$res_time = correct_to_twentyFour($bookingHour, $bookingTimeAMPM);
$rm_reservation_hour = $res_time;
$res_time = date("H:i", mktime($res_time,$bookingMinute,0,0,0,0));
$rm_reservation_time = date("H:i", mktime($bookingHour,$bookingMinute,0,0,0,0));
$rm_reservation_date = date("Y:m:d", mktime(0,0,0,$month_str,$date_str,$year_str));
$session = decide_session($bookingHour, $bookingTimeAMPM);
//$rm_reservation_code = $phoneNumberText.$session;
//$rm_reservation_status = "N";
//$rm_table_assigned = "N";
$rm_food_notes_flag  = notesFlag($chefMessageText);
$rm_reservation_flag  = notesFlag($generalNotesText);
$rm_beverages_notes_flag  = notesFlag($sommelierMessageText);
$date = date("Y-m-d");
$time = date("H:i");
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
$result = mysql_query( "UPDATE reservations SET 
rm_table_requested = '$tableRequestID',
rm_reservation_code = '$rm_reservation_code',
rm_customer_code = '$phoneNumberText',
rm_contact_name = '$bookingNameText',
rm_reservation_date = '$rm_reservation_date',
rm_reservation_email = '$emailAddressText',
rm_reservation_session = '$session',
rm_reservation_time = '$rm_reservation_time',
rm_res_time = '$res_time',
rm_reservation_hour = '$rm_reservation_hour',
rm_am_pm = '$bookingTimeAMPM',
rm_table_requested = '$tableRequestID',
rm_num_pax = '$paxNumberText',
rm_reservation_flag = '$rm_reservation_flag',
rm_food_notes_flag = '$rm_food_notes_flag',
rm_beverages_notes_flag = '$rm_beverages_notes_flag',
rm_reservation_notes = '$generalNotesText',
rm_food_notes = '$chefMessageText', 
rm_beverage_notes = '$sommelierMessageText', 
rm_user_taking_booking = '$staffMemberID' 
WHERE rm_reservation_code = '$rm_reservation_code' AND rm_reservation_date  = '$rm_reservation_date' ") or die( "An error has ocured statement 1: " .mysql_error (). ":" .mysql_errno ());

mysql_close($link)

?>
