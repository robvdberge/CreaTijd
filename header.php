<?php 
!isset($melding)?$melding = '':'';
require '../login/includes/login.inc.php';

// maak de melding adhv de GET variabele - error sectie
if (array_key_exists('Error', $_GET) ){
	switch ($_GET['Error']){
		case 'leegPassword':
			$melding = maakMelding('error', 'Het vak met het passwoord was leeg');
		break;
		case 'legevelden':
			$melding = maakMelding('error', 'Er waren lege velden ingevuld');
		break;
		case 'leegPassword':
			$melding = maakMelding('error', 'Het veld met het passwoord was leeg');
		break;
		case 'ongeldigeEmail':
			$melding = maakMelding('error', 'Er is een onjuist Emailadres ingevoerd');
		break;
		case 'ongeldigeNaam':
			$melding = maakMelding('error', 'Er is een ongeldige naam opgegeven');
		break;
		case 'naambestaatal':
			$melding = maakMelding('error', 'De gekozen naam bestaat al - kies een andere');
		break;
		case 'ongeldigeInvoer':
			$melding = maakMelding('error', 'Er zijn ongeldige tekens gebruikt');
		break;
		case 'onjuistecombinatie':
			$melding = maakMelding('error', 'De naam/passwoord combinatie is niet bekend');
		break;
		case 'nietopgeslagen':
			$melding = maakMelding('error', 'Er is iets foutgegaan - er is niets opgeslagen');
		break;
		case 'wachtwoordnietzelfde':
			$melding = maakMelding('error', 'De wachtwoorden zijn niet dezelfde');
		break;
		case 'wachtwoordtekort':
			$melding = maakMelding('error', 'Het gekozen wachtwoord is tekort');
		break;
		case 'emailnietbekend':
			$melding = maakMelding('error', 'Het ingevoerde emailadres is bij ons niet bekend');
		break;
		case 'sessieverlopen':
			$melding = maakMelding('error', 'De sessie is verlopen, log AUB opnieuw in.');
		break;
		default:
			$melding = maakMelding('error', 'Er is iets foutgegaan : ' . $_GET['Error']);
		break;
	}
}

// maak de melding adhv de GET variabele - succes sectie
if ( array_key_exists('Success', $_GET) ){
	switch ($_GET['Success']) {
		case 'ingelogd':
			$melding = maakMelding('success', 'U bent nu ingelogd');
		break;
		case 'uitgelogd':
			$melding = maakMelding('success', 'U bent succesvol uitgelogd');
		break;
		case 'actiegeannuleerd':
			$melding = maakMelding('success', 'De actie is geannuleerd');
		break;
		case 'wachwoordverandert':
			$melding = maakMelding('success', 'U wachtwoord is succesvol verandert');
		break;
		case 'opslaangelukt':
			$melding = maakMelding('success', 'Het opslaan van uw gegevens is gelukt');
		break;
		case 'accountgemaakt':
			$melding = maakMelding('success', 'Uw account is succesvol aangemaakt');
		break;
		case 'nieuwWachtwoordVerstuurd':
			$melding = maakMelding('success', 'Uw nieuwe wachtwoord is naar uw emailadres verstuurd');
		break;
		default:
			$melding = maakMelding('success', $_GET['Success']);
		break;
	}
}

$ingelogd = false;
if (isset($_SESSION['ingelogd'])){
    if($_SESSION['ingelogd']){
		$ingelogd = true;
		// $sessie = new sessie( $_SESSION['naam'], $_SESSION['email']);
		$sessieTijd = $_SESSION['eindTijd'];
		if ( ( time() < $_SESSION['eindTijd']) ){
			//$sessie->vernieuwSessie();
			session_reset();
			$_SESSION['eindTijd'] = time() + $_SESSION['sessieTijd'];
		}else {
			$sessie->uitloggen();
			header('location: ../login/login.php?Error=sessieverlopen');
			exit();
		}
    }else { 
        $ingelogd = false;
        $sessieTijd = '';
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
	<head>
		<Title><?php echo $paginaTitel;?></Title>
			<meta charset="utf-8">
			<meta name="Author" content="RobvdBerge">
			<meta name="description" content="Een website ontwerpen voor een fictieve knutselorganisatie">
			<meta name="robots" content="noindex,nofollow">
			<meta name="viewport" content="initial-scale=1.0 width=device-width, initial-scale=1">
			<link rel="stylesheet" href="..//styles.css" type="text/css" media="screen">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
			<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
			<script src="../scripts/script.js"></script>
			<script src="../scripts/jquery.js"></script>
	</head>
	<!---------------------begin pagina------------------------>
	<body>
		<header>
			<nav>
				<a href="../index.php" class="logo"><img src="/img/logo.png" alt="CreaTijd logo"></a>
				<ul class="nav-lijst menu-hidden">
					<li><a href="../index.php">Home</a></li>
					<li><a href="../eenknutselmiddag.php">Een knutselmiddag</a></li>
					<li><a href="../prijzen.php">Prijzen</a></li>
					<li><a href="../contact.php">Contactinformatie</a></li>
					<li><a href="../openingstijden.php">Openingstijden</a></li>
					<?php if (isset($_SESSION['ingelogd'])){ if ($_SESSION['ingelogd']){echo '<li><a href="/login/instellingen.php">Instellingen</a></li>';};}; ?>
					<li><a id="groep-submenu">Groepen <i class="fa fa-caret-down groepen-dropdown"></i> </a>
						<ul class="groepen-lijst">
							<div class="groepen-lijst-container">
								<li><a href="../groep4tot8.php">4 tot 8 jaar</a></li>
								<li><a href="../groep8tot12.php">8 tot 12 jaar</a></li>
								<li><a href="../groepsenior.php">Senior</a></li>
								<li><a href="../groepouders.php">(hulp)Ouder</a></li>
							</div>
						</ul>
					</li>
				</ul>
				<form action="/login/includes/login.inc.php" method="POST">
					<button type="submit" class="nav-aanmeld-btn" name="<?php if( isset($_SESSION['ingelogd']) ){if ($_SESSION['ingelogd']){echo 'navUitlogBtn';}else {echo 'navInlogBtn';}}else{echo 'navInlogBtn';};?>" id="navInlogBtn"><?php if( isset($_SESSION['ingelogd'])){if ($_SESSION['ingelogd']){echo 'Uitloggen';}else {echo 'Aanmelden';}}else{echo 'Aanmelden';}?></button>
				</form>
				<i id="mob-menu__btn" class="fas fa-bars"></i>
				<?php $setIcon = '<i id="mob-set__btn" class="fas fa-cog"></i>';if ( isset($_SESSION['ingelogd'])){ echo($_SESSION['ingelogd'])?$setIcon:'';}?>
				<div class="meldingContainer" id="meldingContainer">
					<div class="melding"><?php echo isset($melding)? $melding:'';?></div>
				</div>
			</nav>

<?php
/*---------------------------------------------------melding categorisatie-------------------*/
function maakMelding($cat, $tekst){
    $melding = '';
    switch ($cat){
        case 'success':
            $melding = '<i class="success">'. $tekst . '</i>';
            return $melding;
        break;

        case 'error':
            $melding = '<i class="error">' . $tekst . '</i>';
            return $melding;
        break;

        default:
            return $tekst;
        break;
    }
}
