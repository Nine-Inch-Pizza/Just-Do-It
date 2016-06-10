<?php

DEFINE ('DB_USER', 'adminweb');
DEFINE ('DB_PASSWORD', 'adminweb1');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'just_do_it');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    OR die('Could not connect to MySQL' . mysqli_connect_error());

?>