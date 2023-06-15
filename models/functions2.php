<?php
require_once 'functions.php';

function alertMessage() {
if (!empty($_GET['type']) && ($_GET['type'] === 'success')) : ?>
    <div class='row'>
        <div class='alert alert-success'>
            Succès! <?= $_GET['message'] ?>
        </div>
    </div>
<?php elseif (!empty($_GET['type']) && ($_GET['type'] === 'error')) : ?>
    <div class='row'>
        <div class='alert alert-danger'>
            Erreur! <?= $_GET['message'] ?>
        </div>
    </div>
<?php endif; } 

function getAnnoncesPhotos(){
    /*  SELECT annonces.titre, annonces.prix_vente, annonces.id_etat, photos.url FROM annonces INNER JOIN photos ON annonces.id=photos.id_annonce WHERE annonces.date_validation IS NOT NULL ORDER BY date_validation DESC; */
    try {
     $db = connect();
     $AnnoncesPhotosQuery = $db->query('SELECT annonces.titre, annonces.prix_vente, annonces.id_etat, photos.url FROM annonces INNER JOIN photos ON annonces.id=photos.id_annonce WHERE annonces.date_validation IS NOT NULL ORDER BY date_validation DESC');
     return $AnnoncesPhotosQuery->fetchAll(PDO::FETCH_ASSOC);
     } catch (Exception $e) {
         echo $e->getMessage();
     }
 }

function getAnnoncesByUser($id){
    try {
        $db = connect();
    
        $annoncesQuery = $db->prepare('SELECT * FROM annonces INNER JOIN photos ON annonces.id=photos.id_annonce INNER JOIN etats ON annonces.id_etat=etats.id INNER JOIN categories_annonces ON annonces.id=categories_annonces.id_annonce WHERE id_utilisateur=:id');
        $annoncesQuery->execute(['id' => $id]);
        if($annoncesQuery->rowCount()){
           return $annoncesQuery->fetchAll(PDO::FETCH_ASSOC);

        } //cette variable récupère les données selon id et sert à afficher dans formulaire prérempli (champ value)  
    } catch (Exception $e) {
        echo $e->getMessage();
    }    
}

function getCategorieAnnonce(){
    /* $categorie=$annoncesByUser["id_categorie"]; */ 
}


?>
