<?php 
$paginaTitel = 'CreaTijd | Openingstijden overzicht';
require_once 'header.php';
?>
</header>
<div class="main-title">
    <H1 class="main-title__title">Openingstijden</H1>
    <span class="main-title__span">Zodat je niet voor een dichte deur staat</span>
</div>
<main>
<section class="open">
    <h2 class="open-title streep">Openingstijden</h2>
    <p class="open-tekst">
        Er is niet altijd iemand aanwezig op onze locatie.
        Check daarom onderstaande tabel om te zien wanneer we aanwezig zijn.
    </p>
    <table class="info-tabel">
        <tr>
            <th>Dag van de week</th>
            <th>Tijd</th>
            <th>Groep</th>
        </tr>
        <tr>
            <td>Maandagmiddag*</td>
            <td>13.00 tot 16.00</td>
            <td>Senioren</td>
        </tr>
        <tr>
            <td>Donderdagmiddag**</td>
            <td>15.00 tot 17.00</td>
            <td>4 tot 8 jaar</td>
        </tr>
        <tr>
            <td>Vrijdagavond**</td>
            <td>18.30 tot 21.00</td>
            <td>8 tot 12 jaar</td>
        </tr>
        <tr>
            <td><em>* om de week</em></td>
        </tr>
        <tr>
            <td><em>** uitgezonderd schoolvakanties</em></td>
        </tr>
    </table>
</section>
</main>
        
<?php
require_once 'footer.php';