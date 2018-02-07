<!DOCTYPE hmtl>
<html>
  <head>
    <form action="" method="post">
    <title>Gioconumero</title>
  </head>
  <body>
    <h1>Gioco dell'indovina il numero</h1>
    <?php 
    $count=0; //potrebbe essere necessario modificare il numero
    echo "regole del gioco<br>";
    echo "il giocatore deve indovinare un numero compreso tra 1 e 100<br>";
    echo "con max 7 tentativi<br>";
    ?>
    <br>
    <button type="submit" id="bottone">Inizia il gioco</button>
  </form>
  </body>
</html>