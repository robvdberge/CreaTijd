<?php
require_once 'includes/login.inc.php';
$ingelogd = false;
if (isset($_SESSION['ingelogd'])){
    if($_SESSION['ingelogd']){
        $ingelogd = true;
        $sessie = new sessie( $_SESSION['naam'], $_SESSION['email']);
        $sessieTijd = $_SESSION['eindTijd'];
    }else { 
        $ingelogd = false;
        $sessieTijd = '';
    }
}

?>
<!DOCTYPE html>
<html lang="nl">
	<head>
		<Title>Inlog pagina</Title>
			<meta charset="utf-8">
			<meta name="description" content="Een website ontwerpen">
			<meta name="robots" content="noindex,nofollow">
			<meta name="viewport" content="initial-scale=1.0 width=device-width, initial-scale=1">
            <link rel="stylesheet" href="style.css" type="text/css" media="screen">
            <script src="jquery.js"></script>
	</head>
	<!---------------------begin pagina------------------------>
	<body>
        <header>
            <nav>
                <?php if (array_key_exists('ingelogd', $_SESSION)){echo ($ingelogd)?($sessieTijd - time()):'';} ?>
                <a href="index.php">Home</a>
                <?php echo ($ingelogd)? '<a href="instellingen.php">Instellingen</a>' : ''; ?>
                <form action="/includes/login.inc.php" method="POST">
                    <button type="submit" name="<?php if( isset($_SESSION['ingelogd']) ){if ($_SESSION['ingelogd']){echo 'navUitlogBtn';}else {echo 'navInlogBtn';}}else{echo 'navInlogBtn';};?>" id="navInlogBtn"><?php if( isset($_SESSION['ingelogd'])){if ($_SESSION['ingelogd']){echo 'Uitloggen';}else {echo 'Inloggen';}}else{echo 'Inloggen';}?> </button>
                </form>
            </nav>
        </header>