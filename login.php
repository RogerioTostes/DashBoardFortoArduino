<?php 
  $login = $_POST['user'];
  $senha = $_POST['password'];
  $entrar = $_POST['entrar'];
 

  include("connect.php");
   	
  $link=Connection();
  
     	
    if (isset($entrar)) {
        
      $verifica = mysqli_query($link,"SELECT `user`, `password` FROM `login` WHERE `user` = '$login' AND `password` = '$senha'") or die("erro ao selecionar");
        if (mysqli_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
          die();
        }else{
          setcookie("login",$login);
          header("Location:index.html");
        }
    }
    mysqli_close($link);
?>