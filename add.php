<?php
 
   	include("connect.php");
   	
	   $link=Connection();

$MSG_Texto1=$_POST["MSG_Texto1"];
$MSG_Texto2=$_POST["MSG_Texto2"];
$MSG_Texto3=$_POST["MSG_Texto3"];
$MSG_Texto4=$_POST["MSG_Texto4"];




$query=mysqli_query($link,"INSERT INTO `tempLog` (`timeStamp`,`tensionNormal`,`tensionReversa`,`tensionLinha1`,`tensionLinha2`) 
	VALUES (current_timestamp,'".$MSG_Texto1."','".$MSG_Texto2."','".$MSG_Texto3."','".$MSG_Texto4."')"); 

  
		 mysqli_close($link);
		 
   		header("Location: tables.php");
?>

