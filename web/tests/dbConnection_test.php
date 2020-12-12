<?php
$dbopts = parse_url(getenv('DATABASE_URL'));

    $myPDO = new PDO('pgsql:host=localhost;dbname=dbname', 'username', 'password');

?>