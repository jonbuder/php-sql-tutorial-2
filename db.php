<?php

$serverName = "localhost\SQLEXPRESS";
$connectionOptions = array(
    "database" => "tutorial",
    "uid" => "tut_user",
    "pwd" => "password",
    "TrustServerCertificate" => 1
);

$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(print_r(sqlsrv_errors()));
}

?>