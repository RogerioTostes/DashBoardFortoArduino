<?php
   	include("connect.php");
   	
   	$link=Connection();

$MSG_Texto=$_POST["MSG_Texto1"];


$query=mysqli_query($link,"INSERT INTO `tempLog` (`timeStamp`,`tension`) 
	VALUES (current_timestamp,'".$MSG_Texto."')"); 
  
     	mysqli_close($link);
   		header("Location: tables.php");
?>
