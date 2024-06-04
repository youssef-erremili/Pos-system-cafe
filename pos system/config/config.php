<?php
$host = "localhost";
$userAdmin = "root";
$password = "";
$databaseName = "cafe pos system";

try {
    $serverConn = new PDO("mysql:host = $host; dbname=$databaseName", $userAdmin, $password);
    $serverConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($serverConn) {
        echo "<script> 
                    console.log(\"Connection Has Been Established Successfully\")
                </script>";
    }
} catch (PDOException $err) {
    echo "connection failed" . $err->getMessage();
    echo "<script> 
                console.error(\"Connection Has Not Been Established Successfully\")
            </script>";
}
