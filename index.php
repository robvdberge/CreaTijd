<?php 
$paginaTitel = 'CreaTijd | Een middag gezellig knutselen';
// $melding = $paginaTitel;
require_once 'header.php';
?>            
            <div class="carrousel">
				<div class="rondje-links">
					<i class="fas fa-angle-left button-links"></i>
				</div>
				<ul id="fotolijst">
					<li class="foto"><img src="img/knutseltafel.jpeg" alt="een tafel met knutselgerei" class="active"> </li>
					<li class="foto"><img src="img/kinderen_hollen_pompoen_uit.jpeg" alt="kinderen hollen een pompoen uit" style="display: none;"> </li>
					<li class="foto"><img src="img/jong_kind_tekent.jpeg" alt="een kind tekent een tekening" style="display: none;"> </li>
				</ul>
				<div class="rondje-rechts">
					<i class="fas fa-angle-right button-rechts"></i>
				</div>
			</div>
			<div class="header-title">
				<h1>CreaTijd</h1>
				<span>Een gezellige middag knutselen</span>

			</div>
		</header>
		<section class="groepen-container">
			<div class="groep groep1">
				<a href="groep4tot8.php">
					<img src="img/Groep1.jpg" alt="kind tekent aandachtig">
					<p class="groeptekst">4 tot 8 jaar</p>
				</a>
			</div>
			<div class="groep groep2">
				<a href="groep8tot12.php">
					<img src="img/groep2.jpg" alt="groep kinderen knutselen">
					<p class="groeptekst">8 tot 12 jaar</p>
				</a>
			</div>
			<div class="groep groep3">
				<a href="groepsenior.php">
					<img src="img/Groep3.jpg" alt="ouderen breien gezellig">
					<p class="groeptekst">Senior</p>
				</a>
			</div>
			<div class="groep groep4">
				<a href="groepouders.php">
					<img src="img/groep4.jpg" alt="vrouw helpt knutselend kind">
					<p class="groeptekst">(hulp) ouder</p>
				</a>
			</div>
		</section>
		<section class="welkomst">
			<div class="welkomst-tekst">
			<p>Beste knutselaar,</p>
			<p>CreaTijd verzorgd knutselmiddagen voor kinderen van 4 tot 12 en senioren die een middag gezellig willen knutselen.</p>
			<p>Gezelligheid en creativiteit staan bij ons voorop.</p>
			<p>Geef je nu op om een middag mee te komen knutselen.</p>
			<button type="submit" name="aanmelden" class="aanmeld-btn">Aanmelden</button>
			</div>
			<div class="welkomst-image hidden">
				<img class="kwasten hidden" src="/img/kwastenBewerkt.jpg" alt="Kleurrijke kwasten">
			</div>
		</section>
		<section class="quote">
			<div class="quote-container">
				<i class="fas fa-quote-left"></i>
				<p>De knutselmiddagen zijn mijn favoriete uitjes.</p>
				<p><span><em>Truus (67 jaar)</em></span></p>
			</div>
		</section>

		<section class="projecten">
			<p class="projecten-titel streep">Enkele projecten</p>
			<div class="projecten-cont">
				<div class="project"><img src="img/vlieger_maken.jpg" alt="kinderen maken vliegers"></div>
				<div class="project"><img src="img/bollenwol.jpeg" alt="bollen wol in een mand"></div>
				<div class="project"><img src="img/origami.jpeg" alt="papieren bootjes"></div>
				<div class="project"><img src="img/Hout_branden.jpg" alt="gebrande houtvormen"></div>
				<div class="project"><img src="img/vogelhuisje-maken.jpg" alt="geschilderde vogelhuisjes"></div>
			</div>
		</section>
<?php
require_once 'footer.php';
?>