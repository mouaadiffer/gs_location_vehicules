<?php

$dsn = "mysql:host=localhost;dbname=gestion_parc_automobile";
$options = array(
 PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
);

try
{
    $cnx = new PDO($dsn,"root","",$options);

    // echo "<script>alert('You are Connected Now')</script>";
}
catch(PDOException $ex)
{
    echo "Failed Connection : ".$ex ->getMessage();
}
?>