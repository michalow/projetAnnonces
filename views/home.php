<?php 
/* require_once __DIR__.'/models/functions.php';
require_once __DIR__.'/models/functions2.php'; */
 ?>
<div class="main">
	<div class="home">
		<h1>Petites annonces HOME</h1>
		<section class="recent">

		<!-- https://getbootstrap.com/docs/3.3/components/#thumbnails -->
		
		<?php 
		$annoncesPhotos=getAnnoncesPhotos();
		foreach($annoncesPhotos as $annoncePhoto){
			?>
			<div>
				<div><img src="<?= $annoncePhoto["url"];?>" alt="<?= $annoncePhoto["titre"];?>" width="150" height="150"></div>
				<div><?= $annoncePhoto["titre"];?></div>
				<div><?= $annoncePhoto["prix_vente"];?></div>
			</div>
			<?php } ?>
		
		</section>
		<?php if(!$logged):?>
		<a class="button" href="?p=signup">Créer un compte</a>
		<a class="button" href="?p=signup">Se connecter</a>

		<?php else :; ?>
		<a href="?p=espace">Espace Membre</a>

		<?php endif ; ?>
	</div>
</div>	
