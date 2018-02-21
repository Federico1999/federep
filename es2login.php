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
  $div2mode="none";
  $div3mode="none";
}
else if($_POST["contatore"] == 1)
{
  $div2mode="inline";
  $div3mode="none";
  $titolo="Riepilogo dati";
  $contatore=$_POST["contatore"]+1;
  $divmode="none";
  $rcognome=$_POST["cognome"];
  $rnome=$_POST["nome"];
   $remail=$_POST["mail"];
  $rpass=$_POST["pass"];
  if($_POST["sesso"]=="m")
  {
    $rsesso="maschio";
  }
  else if($_POST["sesso"]=="f")
  {
    $rsesso="femmina";
  }
  $rnazio=$_POST["nazio"];

  if(isset($_POST["a"])==false && isset($_POST["b"])==false)
  {
    $rpatente="nessuna patente"; 
  }
  else if(isset($_POST["a"])==true && isset($_POST["b"])==false)
   {
        $rpatente="A";
   }
    else  if(isset($_POST["a"])==false && isset($_POST["b"])==true)
    {
       $rpatente="B";
    }
    else
    {
      $rpatente="A e B";
    }
  
 
}
else if($_POST["contatore"] == 2)
{
  $contatore=$_POST["contatore"]+1;
  $divmode="none";
  $div2mode="none";
  $div3mode="inline";
  $servername="localhost";
  $dbname="datalogin";
   $serverloc='mysql:host=localhost;dbname=datalogin';  
  $username="root";
  $mpass="federico";
  $cognome=$_POST["cognomei"];
  $nome=$_POST["nomei"];
  $sesso=$_POST["sessoi"];
  $nazio=$_POST["nazioi"];
  $patente=$_POST["patentei"];
  $mail=$_POST["maili"];
  $passw=$_POST["passi"];
  //VALUES($cognome,$nome,$sesso,$nazio,$patente,$mail,$passw) VALUES(:cognome,:nome,:sesso,:nazio,:patente,:mail,:passw)
   try
  {
   $conn=new PDO($serverloc,$username,$mpass);
    // $com="INSERT INTO logindb(cognome,nome,sesso,nazionalità,patente,Email,Password) VALUES($cognome,$nome,$sesso,$nazio,$patente,$mail,$passw)";
   //$com=$conn->prepare("INSERT INTO logindb(cognome,nome,sesso,nazionalità,patente,Email,Password) VALUES(':cognome',':nome',':sesso',':nazio',':patente',':mail',':passw')");  
   $com=$conn->prepare("INSERT INTO logindb(cognome,nome,sesso,nazionalita,patente,Email,Password) VALUES(:cognome,:nome,:sesso,:nazio,:patente,:mail,:passw)");  
   $com->bindValue(":cognome",$cognome );
   $com->bindValue(":nome",$nome );
   $com->bindValue(":sesso",$sesso );
   $com->bindValue(":nazio",$nazio );
   $com->bindValue(":patente",$patente);
   $com->bindValue(":mail",$mail );
     $com->bindValue(":passw",$passw);
 $com->execute();
/*     
   $com->bindValue(":cognome",$cognome , PDO::PARAM_STR);
   $com->bindValue(":nome",$nome , PDO::PARAM_STR);
   $com->bindValue(":sesso",$sesso , PDO::PARAM_STR);
   $com->bindValue(":nazio",$nazio , PDO::PARAM_STR);
   $com->bindValue(":patente",$patente , PDO::PARAM_STR);
   $com->bindValue(":mail",$mail , PDO::PARAM_STR);
   $com->bindValue(":passw",$passw , PDO::PARAM_STR);
*/     
     
     //$com=$conn->prepare("INSERT INTO logindb(cognome,nome,sesso,nazionalità,patente,Email,Password) VALUES('franchi','nome','sesso','nazio','patente','mail','passw')");  
   

/* FUNZIONA     
    $com=$conn->prepare("INSERT INTO logindb(cognome,nome) VALUES(:cognome, :nome)");  
    $com->bindValue(':cognome', $cognome, PDO::PARAM_STR);
    $com->bindValue(':nome', $nome, PDO::PARAM_STR);
    $com->execute();
*/     
     
     //FUNZIONA
     /*
   $com=$conn->prepare("INSERT INTO logindb set cognome = :cognome , nome = :nome ");  
    $com->bindValue(':cognome', $cognome, PDO::PARAM_STR);
    $com->bindValue(':nome', $nome, PDO::PARAM_STR);
   $com->execute();
     */
    //BABBO
   /* Funziona
     $stmt = $conn->prepare("INSERT INTO logindb(cognome, nome) VALUES (:cognome, :nome)");
    $stmt->bindParam(':cognome', $cognome, PDO::PARAM_STR);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->execute(); 
     */ 
     
  }catch(PDOException $e)
   {
      echo 'Connessione fallita';
      //$e->getMessage();
   }
  $conn=null;
  //sleep(2);
 // $conn->die();
}

