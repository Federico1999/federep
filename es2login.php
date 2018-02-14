<!DOCTYPE html>
<?php 
$titolo;



?>
<html>
  <form action="" method="post">      
<?php echo $titolo ?>
    cognome: <input type="text" name="cognome"><br>
    nome: <input type="text" name="nome"><br>
    sesso:  <input type="radio" value="m" name="maschio">maschile  <input type="radio" value="f" name="femmina">femminile <br>
    nazionalità: <select name="nazio"><option value="ita">Italiana</option> <option value="USA">Americana</option>></select>
  </form>
</html>