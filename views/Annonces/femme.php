<div class="main">
	<div class="home">
		<h1>Categorie Femme</h1>
		<section class="recent">
        <?php 
		if(isset($_GET['p'])){
			if($_GET['p']=='femme'){
				$cat1=$_GET['p'];
				$annoncesCategory=getAnnoncesByCategory($cat1);
				var_dump($annoncesCategory);
			}
		}
		 //annonces validées
		/* foreach($annoncesCategory as $annonceCategory){
			?>
			<div>
				<a href="index.php?p=annonces&id=<?= $annonceCategory["id"] ?>">
				<div><img src="<?= $annonceCategory["url"];?>" alt="<?= $annonceCategory["titre"];?>" width="150" height="150"></div></a>
				<div><?= $annonceCategory["titre"];?></div>
				<div><?= $annonceCategory["prix_vente"];?></div>
			</div>
			<?php
		} ?> */
		?>
		</section>
		<?php if(!$logged):?>
		<a class="button" href="?p=signup">Créer un compte</a>
		<a class="button" href="?p=signup">Se connecter</a>

		<?php else :; ?>
		<a href="?p=espace">Espace Membre</a>

		<?php endif ; ?>
	</div>
</div>	