?>

<style>
 div[id=div1] {display:<?php echo "$divmode"?>;}
 div[id=div2] {display:<?php echo "$div2mode"?>;}
 div[id=div3] {display:<?php echo"$div3mode"?>;}
 .container{
    height: 20px;
    width:20px;
  }
  .ss{
    font-size:20px;
  }
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
  function goback()
  {
    window.history.back();
    return
  }
</script>


<html>
  <div id="div1">
  <form action="" method="post" name="formone" onsubmit="return verificadati()">    <!--probabilmente sarà necessario  effettuare-->
    <h1><?php echo $titolo ?></h1><br>
    <input type="hidden" name="contatore" value="<?php echo "$contatore"?>">
    cognome: <input type="text" name="cognome"><br>
    nome:<input type="text" name="nome"><br>
    sesso:<input type="radio" value="m" name="sesso" class="container"><a class="ss">maschile</a> <input type="radio" value="f" name="sesso" class="container"><a class="ss">femminile</a> <br>
    nazionalità: <select name="nazio"><option value="ita">Italiana</option> <option value="USA">Americana</option>></select><br>
    patente:<input type="checkbox" name="a" value="av"> cat.A <input type="checkbox" name="b" value="bv">cat.B <br>
    E-mail: <input type="text" name="mail"><br>
    password: <input type="text" name="pass"><br>
    <button type="reset" name="but"><?php echo "$mb"?></button>  <button type="submit" name="butt"><?php echo "$mb2" ?></button> 
    </form> <!--potrebbe essere una buona idea creare un altro form-->
  </div>
  <div id="div2">
    <form action="" method="post" name="formtwo">
      cognome: <?php echo "$rcognome"?><br>
      nome: <?php echo "$rnome" ?><br>
      sesso: <?php echo "$rsesso"?><br>
      nazionalita': <?php echo "$rnazio"?><br>
      patente: <?php echo "$rpatente"?><br>
      E-mail: <?php echo "$remail"?><br>
      <input type="hidden" name="cognomei" value="<?php echo "$rcognome"?>">
      <input type="hidden" name="nomei" value="<?php echo "$rnome"?>">
      <input type="hidden" name="sessoi" value="<?php echo "$rsesso"?>">
      <input type="hidden" name="nazioi" value="<?php echo "$rnazio"?>">
      <input type="hidden" name="patentei" value="<?php echo "$rpatente"?>">
      <input type="hidden" name="maili" value="<?php echo "$remail"?>">
      <input type="hidden" name="passi" value="<?php echo "$rpass"?>">
      <input type="hidden" name="contatore" value="<?php echo "$contatore"?>">
      <button type="button" onclick="goback()">correggi</button> <button type="submit" name="butt2">registra</button>        
    </form> 
  </div>
  <div id="div3">
    <h3>Dati correttamente registrati</h3><br>
   <button type="button" onclick=document.location.href="http://federep-fedefranchi99295478.codeanyapp.com/es2login.php/">chiudi</button> 
  </div>
  
</html>