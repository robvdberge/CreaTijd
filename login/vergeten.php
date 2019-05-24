<?php
$paginaTitel = 'CreaTijd | Wachtwoordvergeten';
require_once '../header.php';
?>
<div class="main-title">
    <H1 class="main-title__title">Wachtwoord vergeten</H1>
</div>
<section class="inlog-form">
    <form id="loginForm" action="includes/login.inc.php" method="POST">
        <label for="email">Voer uw email adres in om een nieuw wachtwoord te maken.</label>
        <input type="email" name="emailVergeten" id="inlogPwd" placeholder="email">
        <button type="submit" name="vergetenWachtwoord" id="vergetenBtn">Vraag aan</button>
        <button name="cancelVergeten" id="inlogBtn">Terug</button>
        <p class="login-form__link"><a href="signup.php">Een account maken</a></p>
    </form>
</section>  
        <section>
            <div class="error">
                <p></p>
            </div>
        </section>
	</body>
</html>