<?php

require 'dbh.inc.php';
require 'session.inc.php';

$db = new database;
$db->verbinden();

$mailAdres = 'robvdberge@gmail.com'; // zou info@CreaTijd.nl moeten zijn

session_set_cookie_params ( 6000 , '/' ); // set cookie to 600 sec
session_start();
//  ------------------------------------------Functies---------------------------------------------------//

function nieuwPwd($lengte = 6){
    $karakters='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $totaal = strlen($karakters);
        $regenPwd = '';
        for ( $i = 0; $i <= $lengte; $i++ ){
            $regenPwd .= $karakters[rand(0, $totaal - 1)];
        }
        return $regenPwd;
}

//------------------------------------------PostRequests----------------------------------------------------//

if (isset($_SESSION['ingelogd'])){
    if($_SESSION['ingelogd']){
        $sessie = new sessie( $_SESSION['naam'], $_SESSION['email']);
    }
}

if ( array_key_exists( 'navInlogBtn', $_POST )){
    header('location: ../login.php');
    exit();
}

if ( array_key_exists( 'aanmeldBtn', $_POST )){
    $naam = stripslashes($_POST['naam']);
    $mail = stripslashes($_POST['email']);
    $pwd1 = stripslashes($_POST['pwd']);
    $pwd2 = $_POST['pwdRepeat'];
    if ( empty( $naam ) || empty( $mail ) || empty( $pwd1 ) || ( $pwd1 != $pwd2 ) ){
        header('location: ../signup.php?Error=leegPassword&naam=' . $naam . '&email=' . $mail);
        exit();
    }else if ( !filter_var( $mail, FILTER_VALIDATE_EMAIL )) { 
        header('location: ../signup.php?Error=ongeldigeEmail&naam=' . $naam );
        exit();
    }else if ( !preg_match( "/^[a-zA-Z0-9]*$/", $naam )){
        header('location: ../signup.php?Error=ongeldigeNaam&email=' . $mail );
        exit();
    }else if( !filter_var( $mail, FILTER_VALIDATE_EMAIL ) && !preg_match( "/^[a-zA-Z0-9]*$/", $naam)){
        header('location: ../signup.php?Error=ongeldigeInvoer' );
        exit();
    }else { //kijk of de username al bestaat in de db
    
        if ( !empty($result = $db->checkNaam($naam)) ){
            header('location: ../signup.php?Error=naambestaatal&email=' . $mail );
            exit();

        } else { // als er nog geen gebuikersnaam bestaat
            $hashedPwd = password_hash( $pwd1, PASSWORD_DEFAULT);
            if ( $db->nieuweAccount($naam, $mail, $hashedPwd) ){
                header('location: ../login.php?Success=accountgemaakt' );
            };
        }
    }
}

if ( array_key_exists( 'inlogBtn', $_POST ) ){
    if ( $db->verbinden() ){
        $naam = $_POST['inlogNaam'];
        $pwd = stripslashes($_POST['inlogPwd']);
        if ( empty( $naam ) || empty( $pwd ) ){
            header('location: ../login.php?Error=legevelden');
            exit;
        } else if ( !preg_match( "/^[a-zA-Z0-9]*$/", $naam)){
            header('location: ../login.php?Error=ongeldigeInvoer' );
            exit();
        } else{
            $result = $db->checkPwd($naam);
            if ( array_key_exists( 'naam', $result ) ){
                if ( password_verify($pwd, $result->pwd) ) {
                    $mail = $result->email;
                    $sessie = new sessie( $naam, $mail );
                    $sessie->inloggen();
                    header('location: /index.php?Success=ingelogd'); // user is ingelogd
                    exit();
                }else { 
                    header('location: ../login.php?Error=onjuistecombinatie');
                    exit();
                }
            } else {
                header('location: ../login.php?Error=onjuistecombinatie' );
                exit();
            }
        }
    }
}

if ( array_key_exists( 'navUitlogBtn', $_POST ) ){
    $sessie->uitloggen();
    header('location: ../../index.php?Success=uitgelogd');
    exit();
}

