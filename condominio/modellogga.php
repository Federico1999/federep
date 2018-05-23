<?php 

$server="mysql:host=localhost;dbname=Condominio";
try{
$conn=new PDO($server,"root","federico");  
$tab=$conn->query("SELECT * from Utenti where Email=:email"); // AND Pass=:pass  :email
$tab->bindValue(":email",$_GET["p"]["email"]);
//$tab->bindValue(":pass",$pass);
//$tab=$tab->execute();
$row=$tab->fetch();
// echo $tab->rowcount(); 
$ob=new stdClass();
$ob->nome=$row["Nome"];
$jsonob=json_encode($ob);
echo $jsonob;
}catch(Exception $e){echo "errore";}
?>

<!-- esempio $server="mysql:host=localhost;dbname=Condominio";
try{
$conn=new PDO($server,"root","federico");  
$tab=$conn->query("SELECT * from Utenti");
  $array=[];
foreach($tab as $row)
{
  $myobject=new stdclass();
  $myobject->email=$row["Email"];
  $myobject->nome=$row["Nome"];
  $jsonob=json_encode($myobject);
  array_push($array,$myobject);
}
$jsonarray=json_encode($array);
echo $jsonarray;
}catch(Exception $e){echo "errore";} -->