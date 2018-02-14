<!DOCTYPE hmtl>

    <?php
if($_POST["bottone"]=="rigioca")
{
  $_POST["numerodaindovinare"]=null;
}
    if(!isset($_POST["numerodaindovinare"])) //verifica se la 
    {
      $count= 0;
     // $messaggicontatore="prova numero "+$count;
      $numerodaindovinare = rand(1,100);
     //$_POST["numerodaindovinare"];
     // $_POST["numerodaindovinare"]= rand(1,100);
      //$_POST["count"]++;
      $messaggio="regole del gioco<br> il giocatore deve indovinare un numero compreso tra 1 e 100 <br> con max 7 tentativi<br> ";  
      $messaggiobottone="inizia il gioco";
      $tipo="hidden";
     // $tipoindizio="hidden";
    }
       else if($_POST["numerodaindovinare"]!=$_POST["numeroinserito"] and $_POST["contatore"]<7)
       {
         $numerodaindovinare=$_POST["numerodaindovinare"];
         $count=$_POST["contatore"]+1;
         $messaggio="tentativo numero $count <br>inserisci un numero";
         $tipo="text";
         $messaggiobottone="conferma";
        // $tipoindizio="hidden";
         if($_POST["contatore"]>=1)    //if(isset($_POST["numeroinserito"]))
         {
          // $tipoindizio="text";
           if($_POST["numerodaindovinare"]>$_POST["numeroinserito"])
           {
             $indicazione="il numero inserito e' troppo piccolo";
           }
           else
           {
             $indicazione="il numero inserito e' troppo grande";
           }
         }
        // if($_POST["numerogiocato"]==$_POST["numerodaaindovinare"]) //verifico se il numero scritto dall'utente coincide con quello da indovinare
         //{
           
         //}
       }
else if($_POST["numerodaindovinare"]==$_POST["numeroinserito"]) //qui
{
  $indicazione="BRAVO!";
  $count=$_POST["contatore"];
  $messaggio="HAI INDOVINATO IN $count tentativi";
  $messaggiobottone="rigioca";
}
else if($_POST["contatore"]=7) //non funziona qualcosa
{
  $indicazione="SPIACENTE...";
  $count=$_POST["contatore"];
  $messaggio="NON HAI INDOVINATO IL NUMERO";
  $messaggiobottone="rigioca";
}
     //potrebbe essere necessario modificare il numero
       
    ?>
<html>
  <head>
   <title>Gioconumero</title>
  </head> 
  <body>
    <h1>Gioco dell'indovina il numero</h1>
    <form action="" method="post">
      <p><?php if(isset($indicazione)){echo "$indicazione";}?></p>
    <p><?php echo "$messaggio"?> </p>  
    <br>
      <input type="hidden"  value="<?php echo "$count" ?>" name="contatore" >
    <input type="hidden" name="numerodaindovinare" value="<?php echo "$numerodaindovinare" ?>">
      <input type="<?php echo "$tipo" ?>" name="numeroinserito" >
      <br><br>
    <button type="submit" name="bottone" value="<?php echo "$messaggiobottone"?>"><?php echo "$messaggiobottone"?></button>
  </form>
  </body>
</html>