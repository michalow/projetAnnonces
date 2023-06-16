<h2>Détail d'annonce</h2>

<?php
$idAnnonce=$_GET['id'];
$annonce=$_GET['p'];

/* var_dump($idAnnonce); */

$ann=getAnnoncesPhotos();
/* var_dump($ann); */
?>
    <div>
    <img src="<?= $ann[$idAnnonce]["url"];?>" alt="<?= $ann[$idAnnonce]["titre"];?>" width="250" height="250">
    </div>
	<div><?= $ann[$idAnnonce]["titre"];?></div>
    <div><?= $ann[$idAnnonce]["description"];?></div>
	<div><?= $ann[$idAnnonce]["prix_vente"];?></div>
    <div><?= $ann[$idAnnonce]["id_etat"];?></div>
<?php 
