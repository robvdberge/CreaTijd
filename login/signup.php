<?php
$paginaTitel = 'CreaTijd | Signuppagina';
require_once '..//header.php';
?>
    <div class="main-title">
        <H1 class="main-title__title">Signup pagina</H1>
    </div>
        <section id=mainContainer class="inlog-form"> 
            <form id="loginForm" action="includes/login.inc.php" method="POST">
                <input type="text" name="naam" id="inlogNaam" placeholder="Janus123">
                <input type="email" name="email" id="inlogEmail" placeholder="iemand@emailadres.com">
                <input type="password" name="pwd" id="inlogPwd" placeholder="wachtwoord">
                <input type="password" name="pwdRepeat" id="inlogPwdRepeat" placeholder="Herhaal wachtwoord">
                <button type="submit" name="aanmeldBtn" id="aanmeldBtn">Aanmelden</button>
                <p class="login-form__link"><a href="login.php">Ik heb al een account</a></p>
            </form>
        </section>
	</body>
</html>