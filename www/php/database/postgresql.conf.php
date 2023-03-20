<?php

include $_SERVER['DOCUMENT_ROOT'] . "/env.php";


$strConnection = "host=" . strval($_ENV["DB_HOST"]) . " dbname=" . strval($_ENV["DB_NAME"])
    . " user=" . strval($_ENV["DB_USER"] . " password=" . strval($_ENV["DB_PASSWORD"]));

$DB_connect = pg_connect($strConnection);
