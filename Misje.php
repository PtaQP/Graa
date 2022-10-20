<?php
    session_start();
    require('connection.php');

    $gracz=("SELECT * FROM users, statystyki WHERE users.ID=statystyki.ID AND users.Username='$_SESSION[Uzytkownik]'LIMIT 1 ");
    $misja=mysqli_query($conn, $gracz);
    $misja=mysqli_fetch_assoc($misja);


    if(isset($_GET['pts']))
    {
        if($_GET['pts']==1)
        {
            $gracz=("UPDATE statystyki SET Doswiadczenie=Doswiadczenie+50 LIMIT 1 ");
            $misja=mysqli_query($conn, $gracz);
            echo 'Zyskales 50pkt Doswiadczenia!<br>';
            //$Czas_trwania = "120"; //sekundy
            //$time = time(); // aktualny czas
            //$Koniec = $time + $Czas_trwania; // future date for event to end
            $Czas=("UPDATE statystyki SET Czas_Misji LIMIT 1");
            $quer=mysqli_query($conn, "SELECT Czas_Misji FROM statystyki LIMIT 1");
            $quer=mysqli_fetch_assoc($quer);
            require('Leveling.php');
        }
        if($_GET['pts']==2)
        {
            $gracz=("UPDATE statystyki SET Doswiadczenie=Doswiadczenie+100 LIMIT 1 ");
            $misja=mysqli_query($conn, $gracz);
            echo 'Zyskales 100pkt Doswiadczenia!<br>';
            require('Leveling.php');
        }
        if($_GET['pts']==3)
        {
            $gracz=("UPDATE statystyki SET Doswiadczenie=Doswiadczenie+150 LIMIT 1 ");
            $misja=mysqli_query($conn, $gracz);
            echo 'Zyskales 150pkt Doswiadczenia!<br>';
            require('Leveling.php');
        }
    }
?>
<a href="Misje.php?action=miesja&pts=1">Rozpoczynam-</a> Misja łatwa 2:00min<br>
<a href="Misje.php?action=miesja&pts=2">Rozpoczynam-</a> Misja średnia 5:00min<br>
<a href="Misje.php?action=miesja&pts=3">Rozpoczynam-</a> Misja Cięzka 10:00min<br>