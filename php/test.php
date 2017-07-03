<?php

$link = mysql_connect("localhost", "root", "lm1112gs");



mysql_select_db("payroll", $link);

$active = "Y"

$result = mysql_query("SELECT * FROM ep_primary_class WHERE ep_active = '$active'  ");



$response = "resp=loaded\n";

$index = 0;

while($row = mysql_fetch_array($result))

	{

	$response .= "&ep_code" . $index . "=" . $row['ep_code'];

	$response .= "&ep_desc". $index . "=". $row['ep_desc'];

	$response .= "&ep_display" . $index . "=" . $row['ep_display']. "\n";

	$index++;

	}

	$response .= "&total=" . $index;

print $response;

mysql_close($link)

?>