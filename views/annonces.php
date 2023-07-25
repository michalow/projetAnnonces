<h2>Détail d'annonce</h2>

<?php
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $idAnnonce = htmlentities($_GET['id']);
        $annonce = htmlentities($_GET['p']);
    }

    $ann=getAnnoncesPhotos();
?>

<div>
    <img src="<?= $ann[$idAnnonce]["url"];?>" alt="<?= $ann[$idAnnonce]["titre"];?>" width="250" height="250">
</div>
<div><?= $ann[$idAnnonce]["titre"];?></div>
<div><?= $ann[$idAnnonce]["description"];?></div>
<div><?= $ann[$idAnnonce]["prix_vente"];?></div>
<div><?= $ann[$idAnnonce]["id_etat"];?></div>

<button type='submit' class='btn btn-primary my-3' name='submit'>Ajouter</button>

