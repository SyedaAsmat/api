<?php	

	$username = "root";
    $password = "";
    $db = "api";
    
    $conn = new mysqli('localhost', $username, $password) or die("Connection failed: " .mysqli_connect_error());
    echo "Connected Successfully";

?>