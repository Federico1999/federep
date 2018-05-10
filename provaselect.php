<!DOCTYPE html>
<?php 
$server='mysql:host=localhost;dbname=datalogin';  
$conn=new PDO($server,'root','federico');
/*$com=$conn->prepare("SELECT * FROM logindb");
$com->execute();
$row=$com->fetch();
$nrow=$com->rowcount();
$rowt=$com->fetch();*/
$tab=$conn->query("SELECT * FROM logindb");
foreach($tab as $riga)
{
  echo "ciao".$riga["nome"]; echo "<br>";
  echo $riga["Email"]; echo "<br>";
}
echo $tab->rowcount();
?>
<html>
 <!--<form action="" method="post">
   <button type="submit">premi   
   </button>
  </form> -->
 <!-- <a> numero righe: <?php //echo $nrow?></a><br> 
  <a> riga 1: <?php //echo $row["Email"]?></a><br>
  <a> riga 2: <?php //echo $rowt["Email"]?></a> -->
</html>