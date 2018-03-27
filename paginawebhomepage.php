<!DOCTYPE html>
<?php 
//$loggato="prova";
if(isset($_POST["username"]) && $loggato=="false")//inserire verifica di controllo (per sapere se bisogna controllare nel database o se hai gia' controllato)
{
   $serverloc='mysql:host=localhost;dbname=datalogin';
  $username="root";
  $pass="federico";
  try
  {
   $conn=new PDO($serverloc,$username,$pass);
   $com=$conn->prepare("SELECT Username,Password FROM logindb WHERE Username=:user AND Password=:pass");
   $com->bindValue(":user",$_POST["username"]);
   $com->bindValue(":pass",$_POST["pass"]);
   $com->execute();
   $row=$com->fetch();
   $nrighe=$com->rowCount(); //variabile che conterra' il numero delle righe
    if($nrighe==1)
    {
      $loggato="vero";
    }
    echo $row["Username"];
    echo "<br>";
    echo $row["Password"];
    echo $loggato;
  }catch(Exception $e){echo $e;}
}
if($loggato=="vero")
{
  $messaggio=" questa e' la homepage vista da un utente registrato";
}
else if(!isset($_POST["loggato"]))
{
  //echo "loggato=false";
  $loggato="false";
}
else
{
  $loggato=$_POST["loggato"];
}

if($loggato!="vero")
{
  $messaggio="questa e' la homepage vista da un utente non registrato";
}
if(isset($_POST["loggarsi"])==true)
{
  echo "<br>loggarsi e' true";
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
  echo "<br>loggarsi non esiste";
  $divlogtype="none";
}
?>
<style>
  div[id=divlog] {display:<?php echo $divlogtype ?>;} 
</style>

<script>
  function verificadati()
  {
  
    if(document.formlogin.username.value.length<1)
      {
        alert("non e' stato inserito il nome utente");
        return false;
      }
    else if(document.formlogin.pass.value.length<1)
      {
        alert("non e' stata inserita la password");
        return false;
      }
    else{
    return true;
    }
  }
</script>

<html>  
  <body>
  <h1>Homepage</h1><br>
    
 <button ><a href="http://federep-fedefranchi99295478.codeanyapp.com/es2registrazione.php/">registrati</a></button>
      
    <form action="" method="post" name="formpulsantelogin">
      <input type="hidden" name="loggarsi" value="loginpremuto">
      <button type="submit">login</button>
    </form>
    
    <div id="divlog">
    <form action="" method="post" name="formlogin"  onsubmit="return verificadati()">
      username: <input type="text" name="username"><br>
      password: <input type="text" name="pass"><br>
      <input type="hidden" name="loggarsi" value="<?php echo $_POST["loggarsi"] ?>">
      
     <button onclick="goback()">annulla</button>  <button type="submit">entra</button>
    </form>   
    </div>
    
    <h3>
      <?php echo $messaggio?>
      
    </h3>
  </body>
</html>