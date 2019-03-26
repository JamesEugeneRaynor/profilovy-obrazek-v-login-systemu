<?php
if (isset($_POST['submit'])) {

    $soubor = $_FILES['soubor'];
    echo "<pre>";
    print_r($soubor);
    echo "</pre>";
    $soubor_jmeno = $_FILES['soubor']['name'];
    $soubor_umisteni = $_FILES['soubor']['tmp_name'];
    $soubor_velikost = $_FILES['soubor']['size'];
    $soubor_chyby = $_FILES['soubor']['error'];
    $soubor_typ = $_FILES['soubor']['type'];
    echo "<br>" . $soubor_jmeno;
    echo "<br>" . $soubor_umisteni;
    echo "<br>" . $soubor_velikost;
    echo "<br>" . $soubor_chyby;
    echo "<br>" . $soubor_typ;
    $soubor_rozebrany = explode('.', $soubor_jmeno); // array(soubor, pripona) 
    $soubor_pripona = strtolower(end($soubor_rozebrany));
    echo "<br>"; 
    print_r($soubor_rozebrany);
    echo "<br>" . $soubor_pripona;
    $dovolenePripony = array('jpg', 'jpeg', 'gif', 'bmp', 'png', 'pdf');
    if ( in_array($soubor_pripona, $dovolenePripony)) {
         if ($soubor_chyby==0) {
             if ($soubor_velikost<5000000) {
                 // vygenerujeme unikatni jmeno kvuli zamezeni duplicity
                 $soubor_nove_jmeno = uniqid('', true).".".$soubor_pripona;
                 $soubor_nove_umisteni = 'uploads/'. $soubor_nove_jmeno;
                 move_uploaded_file($soubor_umisteni,$soubor_nove_umisteni);
                 header('Location:index.php?uspesneNahrano');
             } else {
                 echo "soubor je moc velky";
             }
         } else {
             echo "stala se nejaka chyba";
         }
    } else {
        echo "nedovolena pripona";
    }
}
else {
    echo "stala se chyba";
}