<?php
define('DB_SERVER','sql308.epizy.com');
define('DB_USER','epiz_32908750');
define('DB_PASS' ,'NFb6jQdDU2Pg');
define('DB_NAME', 'epiz_32908750_sdmsdb');

// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}


$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_error())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>