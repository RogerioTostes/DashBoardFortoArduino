<?php
date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d H:i');

    $dadosXls  = "";
    $dadosXls .= "  <table border='1' >";
    $dadosXls .= "          <tr>";
    $dadosXls .= "          <th>Data e Hora</th>";
    $dadosXls .= "          <th>Tensão chave normal</th>";
    $dadosXls .= "          <th>Tensão chave reversa</th>";
    $dadosXls .= "          <th>Tensão linha 1</th>";
    $dadosXls .= "          <th>Tensão linha 2</th>";
    $dadosXls .= "      </tr>";
    
    include("connect.php");
   
    $link=Connection();
    $result=mysqli_query($link,"SET time_zone ='-03:00'"); 
	$result=mysqli_query($link,"SELECT `timeStamp`, `tensionNormal`, `tensionReversa`, `tensionLinha1`, `tensionLinha2` FROM `tempLog` WHERE DATE(`timestamp`) = CURDATE() ORDER BY `timeStamp` DESC");
    foreach($result as $res){
        $dadosXls .= "      <tr>";
        $dadosXls .= "          <td>".$res['timeStamp']."</td>";
        $dadosXls .= "          <td>".$res['tensionNormal']."</td>";
        $dadosXls .= "          <td>".$res['tensionReversa']."</td>";
        $dadosXls .= "          <td>".$res['tensionLinha1']."</td>";
        $dadosXls .= "          <td>".$res['tensionLinha2']."</td>";
        $dadosXls .= "      </tr>";
    }
    $dadosXls .= "  </table>";
 
    $arquivo = "DataCollect". $date .".xls";
     
        
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$arquivo.'"');
    header('Cache-Control: max-age=0');
    header('Cache-Control: max-age=1');
          
    echo $dadosXls;  
    exit;
?>