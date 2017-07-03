<?php
include_once '../ofc-library/open_flash_chart_object.php';
open_flash_chart_object( 450, 300, 'http://'. $_SERVER['SERVER_NAME'] .'/gpal/php/bookings/loadSessionGraph.php', false );
?>
