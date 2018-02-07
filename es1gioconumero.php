<!DOCTYPE hmtl>

    <?php
    if(!isset($_POST["numerodaindovinare"])) //verifica se la 
    {
      $count= 0;
     // $messaggicontatore="prova numero "+$count;
      $numerodaindovinare = rand(1,100);
     //$_POST["numerodaindovinare"];
     // $_POST["numerodaindovinare"]= rand(1,100);
      //$_POST["count"]++;
      $messaggio="regole del gioco<br> il giocatore deve indovinare un numero compreso tra 1 e 100 <br> con max 7 tentativi<br> ";  
    }
       else
       {
        // if($_POST["numerogiocato"]==$_POST["numerodaaindovinare"]) //verifico se il numero scritto dall'utente coincide con quello da indovinare
         //{
           
         //}
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
    <p><?php echo $messaggio ?> </p>
    <br>
    <input type="hidden" name="numerodaindovinare" value="<?php echo $numerodaindovinare ?>">
    <button type="submit" id="bottone">ciao</button>
  </form>
  </body>
</html>