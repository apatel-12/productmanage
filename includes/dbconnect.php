<?php session_start();
$host="localhost";
$username="root";    
$password="root"; 
$database="manage_data";

$mysqli = new mysqli($host, $username, $password, $database, 3306); 
$mysqli->options(MYSQLI_OPT_LOCAL_INFILE, true);

if ($mysqli->connect_error) {
   print "Connection Error";
   print $conn_mysqli->connect_error;
   exit;
}

?>