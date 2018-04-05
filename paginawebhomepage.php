<!DOCTYPE html>
<?php 
$divloggato="none";
$divlogtype="none";
$divlogreg="none";
if(isset($_POST["loggato"]))
{
 $loggato=$_POST["loggato"];
}
else{
  $loggato="false";
}
if(isset($_POST["Email"]) && $loggato=="false")//inserire verifica di controllo (per sapere se bisogna controllare nel database o se hai gia' controllato)
{
   $serverloc='mysql:host=localhost;dbname=datalogin';
  $username="root";
  $pass="federico";
  try
  {
   $conn=new PDO($serverloc,$username,$pass);
   $com=$conn->prepare("SELECT Email,Password FROM logindb WHERE Email=:mail AND Password=:pass");
   $com->bindValue(":mail",$_POST["Email"]);
   $com->bindValue(":pass",$_POST["pass"]);
   $com->execute();
   $row=$com->fetch();
   $nrighe=$com->rowCount(); //variabile che conterra' il numero delle righe
    if($nrighe==1)
    {
      $loggato="vero";
      $email=$row["Email"];
    }
    else
    {
      echo "credenziali errate";
    }
    echo $row["Email"];
    /*echo "<br>";
    echo $row["Password"];
    echo $loggato;*/
  }catch(Exception $e){echo $e;}
 
}

if(isset($_POST["loggarsi"])==true)
{
//  echo "<br>loggarsi e' true";
 if($_POST["loggarsi"]=="loginpremuto")
 {
   $divlogtype="inline";
 }
 else
 {
  $divlogtype="none";
 }
}
else if(!isset($_POST["loggarsi"]))
{  
//  echo "<br>loggarsi non esiste";
  $divlogtype="none";
}

if($loggato=="vero")
{
  $divloggato="inline";
}
else{
  $divlogreg="inline";
}
?>

<style>
  div[id=divlog] {display:<?php echo $divlogtype ?>;} 
  div[id=divloggato] {display:<?php echo $divloggato ?>;}
  div[id=divlogreg]{display:<?php echo $divlogreg ?>;}
</style>

<script>
  function verificadati()
  {
  
    if(document.formlogin.Email.value.length<1)
      {
        alert("non e' stata inserita l'Email");
        return false;
      }
    else if(document.formlogin.pass.value.length<1)
      {
        alert("non e' stata inserita la password");
        return false;
      }
  

   if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(formlogin.Email.value))
    {
      return true;
    }
    else
    {
      alert("L'indirizzo Email inserito non è valido")
      return false;
    }
    return true;
 }
</script>

<html>  
  <body>
  <h1>Homepage</h1><br>
    
      <div id="divlogreg">
       <form action="" method="post" name="formpulsantelogin">
      <button ><a href="http://federep-fedefranchi99295478.codeanyapp.com/es2registrazione.php/">registrati</a></button>
      <input type="hidden" name="loggarsi" value="loginpremuto">
      <button type="submit">login</button>
    </form>
        </div>
    
    <div id="divlog">
    <form action="" method="post" name="formlogin"  onsubmit="return verificadati()">
      Email: <input type="text" name="Email"><br>
      password: <input type="text" name="pass"><br>
    <!--  <input type="hidden" name="loggarsi" value="<?php echo $_POST["loggarsi"] ?>">  -->
      
     <button onclick="goback()">annulla</button>  <button type="submit">entra</button>
    </form>   
    </div>
    
    <div id="divloggato">
      <form action="" method="post" name="formloggato">
        <p>Benvenuto  <?php echo $email?></p>
        <input type="hidden" name="loggato" value="<?php echo $loggato?>">
        <input type="hidden" name="email" value="<?php echo $email?>">
      </form>           
    </div>
 
  </body>
</html>