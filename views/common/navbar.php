<?php

// barre de recherche
$keyword = htmlspecialchars($_GET['keyword'] ?? "");
$afficher="";
if(isset($keyword) && !empty(trim($keyword))){
  try {
    $db = connect();
    $queryKeyword = $db->prepare("SELECT 
      annonces.titre, annonces.prix_vente, annonces.id_etat, photos.url, nom_categorie FROM annonces 
      INNER JOIN photos ON annonces.id=photos.id_annonce 
      INNER JOIN categories_annonces ON annonces.id=categories_annonces.id_annonce
      INNER JOIN categories ON categories_annonces.id_categorie=categories.id 
      WHERE annonces.date_validation IS NOT NULL AND categories.nom_categorie 
      LIKE :keyword");
    $queryKeyword->execute(['keyword' => $keyword]);
    $resultats=$queryKeyword->fetchAll(PDO::FETCH_ASSOC);
    $afficher = true;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>   

<!-- MENU PRINCIPAL -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php?p=home">
      Petites annonces
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?p=home">
          Accueil
          <span class="sr-only"></span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="index.php?p=femme" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Catégories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?p=femme">Femme</a>
          <a class="dropdown-item" href="index.php?p=homme">Homme</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Enfant</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?p=contact">
          Contact
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=""></a>
      </li>
    </ul>
  </div>

<!-- BARRE DE RECHERCHE -->
    <form method="GET" action="" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" name="keyword" value="<?= $keyword ?>"   placeholder="Mots-clés.." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Rechercher</button>
    </form>

<!-- CONNEXION ESPACE MEMBRE ET ADMIN -->
<?php if(!$logged) { ?>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item active">
      <a class="nav-link" href="index.php?p=signup">
        <span class="sr-only">Créer un compte</span>
      </a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="index.php?p=signup">
        <span class="sr-only">Se connecter</span></a>
    </li>
  </ul>
<?php } else {   
            if($_SESSION['is_admin']==1){        
?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?p=admin">
            <span class="sr-only">Admin</span>
          </a>
        </li>
      </ul>  
<?php       } else {      ?>  
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?p=espace">
            <span class="sr-only">Espace Membre</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?p=deconnect">
            <span class="sr-only">Se déconnecter</span>
          </a>
        </li>
      </ul>  
<?php }} ?>

<!-- RESUTAT DE RECHERCHE --> 
  <?php if($afficher==true) : ?>
    <div id="resultats">
      <div id="nbr"><?= count($resultats)." ".(count($resultats) > 1 ? "résultats trouvés":"résultat trouvé") ?></div>
        <div>
        <?php 
        foreach($resultats as $resultat) : ?>
          <div>
            <?= $resultat['titre']; ?>
            <?= $resultat['prix_vente']; ?>
            <?= $resultat['nom_categorie']; ?>
            <img src="<?= $resultat["url"];?>" alt="<?= $resultat["titre"];?>" width="100" height="120" class="img-fluid"></a>
          </div>
        <?php  endforeach ?>
        <!-- for($i=0;$i<count($resultats);$i++) ?> --> 
        </div>
    </div>
    <?php endif ?>

  </nav>

   <!--  <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?p=home">Accueil</a></li>
        <li class="breadcrumb-item"><a href="">Categorie</a></li>
        <li class="breadcrumb-item active"><a href="index.php?p=annonces&id=">Détail d'annonce</a></li>  
      </ol>
    </nav> -->