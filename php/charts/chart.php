<?php
include_once '../ofc-library/open_flash_chart_object.php';
open_flash_chart_object( 500, 250, 'http://'. $_SERVER['SERVER_NAME'] .'/gpal/php/charts/chart-data.php', false );
echo "fuck you";
echo "<BR>";
?>