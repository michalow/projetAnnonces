<?php
require_once 'functions.php';

function alertMessage(){
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
    <?php endif;} 


function alertMessage2($message){
    
    if (!empty($message[0]) && !empty($message[1])) : ?>
        <div class='row'>
            <div class='alert alert-<?= $message[0] ?>'>
                <?= $message[1] ?>
            </div>
        </div>
    <?php endif;} 

function generate_sql_limit($limit=LIMIT, $page=1){
    if(!is_numeric($limit)) $limit = LIMIT;
    $pagination = ' LIMIT '.$limit;
    if(is_numeric($page) && $page > 1){
      $offset = $limit*($page-1);
      $pagination.= ' OFFSET '.$offset;
    }
    return $pagination;
}

function getAnnoncesPhotos($limit=4,$page=2){
    try {
        $db = connect();
        $AnnoncesPhotosQuery = $db->query('SELECT annonces.titre, annonces.prix_vente, annonces.id_etat, annonces.description, photos.url, annonces.id FROM annonces INNER JOIN photos ON annonces.id=photos.id_annonce 
        WHERE annonces.date_validation IS NOT NULL ORDER BY date_validation DESC'.generate_sql_limit($limit, $page));
        return $AnnoncesPhotosQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getAnnoncesByCategory($category){
    try {
        $db = connect();
        $AnnoncesCategoryQuery = $db->prepare('SELECT a.*, photos.url, categories.nom_categorie FROM annonces AS a
        INNER JOIN photos ON a.id=photos.id_annonce 
        INNER JOIN categories_annonces AS ca ON a.id=ca.id_annonce 
        INNER JOIN categories ON ca.id_categorie=categories.id 
        WHERE a.date_validation IS NOT NULL AND nom_categorie=:nom_categorie ORDER BY date_validation DESC');
        $AnnoncesCategoryQuery->execute(["nom_categorie" => $category]);
        if($AnnoncesCategoryQuery->rowCount()){
            return $AnnoncesCategoryQuery->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo 'Il n\'y a pas d\'annonces sous cette catégorie';
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

//annonces membre
function getAnnoncesByUser($id){
    try {
        $db = connect();
    
        /* $annoncesQuery = $db->prepare('SELECT annonces.id, annonces.id_utilisateur, annonces.titre, annonces.description, annonces.date_creation, annonces.cout_annonce, annonces.duree_publication, annonces.prix_vente, annonces.date_validation, annonces.fin_publication, annonces.date_vente, annonces.id_etat, etats.nom, photos.url, photos.legende, categories_annonces.id_categorie, categories.nom_categorie FROM annonces */
        /* $annoncesQuery = $db->prepare('SELECT annonces.*, etats.nom, photos.url, photos.legende, categories_annonces.id_categorie, categories.nom_categorie FROM annonces 
        LEFT JOIN photos ON annonces.id=photos.id_annonce 
        LEFT JOIN etats ON annonces.id_etat=etats.id 
        LEFT JOIN categories_annonces ON annonces.id=categories_annonces.id_annonce  */
        $annoncesQuery = $db->prepare('SELECT a.*, etats.nom, photos.url, photos.legende, ca.id_categorie, categories.nom_categorie 
        FROM annonces AS a
        LEFT JOIN photos ON a.id=photos.id_annonce 
        LEFT JOIN etats ON a.id_etat=etats.id 
        LEFT JOIN categories_annonces AS ca ON a.id=ca.id_annonce
        LEFT JOIN categories ON ca.id_categorie=categories.id
        WHERE id_utilisateur=:id_utilisateur');
        $annoncesQuery->execute(['id_utilisateur' => $id]);
        if($annoncesQuery->rowCount()){
           return $annoncesQuery->fetchAll(PDO::FETCH_ASSOC);
        }else{
            echo 'Vous avez pas d\'annoces';
        }   
    } catch (Exception $e) {
        echo $e->getMessage();
    }    
}

function getAnnonceByID($id){
    try {
        $db = connect();
    
        $annoncesQuery = $db->prepare('SELECT * FROM annonces LEFT JOIN photos ON annonces.id=photos.id_annonce LEFT JOIN etats ON annonces.id_etat=etats.id LEFT JOIN categories_annonces ON annonces.id=categories_annonces.id_annonce WHERE id_utilisateur=:id_utilisateur');
        $annoncesQuery->execute(['id_utilisateur' => $id]);
        if($annoncesQuery->rowCount()){
           return $annoncesQuery->fetchAll(PDO::FETCH_ASSOC);
        }else{
            echo 'Vous avez pas d\'annoces';
        }   
    } catch (Exception $e) {
        echo $e->getMessage();
    }    
}

function getAnnoncesByIdAnnonce($idAnnoncement){
    try {
        $db = connect();
    
        $annoncesQuery = $db->prepare('SELECT annonces.id, annonces.id_utilisateur, annonces.titre, annonces.description, annonces.date_creation, annonces.cout_annonce, annonces.duree_publication, annonces.prix_vente, annonces.date_validation, annonces.fin_publication, annonces.date_vente, annonces.id_etat, etats.nom, photos.url, photos.legende, categories_annonces.id_categorie FROM annonces 
        LEFT JOIN photos ON annonces.id=photos.id_annonce 
        LEFT JOIN etats ON annonces.id_etat=etats.id 
        LEFT JOIN categories_annonces ON annonces.id=categories_annonces.id_annonce WHERE annonces.id=:id_annonce');
        $annoncesQuery->execute(['id_annonce' => $idAnnoncement]);
        if($annoncesQuery->rowCount()){
           return $annoncesQuery->fetch(PDO::FETCH_ASSOC);
        }else{
            echo 'Cet annonce n\'existe pas';
        }   
    } catch (Exception $e) {
        echo $e->getMessage();
    }    
}

function NbrChars($texte){
    $max=250;
    $nbrtexte=strlen($texte);
    $cout=0.001;
    if($nbrtexte > $max){
        echo 'Vous avez dépassé '.$max.' caractères. Le coût de votre descritption : '. ($nbrtexte - $max)*$cout .' €';
    }else{
        echo 'Il vous reste : '.$max - $nbrtexte;
    }
}
function NbrPhotos($file){
    
}
?>
