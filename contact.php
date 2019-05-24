<?php 
$paginaTitel = 'CreaTijd | Alle contactinformatie';
require_once 'header.php';
?>
</header>
<div class="main-title">
    <H1 class="main-title__title">Contactinformatie</H1>
    <span class="main-title__span">Alles wat je wilde weten over CreaTijd</span>
</div>
<main>
<section class="CTA">
    <button id="openContactModal">Neem contact op</button>
</section>    
<section class="informatie">
    <h2 class="informatie-title streep">Contactinformatie</h2>
    <p class="informatie-uitleg">
        Natuurlijk is het altijd fijn om te weten hoe je ons kan bereiken en waar je ons kan vinden.
    </p>
    <table class="info-tabel">
        <tr>
            <td>Telefoonnummer</td>
            <td>0612345678</td>
        </tr>
        <tr>
            <td>Email adres</td>
            <td>info@creatijd.nl</td>
        </tr>
        <tr>
            <td>Loactie-adres</td>
            <td>Nieuwstraat 24</td>
        </tr>
        <tr>
            <td>Postcode</td>
            <td>4416 PP</td>
        </tr>
        <tr>
            <td>Plaats</td>
            <td>Kruiningen</td>
        </tr>
    </table>
</section>
<section class="profiel">
    <h2 class="profiel-title streep">Over mijzelf</h2>
    <p class="profiel-tekst">
    <img src="/img/profiel_foto.jpeg" alt="profielfoto" class="profiel-foto"> 
        Omdat het altijd moeilijk is om de veiligheid van uw kind aan andere mensen toe te vertrouwen, wil ik graag wat over mijzelf kwijt.
        Ik ben moeder van 2 kinderen, een jongedame van 11 en een lefgozertje van 9.
        Sinds 8 jaar ben ik lid van de Activiteiten Commissie van de basisschool waar mijn kinderen op zitten.
        Omdat ik het prachtig vind om met kinderen en ouderen te werken -maar ook van knutselen hou- heb ik in 2019 besloten CreaTijd op te richten.
        Niet om hier rijk van te worden, maar om iets te doen om anderen te helpen en bezig te houden.
        Wanneer je nog enige vragen hebt, hoor ik ze graag.
    </p>
</section>
</main>
<section class="modal-contact" id="contactForm">
    <form action="/login/includes/contactHandler.inc.php" method="POST">
        <input type="text" name="naam" placeholder="Naam" class="modal-contact-tekstinput"><i class="required">*</i>
        <input type="email" name="email" placeholder="Emailadres" class="modal-contact-tekstinput"><i class="required">*</i>
        <textarea type="text" name="bericht" placeholder="Vraag/opmerking" maxlength="150" class="modal-contact-tekstinput"></textarea><br>
        <input type="checkbox" name="kopieMail" id="kopieMail" value="ja" class="modal-checkbox">Stuur mij een kopie van dit bericht
        <i class="info-verplicht">* velden moeten ingevuld worden</i> <br>
        <button type="submit" name="verzendContactModal" id="openContactModal">Verzend</button>
        <button type="submit" name="annuleerContactForm" id="annuleerContactForm">Annuleer</button><br>
    </form>
</section>
        
<?php

require_once 'footer.php';