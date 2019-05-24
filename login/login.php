<?php
$paginaTitel = 'CreaTijd | Inlogpagina';
require_once '../header.php';
?>
        <div class="main-title">
            <H1 class="main-title__title">Inlogpagina</H1>
        </div>
        <section class="inlog-form">
            <form id="loginForm" action="includes/login.inc.php" method="POST">
                <input type="text" name="inlogNaam" id="inlogNaam" placeholder="inlognaam/emailadres">
                <input type="password" name="inlogPwd" id="inlogPwd" placeholder="wachtwoord">
                <button type="submit" name="inlogBtn" id="inlogBtn">Inloggen</button>
                <p class="login-form__link"><a href="signup.php">Een account maken</a></p>
                <p class="login-form__link"><a href="vergeten.php">Wachtwoord vergeten</a></p>
            </form>
        </section>
        <section>
            <div class="error">
                <p></p>
            </div>
        </section>
	</body>
</html>