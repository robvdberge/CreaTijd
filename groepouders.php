<?php 
$paginaTitel = 'CreaTijd Groepen | (hulp)Ouders';
require_once 'header.php';
?>
</header>
<div class="main-title">
    <H1 class="main-title__title">Groepenpagina</H1>
    <span class="main-title__span">Voor (hulp)ouders</span>
</div>
<main>
    <div class="inleiding">
        <h2 class="inleiding-title">Informatie voor ouders</h2>
        <p class="inleiding-tekst">
            Het is vanzelfsprekend dat je je kind alleen toevertrouwd aan mensen bij wie je een goed gevoel hebt.
            Daarom probeer ik wat uit te leggen over wat CreaTijd doet.
        </p>
        <h3>Kennisdrempel</h3>
        <p class="inleiding-tekst">
            In de loop van de jaren heb ik vele project verzameld waar iedereen mee uit de voeten kan.
            Deze projecten zijn voorzien van een duidelijke werkomschrijving, maar er zijn altijd mensen in de buurt
            die precies weten hoe het project gemaakt wordt.
            Er is dus geen kennis voor nodig om een project te maken.
            Wel zijn de projecten ingedeeld op leeftijd, zo is er een categorie 4 tot 8 jaar, 8 tot 12 jaar en een senior categorie.
            Nieuwe projecten zijn altijd welkom, dus laat het weten wanneer je een goed idee hebt.
        </p>
        <section class="onderwerpen">
        <h2 class="onderwerpen-titel streep">Knutsel voorbeelden</h2>
            <div class="onderwerpen-fotos">
                <img src="/img/vogelhuisje-maken.jpg" alt="een vogelhuisje bouw pakket">
                <img src="/img/hout_branden.jpg" alt="een hout-brand project">
                <img src="/img/vlieger_maken.jpg" alt="zelf een vlieger maken">
            </div>
        </section>
        <h3 class="inleiding-title">Openingstijden</h3>
        <p class="inleiding-tekst">
            Het pand waarin we onze knutselmiddagen geven is een gedeelde locatie, ik ben dus niet op elk moment aanwezig.
            Om ervoor te zorgen dat niemand voor een dichte deur staat, verwijs ik je graag naar <a href="openingstijden.php">de openingstijden-pagina.</a>
        </p>
        <h3 class="inleiding-title">Veiligheid</h3>
        <p class="inleiding-tekst">
            Iedereen met kinderen weet hoe belangrijk veiligheid is.
            <img src="/img/groep4.jpg" alt="een vrouw begeleid een kind in knutselen">
            Ook bij het knutselen heeft veiligheid daarom prioriteit.
            Wanneer er knutselprojecten gedaan worden die wat meer finesse nodig hebben (houtbranden/figuurzagen/enz.) is er altijd een hulpouders
            die dit proces helemaal begeleid.
            Ook zijn voor bepaalde projecten dingen als handschoenen, veiligheidsbril of gehoorbescherming aanwezig.
        </p>
        <h3 class="inleiding-title">Prijzen</h3>
        <p class="inleiding-tekst">
            Alle prijzen die we hanteren zijn de kostprijzen.
            Voor CreaTijd is het belangrijk dat iedereen mee kan doen aan onze knustelmiddagen, wij willen hier niets op verdienen.
            Omdat alle materialen (hout/papier/lijm/verf/enz.) geld kosten, wordt wel geld gevraagd voor een knustelmiddag.
            Buitenom de prijzen voor koffie/thee en limonade, zitten alle onkosten in de knutselmiddagprijs.
            Wil je meer weten over onze prijzen bekijk dan de <a href="prijzen.php">prijzen-pagina.</a> 
        </p>
    </div>
    
    <section class="hulpouder">
        <h2 class="hulpouder-title">Hulpouders</h2>
        <p class="hulpouder tekst">
            Omdat het voor ons belangrijker is dat iedereen mee kan doen dan om hier rijk van te worden, zijn we afhankelijk van 
            vrijwilligers. Voor elke groep proberen we 5 hulpouders in te schakelen zodat de veiligheid gewaarborgd blijft, maar ook
            zodat iedereen de hulp kan krijgen die ze nodig hebben. Vind je het leuk om ons (of de knutselaars) te helpen geef je dan op via ons
            aanmeldsysteem. Heb je nog vragen, neem dan gerust contact met ons op.
        </p>
    </section>
    <section class="sfeer">
        <h2 class="sfeer-title streep">Gezellige groepen</h2>
        <div class="sfeer-fotos">
            <img src="/img/kind_graveert_glas.jpg" alt="een kind graveert een glas">
            <img src="/img/kinderen_hollen_pompoen_uit.jpeg" alt="kinderen hollen een pompen uit">
            <img src="/img/kinderen_tekenen.jpeg" alt="twee kinderen tekenen een tekening">
            <img src="/img/vlieger_maken.jpg" alt="een kind maak een vlieger">
            <img src="/img/klei_jurken.jpeg" alt="kinderen geven poppen jurken van klei">
        </div>
    </section>
    <section class="groepsgrootte">
        <h2 class="groepsgrootte">De grootte van de groepen</h2>
        <p class="groepsgrootte">
            De locatie waar de knutselmiddagen worden gehouden heeft plaats voor maximaal 20 personen.
            Meld je dus snel aan voor de volgende knutselmiddag!
        </p>
        <div class="CTA">
            <button type="submit" name="aanmelden" class="aanmeld-btn">Aanmelden</button>
        </div>
    </section>
</main>
<?php
require_once 'footer.php';