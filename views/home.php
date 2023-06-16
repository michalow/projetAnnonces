<div class="main">
	<div class="home">
		<h1>Petites annonces HOME</h1>
		<section class="recent">

		<!-- https://getbootstrap.com/docs/3.3/components/#thumbnails -->
		
		<?php 
		$annoncesPhotos=getAnnoncesPhotos(); //annonces validées
		foreach($annoncesPhotos as $annoncePhoto){
			?>
			<div>
				<a href="index.php?p=annonces&id=<?= $annoncePhoto["id"] ?>">
				<div><img src="<?= $annoncePhoto["url"];?>" alt="<?= $annoncePhoto["titre"];?>" width="150" height="150"></div></a>
				<div><?= $annoncePhoto["titre"];?></div>
				<div><?= $annoncePhoto["prix_vente"];?></div>
			</div>
			<?php
		} ?>
		
		</section>
		<?php if(!$logged):?>
		<a class="button" href="?p=signup">Créer un compte</a>
		<a class="button" href="?p=signup">Se connecter</a>

		<?php else :; ?>
		<a href="?p=espace">Espace Membre</a>

		<?php endif ; ?>
	</div>
</div>	
