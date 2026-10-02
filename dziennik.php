<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dziennik Ocen</title>
</head>
<body>
    <h2>Dziennik Ocen</h2>
    <form method="POST" action="">
        Imię i Nazwisko ucznia: <input type="text" name="imie" required><br><br>
        Ocena:
        <select name="ocena">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select><br><br>
        Przedmiot:
        <input type="text" name="przedmiot" required><br><br>
        <input type="submit" name="zapisz" value="Zapisz ocenę">
     </form>

     <hr>
     
     <?php
     $nazwa_pliku = "oceny.txt";

     if (isset($_POST['zapisz'])) {
         $imie = $_POST['imie'];
         $ocena = $_POST['ocena'];
         $przedmiot = $_POST['przedmiot'];

         $fp = fopen($nazwa_pliku, 'a');
         
         if ($fp) {
             $wpis = "$imie | $przedmiot | ocena: $ocena\n";
             
             fwrite($fp, $wpis);
             fclose($fp);
             
             echo "<p>Ocena została zapisana!</p>";
         } else {
             echo "<p>Błąd: Nie można otworzyć pliku.</p>";
         }
     }
     ?>

    <h3>Zapsiane oceny:</h3>
    
    <?php
    if (file_exists($nazwa_pliku)) {
        $linie = file($nazwa_pliku);
        foreach ($linie as $linia) {
            echo htmlspecialchars($linia) . "<br>";
        }
    } else {
        echo "Brak zapisanych ocen.";
    }
    ?>

</body>
</html>