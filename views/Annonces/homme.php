<?php 

if(isset($_GET['p'])){
	if($_GET['p']=='homme'){
		$cat=htmlentities($_GET['p']);
			$annoncesCategory=getAnnoncesByCategory($cat);
	}
}
?>

<div class="main">
	<div class="home">
		<h1>Categorie <?= $cat ?></h1>
		<section class="recent">
        
<?php 	
if(!empty($annoncesCategory)):
	foreach($annoncesCategory as $annonceCategory):
?>
	<div>
		<a href="index.php?p=annonces&id=<?= $annonceCategory["id"] ?>">
			<div>
				<img src="<?= $annonceCategory["url"];?>" alt="<?= $annonceCategory["titre"];?>" width="150" height="150">
			</div>
		</a>
		<div><?= $annonceCategory["titre"];?></div>
		<div><?= $annonceCategory["prix_vente"];?></div>
	</div>
<?php
	endforeach; 
    endif;
?>
		
		</section>
	</div>
</div>	