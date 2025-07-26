<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "Proyecto";

// Crear conexión
try
{
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
}
catch(mysqli_sql_exception)
{
    echo "Conexión invalida";
}
?>