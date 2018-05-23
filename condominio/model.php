<?php 
$myobject=new stdclass();
$myobject->nome="Federico";
$myobject->cognome="Franchi";
$myobject->anni=18;
$jsonob=json_encode($myobject);
echo $jsonob;
?>