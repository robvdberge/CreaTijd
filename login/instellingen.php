<?php
$paginaTitel = 'CreaTijd | Instellingen';
include_once '../header.php';
$gebruiker = $db->haalGebruiker($_SESSION['naam']);
?>
<div class="main-title">
    <H1 class="main-title__title">Instellingen</H1>
</div>
<div class="container">
    <section id="hoofdinstelling">
        <form action="includes/login.inc.php" method="post">
        <fieldset>
            <legend>Account instellingen</legend>
            <label for="naam">Naam</label>
            <input type="text" name="naam" id="naamVeld" value="<?php echo $gebruiker[0]->naam; ?>" id="instelNaam" readonly>
            <label for="email">Emailadres</label>
            <input type="email" name="email" value="<?php echo $gebruiker[0]->email; ?>" id="instelEmail">
            <button type="submit" name="opslaan">Opslaan</button>
        </fieldset>
        </form>
        <form action="instellingen.php" method="post">
        <fieldset>
            <legend>Wachtwoord</legend>
            <?php
                if ( !array_key_exists('wijzigWachtwoord', $_POST)){
                    echo '<button type="submit" name="wijzigWachtwoord">Verander wachtwoord</button>' . "\n";
                } else { echo '<button type="submit" name="wijzigWachtwoord" disabled>Verander wachtwoord</button>'."\n";}
                
            if ( array_key_exists('wijzigWachtwoord', $_POST)){
                echo '<form action="includes/login.inc.php" method="POST"> ' . "\n";
                echo '<input type="password" name="oldPwd" placeholder="Huidige wachtwoord">' . "\n";
                echo '<input type="password" name="newPwd" placeholder="Nieuwe wachtwoord">' . "\n";
                echo '<input type="password" name="newPwdRepeat" placeholder="Herhaal wachtwoord">' . "\n";
                echo '<button type="submit" name="bevestigWijzig">Bevestig wijziging</button>' . "\n";
                echo '</form>' . "\n";
            }
        ?>
        </fieldset>
        <fieldset>
            <legend>Testveld</legend>
            de sessietijd is :<?php if (array_key_exists('ingelogd', $_SESSION)){echo ($_SESSION['ingelogd'])?$_SESSION['eindTijd']-time():'';} ?>
            <form action="instellingen.php">
                <button type="submit" method="POST" name="testBtn">Test</button>
                <?php echo '<br>'; print_r($_SESSION); ?>
            </form>
        </fieldset> 
        </form>
        <form action="meeknutselen.inc.php" method="post">
            <fieldset>
                <legend>Meeknutselen</legend>
            </fieldset>
        </form>
        <div class="error">
           
        </div>
    </section>
</div>

	</body>
</html>
