<?php
$config["server"] = 'localhost';
$config["username"] = 'root';
$config["password"] = '';
$config["database_name"] = 'ag_gokart';

$BAGIAN = array(
	'Admin' => 'Admin',
	'Kasir' => 'Kasir',
	'Kantor' => 'Kantor',
	'Helper'   => 'Helper',
);

?>

<?php
 
$databaseHost = 'localhost';
$databaseName = 'ag_gokart';
$databaseUsername = 'root';
$databasePassword = '';
 
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
 
?>