<?php 
require_once 'header.php';

?>

        <section class="error">
            <H1>Inlog Project</H1>
            <p><?php 
                if (isset($_SESSION['ingelogd'])){
                    if ($_SESSION['ingelogd']){
                        echo 'Welkom ' . $_SESSION['naam'] . ' met emailadres ' . $_SESSION['email'] . "<br>";
                        echo 'Deze tekst is alleen te zien als je ingelogd bent!';//."<br> Session = ";

                    }
                }

            ?></p>
        </section>
        <script src="script.js"></script>
	</body>
</html>