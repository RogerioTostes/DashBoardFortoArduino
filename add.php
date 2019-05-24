<?php
 
   	include("connect.php");
   	
	   $link=Connection();

$MSG_Texto1=$_POST["MSG_Texto1"];
$MSG_Texto2=$_POST["MSG_Texto2"];
$MSG_Texto3=$_POST["MSG_Texto3"];
$MSG_Texto4=$_POST["MSG_Texto4"];

 

$query=mysqli_query($link,"INSERT INTO `tempLog` (`timeStamp`,`tensionNormal`,`tensionReversa`,`tensionLinha1`,`tensionLinha2`) 
	VALUES (current_timestamp,'".$MSG_Texto1."','".$MSG_Texto2."','".$MSG_Texto3."','".$MSG_Texto4."')"); 

  $TCN="<p>Tensão chave normal:". $MSG_Texto1 . "</p>";
	file_put_contents('tensaochavenormal.html',$TCN);

	$TCR="<p>Tensão chave reversa:". $MSG_Texto2 . "</p>";
	file_put_contents('tensaochavereversa.html',$TCR);

	$TL1="<p>Tensão linha 1:". $MSG_Texto3 . "</p>";
	file_put_contents('tensaolinha1.html',$TL1);

	$TL2="<p>Tensão linha 2:". $MSG_Texto4 . "</p>";
	file_put_contents('tensaolinha2.html',$TL2);
	



		 mysqli_close($link);
		 
		   header("Location: tables.php");
		   ?>

