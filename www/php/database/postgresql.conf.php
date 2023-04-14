<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/env.php";

# create the postgresql connection string
$strConnection = "host=" . strval($_ENV["DB_HOST"]) . " dbname=" . strval($_ENV["DB_NAME"])
    . " user=" . strval($_ENV["DB_USER"] . " password=" . strval($_ENV["DB_PASSWORD"]));

# instanciate the postgresql connection
$DB_connect = pg_connect($strConnection);