if ( array_key_exists( 'opslaan', $_POST)){
    $naam = $_SESSION['naam'];
    $email = stripslashes($_POST['email']);
    if ( empty($naam) || empty($email) ){
        header('location: ../instellingen.php?Error=legevelden');
        exit();
    }else  if ( !filter_var( $email, FILTER_VALIDATE_EMAIL )) { 
        header('location: ../intellingen.php?Error=ongeldigeEmail&naam=' . $naam );
        exit();
    }else if ( !preg_match( "/^[a-zA-Z0-9]*$/", $naam )){
        header('location: ../instellingen.php?Error=ongeldigeNaam&email=' . $email );
        exit();
    }else {
        if (!$db->slaGebruikerOp($naam, $email)){
            header('location: ../instellingen.php?Error=nietopgeslagen');
            exit();
        } else {
            header('location: ../instellingen.php?Success=opslaangelukt');
            exit();
        }
    }
}

if ( array_key_exists( 'bevestigWijzig',$_POST )){
    $oldPass = stripslashes($_POST['oldPwd']);
    $newPass = stripslashes($_POST['newPwd']);
    $newPwdRepeat = stripslashes($_POST['newPwdRepeat']);
    if ( $newPass != $newPwdRepeat ){
        header('location: instellingen.php?Error=wachtwoordnietzelfde');
        exit();
    }else if ( strlen($newPass) < 5 ) {
        header('location: instellingen.php?Error=wachtwoordtekort');
        exit();
    }else{
        $naam = $_SESSION['naam'];
        $result = $db->checkPwd($naam);
        if ( array_key_exists( 'pwd', $result ) ){
            if ( password_verify($oldPass, $result->pwd) ) {
                $email = $result->email;
                $hashedPwd = password_hash( $newPass, PASSWORD_DEFAULT);
                if ($db->veranderPwd($email, $hashedPwd)){
                   header('location: instellingen.php?Success=wachtwoordverandert');
                    exit(); 
                } else {
                    header('location: instellingen.php?Error=nietopgeslagen');
                    exit();
                }
            }else { 
                header('location: instellingen.php?Error=onjuistecombinatie');
                exit();
            }
        } else {
            header('location: login.php?Error=onjuistecombinatie' );
            exit();
        }
    }
}

if ( array_key_exists( 'cancelVergeten', $_POST )){
    header('location: ../login.php?Success=actiegeannuleerd');
    exit();
}

if ( array_key_exists( 'vergetenWachtwoord', $_POST )){
    $email = stripslashes($_POST['emailVergeten']);
    if ( empty($email) ){
        header('location: ../vergeten.php?Error=legevelden');
        exit();
    }else if ( !filter_var( $email, FILTER_VALIDATE_EMAIL )) {  // sanitize email invoer
        header('location: ../vergeten.php?Error=ongeldigeEmail' );
        exit();
    }else if ( !$result = $db->checkMail($email) ){// check of email voorkomt in database
        header('location: ../vergeten.php?Error=emailnietbekent');
        exit();
    }else { // maak nieuw wachtwoord aan
        $regenPwd = nieuwPwd(7);
        $onderwerp = 'Nieuw Wachtwoord';
        $bericht = 'Uw nieuwe wachtwoord is : '. $regenPwd . "<br>" . ' Verander alstublieft dit wachtwoord op de instelling-pagina.';
        if (!mail($mailAdres, $onderwerp, $bericht, 'From: Noreply@CreaTijd.nl')){
            header('location: ../vergeten.php?Error=nietVerstuurd');
            exit();
        }else {
            if (!$hashedPwd = password_hash( $regenPwd, PASSWORD_DEFAULT)){
                header('location: ../vergeten.php?Error=Erisietsfoutgegaan'); 
                exit();
            }else if($db->veranderPwd($email, $hashedPwd)){
                header('location: ../login.php?Success=nieuwWachtwoordVerstuurd'); 
                exit();
            } else {
                header('location: ../vergeten.php?Error=ProbeerOpnieuw');
                exit();
            }
        }
    }
        
} 

