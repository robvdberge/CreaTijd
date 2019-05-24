<?php
require 'login.inc.php';

if ( array_key_exists( 'verzendContactModal', $_POST )){
    //sanitize inputs
    $naam = stripslashes($_POST['naam']);
    $mail = stripslashes($_POST['email']);
    $bericht = stripslashes($_POST['bericht']);
    if ($_POST['kopieMail'] == 'ja'){
        $kopie = TRUE;
    } else { 
        $kopie = FALSE;
    }
    if ( empty($naam) || empty($mail) ){
        header('location: /contact.php?Error=legevelden');
        exit();
    } else if ( !filter_var( $mail, FILTER_VALIDATE_EMAIL )) { 
        header('location: /contact.php?Error=ongeldigeEmail&naam=' . $naam );
        exit();
    }else if ( !preg_match( "/^[a-zA-Z0-9]*$/", $naam )){
        header('location: /contact.php?Error=ongeldigeNaam&email=' . $mail );
        exit();
    }else if( !filter_var( $mail, FILTER_VALIDATE_EMAIL ) && !preg_match( "/^[a-zA-Z0-9]*$/", $naam)){
        header('location: /contact.php?Error=ongeldigeInvoer' );
        exit();
    }else{
        $onderwerp = 'Een vraag of opmerking van ' . $naam;                 //maak mail bericht
        if (!mail($mailAdres, $onderwerp, $bericht, 'From: ' . $mail)){     //verzend mailbericht aan info@CreaTijd.nl
            header('location: /contact.php?Error=nietVerstuurd');
            exit();
        } elseif ( $kopie ){
            if (!mail($mail, $onderwerp, $bericht, 'From: ' . $mail)){     //verzend mailbericht aan info@CreaTijd.nl
                header('location: /contact.php?Error=kopienietVerstuurd');
                exit();
            }else{
                header('location: /contact.php?Success=verzendenGelukt');
                exit();
            }
        } else{
            header('location: /contact.php?Success=verzendenGelukt');
            exit();
        }
    } 
}

if ( array_key_exists('annuleerContactForm', $_POST) ){
    header('location: /contact.php?Success=actiegeannuleerd');
    exit();
}