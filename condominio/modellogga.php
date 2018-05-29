<?php 

$server="mysql:host=localhost;dbname=Condominio";
try{
 

$conn=new PDO($server,"root","federico");  
$tab=$conn->prepare("SELECT * from Utenti where Email=:em and Pass=:pa"); // AND Pass=:pass  :email
$tab->bindValue(":em",$_GET["email"]);
  $tab->bindValue(":pa",$_GET["pass"]);
$tab->execute();
  $myob=$tab->fetch();
  $ob=new stdclass();
  $ob->nome=$myob["Nome"];
  $myjob=json_encode($ob);
  echo $myjob;
}catch(Exception $e){echo "errore";}
/* esempio $server="mysql:host=localhost;dbname=Condominio";
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
}catch(Exception $e){echo "errore";} */
?>

