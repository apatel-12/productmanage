<?php 
require("dbconnect.php");
function sessiondata_reset()
{
	
	if(isset($_SESSION['sqlsearch']))
		unset($_SESSION['sqlsearch']);
	session_destroy();
	
}

?>