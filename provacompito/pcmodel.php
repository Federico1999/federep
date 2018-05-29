<?php 
$string="mysql:host=localhost;dbname=datalogin";
try{
 $conn=new PDO($string,"root","federico");
 if(isset($_GET["sport"]))
  {
    $tab=$conn->prepare("SELECT * from Sports where Sport=:spo");
    $tab->bindValue(":spo",$_GET["sport"]);
    $tab->execute();
  }
  else{
   $tab=$conn->query("SELECT * from Sports");  
  }
  
  $array=[];
  $ob=new stdclass();
  foreach($tab as $row)
  {
    $ob->nome=$row["Nome"];
    $ob->eta=$row["Eta"];
    array_push($array,$ob);
    $ob=new stdclass();
  }
  echo json_encode($array);
}catch(exception $e){}

?>