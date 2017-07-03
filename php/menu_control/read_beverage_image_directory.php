<?php
/////////////////////////////////////////////////////
include('SimpleImage.php');
//header('Content-Type: image/jpeg');
/////////////////////////////////////////////////////
error_reporting (E_ALL ^ E_NOTICE);
/////////////////////////////////////////////////////
$dir = '/master/beverage_images';
$directoryString = '/master/beverage_images/';
$iconDirectory = '/master/beverage_icons/';
$displayDirectory = '/master/beverage_display/';
$active = "Y";
$address_icon = Array();
$address_display = Array();
$index = 0;
$num_rows = "";
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("service", $link);
/////////////////////////////////////////////////////
//datbase query
/////////////////////////////////////////////////////
$scanned_directory = scandir($dir,0);
array_shift($scanned_directory);
array_shift($scanned_directory);
natsort($scanned_directory);
/////////////////////////////////////////////////////
$link = mysql_connect("localhost", "root", "lm1112gs");
mysql_select_db("service", $link);
/////////////////////////////////////////////////////
//datbase query
$fileName = "";
foreach ($scanned_directory as $fileName) 
{
	$result = mysql_query("SELECT * FROM beverage_images WHERE bm_file_name = '$fileName' ");
	$num_rows = mysql_num_rows($result);
	if($num_rows < 1)
	{
			$imageOne = new SimpleImage();
			$imageOne->load($directoryString . $fileName);
			$imageOne->resize(600,400);
			$imageOne->save($displayDirectory . $fileName);
			$addressDisplay = $displayDirectory . $fileName;
			$image = new SimpleImage();
			$image->load($directoryString . $fileName);
			$image->resize(120,80);
			$image->save($iconDirectory . $fileName);
			$addressIcon = $iconDirectory . $fileName;
			$addressOriginal = $directoryString . $fileName;
			$bm_code = (rand(0,99999999));
			$result1 = mysql_query("INSERT INTO beverage_images(bm_code, bm_file_name, bm_address_original, bm_address_icon, bm_address_display, bm_active ) VALUES('$bm_code' , '$fileName', '$addressOriginal', '$addressIcon', '$addressDisplay', '$active')") or die( "An error has ocured: " .mysql_error (). ":" .mysql_errno ());
	}
}
$result2 = mysql_query("SELECT * FROM beverage_images");
$num_rows = mysql_num_rows($result2);
while($row = mysql_fetch_array($result2))
	{
			$address_icon[$index] = $row['bm_address_icon'];
			$address_display[$index] = $row['bm_address_display']; 
			$index++;
	}

print "&address_icon=" . urlencode(utf8_encode(serialize($address_icon)));
print "&address_display=" . urlencode(utf8_encode(serialize($address_display)));
print "&scanned_directory=" . urlencode(utf8_encode(serialize($scanned_directory)));
print "&num_rows=" . urlencode(utf8_encode(serialize($num_rows)));
mysql_close($link)
?>
