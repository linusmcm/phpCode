<?php
/////////////////////////////////////////////////////
//error reporting
/////////////////////////////////////////////////////
error_reporting (E_ALL ^ E_NOTICE);
/////////////////////////////////////////////////////
include '../includes/vitals.php';
/////////////////////////////////////////////////////
$link = mysql_connect($machine, $uName, $pCode);
mysql_select_db("bookings", $link);
/////////////////////////////////////////////////////
$active = "Y";
$index = 0;
$cancelledFlag = "N";
$rm_res_time = Array();
$rm_user_taking_booking = Array();
$rm_table_requested = Array();
$rm_booked_at_time = Array();
$rm_booked_on_date = Array();
$rm_beverage_notes = Array();
$rm_food_notes = Array();
$rm_reservation_notes = Array();
$rm_beverages_notes_flag = Array();
$rm_reservation_flag = Array();
$rm_food_notes_flag = Array();
$rm_num_pax = Array();
$rm_table_assigned = Array();
$rm_reservation_status = Array();
$rm_reservation_email = Array();
$rm_reservation_session = Array();
$rm_customer_code = Array();
$rm_reservation_date = Array();
$rm_reservation_code = Array();
$rm_am_pm = Array();
$rm_reservation_time = Array();
$rm_contact_name = Array();
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
//datbase connection
$date_str = $_REQUEST['dateStr'];
$month_str = $_REQUEST['monthStr'];
$year_str = $_REQUEST['yearStr'];
$controller = $_REQUEST['controller']; 
/////////////////////////////////////////////////////
/////////////////////////////////////////////////////
$rm_reservation_date = date("Y:m:d", mktime(0,0,0,$month_str,$date_str,$year_str));
if($controller == "all")
{
	$result = mysql_query("SELECT * FROM reservations WHERE rm_reservation_date  = '$rm_reservation_date'AND rm_cancelled_flag = '$cancelledFlag'  ORDER BY rm_res_time, rm_num_pax")or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());
}
else
{
	$result = mysql_query("SELECT * FROM reservations WHERE rm_reservation_date  = '$rm_reservation_date' AND rm_reservation_session = '$controller' AND rm_cancelled_flag = '$cancelledFlag' ORDER BY rm_res_time, rm_num_pax")or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());
}
//pass records to array
/////////////////////////////////////////////////////
while($row = mysql_fetch_array($result))
	{
			$rm_res_time[$index] = ($row['rm_res_time']);
			$rm_user_taking_booking[$index] = ($row['rm_user_taking_booking']);
			$rm_table_requested[$index] = ($row['rm_table_requested']);
			$rm_booked_at_time[$index] = ($row['rm_booked_at_time']); 	
			$rm_booked_on_date[$index] = ($row['rm_booked_on_date']);
			$rm_beverage_notes[$index] = ($row['rm_beverage_notes']); 	
			$rm_food_notes[$index] = ($row['rm_food_notes']);
			$rm_food_notes[$index] = $row['rm_food_notes']; 	
			$rm_reservation_notes[$index] = ($row['rm_reservation_notes']);
			$rm_beverages_notes_flag[$index] = $row['rm_beverages_notes_flag']; 			
			$rm_reservation_flag[$index] = ($row['rm_reservation_flag']); 	
			$rm_food_notes_flag[$index] = ($row['rm_food_notes_flag']);
			$rm_num_pax[$index] = ($row['rm_num_pax']); 
			$rm_table_assigned[$index] = ($row['rm_table_assigned']); 
			$rm_reservation_status[$index] = ($row['rm_reservation_status']); 
			$rm_reservation_email[$index] = ($row['rm_reservation_email']); 
			$rm_reservation_session[$index] = ($row['rm_reservation_session']);
			$rm_customer_code[$index] = ($row['rm_customer_code']);	 
			$rm_reservation_date[$index] = ($row['rm_reservation_date']); 
			$rm_reservation_code[$index] = ($row['rm_reservation_code']); 
			$rm_am_pm[$index] = ($row['rm_am_pm']); 
			$rm_reservation_time[$index] = $row['rm_reservation_time']; 	
			$rm_contact_name[$index] = ($row['rm_contact_name']); 	
			$index++;
	}
/////////////////////////////////////////////////////
//pass records to array
/////////////////////////////////////////////////////	
print "&rm_res_time=" . urlencode(utf8_encode(serialize($rm_res_time)));
print "&rm_user_taking_booking=" . urlencode(utf8_encode(serialize($rm_user_taking_booking)));
print "&rm_table_requested=" . urlencode(utf8_encode(serialize($rm_table_requested)));
print "&rm_booked_at_time=" . urlencode(utf8_encode(serialize($rm_booked_at_time)));
print "&rm_booked_on_date=" . urlencode(utf8_encode(serialize($rm_booked_on_date)));
print "&rm_beverage_notes=" . urlencode(utf8_encode(serialize($rm_beverage_notes)));
print "&rm_food_notes=" . urlencode(utf8_encode(serialize($rm_food_notes)));
print "&rm_reservation_notes=" . urlencode(utf8_encode(serialize($rm_reservation_notes)));
print "&rm_beverages_notes_flag=" . urlencode(utf8_encode(serialize($rm_beverages_notes_flag)));
print "&rm_reservation_flag=" . urlencode(utf8_encode(serialize($rm_reservation_flag)));
print "&rm_food_notes_flag=" . urlencode(utf8_encode(serialize($rm_food_notes_flag)));
print "&rm_num_pax=" . urlencode(utf8_encode(serialize($rm_num_pax)));
print "&rm_table_assigned=" . urlencode(utf8_encode(serialize($rm_table_assigned)));
print "&rm_reservation_status=" . urlencode(utf8_encode(serialize($rm_reservation_status)));
print "&rm_reservation_email=" . urlencode(utf8_encode(serialize($rm_reservation_email)));
print "&rm_reservation_session=" . urlencode(utf8_encode(serialize($rm_reservation_session)));
print "&rm_customer_code=" . urlencode(utf8_encode(serialize($rm_customer_code)));
print "&rm_reservation_date=" . urlencode(utf8_encode(serialize($rm_reservation_date)));
print "&rm_reservation_code=" . urlencode(utf8_encode(serialize($rm_reservation_code)));
print "&rm_am_pm=" . urlencode(utf8_encode(serialize($rm_am_pm)));
print "&rm_reservation_time=" . urlencode(utf8_encode(serialize($rm_reservation_time)));
print "&rm_contact_name=" . urlencode(utf8_encode(serialize($rm_contact_name)));
mysql_close($link);
?>