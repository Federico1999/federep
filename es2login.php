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
  $divmode="inline";
}
else if($_POST["contatore"] == 1)
{
  
  $titolo="Riepilogo dati";
  $contatore=$_POST["contatore"]+1;
  $divmode="none";
}

?>
<style>
 div[id=id1] {display:<?php echo "$divmode"?>;}>
</style>
<script>
function verificadati()
  {  
     if(document.formone.cognome.value.length<1)
      {
        alert("non e' stato inserito il cognome");
        return false;
      }
     else if(document.formone.nome.value.length<1)
      {
        alert("non e' stato inserito il nome");
        return false;
      }
     else if(document.formone.sesso.value!="f" && document.formone.sesso.value!="m")
      {
        alert("non e' stata inserita la sessualita'");
        return false;
      }
    //alert(document.formone.nazio);
    else if(document.formone.nazio.value=="vuoto")
      {
        alert("non e' stato inserita la nazionalita'");
        return false;
      }
    else if(document.formone.mail.value.length<1)
      {
        alert("non e' stata inserita la email");
        return false;
      }
    else if(document.formone.pass.value.length<1)
    {
      alert("non e' stata inserita la password");
     return false;
    }
    else
    {
      return true;
    }
                        
  }
</script>


<html>
  <div id="id1">
  <form action="" method="post" name="formone" onsubmit="return verificadati()">    <!--probabilmente sarà necessario  effettuare-->
    <h1><?php echo $titolo ?></h1><br>
    <input type="hidden" name="contatore" value="<?php echo "$contatore"?>">
    cognome: <input type="text" name="cognome"><br>
    nome: <input type="text" name="nome"><br>
    sesso:  <input type="radio" value="m" name="sesso">maschile  <input type="radio" value="f" name="sesso">femminile <br>
    nazionalità: <select name="nazio"><option value="vuoto"></option><option value="ita">Italiana</option> <option value="USA">Americana</option>></select><br>
    patente:<input type="checkbox" name="a" value="av"> cat.A <input type="checkbox" name="b" value="bv">cat.B <br>
    E-mail: <input type="text" name="mail"><br>
    password: <input type="text" name="pass"><br>
    <button type="reset" name="but"><?php echo "$mb"?></button>  <button type="submit" name="butt"><?php echo "$mb2" ?></button> 
    </form> <!--potrebbe essere una buona idea creare un altro form-->
  </div>
  <?php echo "$contatore"?>
</html>