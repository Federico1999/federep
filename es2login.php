<!DOCTYPE html>
<?php 
//$contatore=$_POST["contatore"];
if(!isset($_POST["contatore"]))
{
 $contatore=1;
  $formtype="hidden";
 $titolo="Modulo di iscrizione";
 $mb="annulla";
  $mb2="conferma";
}
else if($_POST["contatore"] == 1)
{
  
  $titolo="Riepilogo dati";
  
}

?>
<html>
  <form type="hidden" action="" method="post" name="formone" onsubmit="verificadati()">    <!--probabilmente sarà necessario  effettuare-->
    <h1><?php echo $titolo ?></h1><br>
    <input type="hidden" name="contatore" value="<?php echo "$contatore"?>">
    cognome: <input type="text" name="cognome"><br>
    nome: <input type="text" name="nome"><br>
    sesso:  <input type="radio" value="m" name="maschio">maschile  <input type="radio" value="f" name="femmina">femminile <br>
    nazionalità: <select name="nazio"><option value="ita">Italiana</option> <option value="USA">Americana</option>></select><br>
    patente:<input type="checkbox" name="a" value="av"> cat.A <input type="checkbox" name="b" value="bv">cat.B <br>
    E-mail: <input type="text" name="mail"><br>
    password: <input type="text" name="pass"><br>
    <?php 
   function verificadati()
   {
      if($cognome)
   } 
    ?>
    <button type="reset" name="but"><?php echo "$mb" ?></button>  <button type="submit" name="butt"><?php echo "$mb2" ?></button> 
    </form> <!--potrebbe essere una buona idea creare un altro form-->
</html>