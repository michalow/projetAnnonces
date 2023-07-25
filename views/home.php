<section>
<h1>Petites annonces</h1>

    <div class="container-fluid">
        <div class="row">

<?php 
    if(isset($_GET['page'])){
        $page=intval(htmlentities($_GET['page']));
    } else {
        $page=1;
    }
    
   /*  if($page <= 0) {
    $page = 1;
    } */

    var_dump($_GET);
    var_dump($page);
    $limit=4;
	
    try {
        $db = connect();
        $countQuery = $db->prepare('SELECT COUNT(*) AS nb_annonces FROM `annonces` INNER JOIN photos ON annonces.id=photos.id_annonce WHERE date_validation IS NOT NULL;');
        $countQuery->execute();
        $count=$countQuery->fetch(PDO::FETCH_ASSOC);  
    } catch (Exception $e) {
        echo $e->getMessage();
    }    
 
    $nbAnnonces=$count['nb_annonces'];
    $nbPages = ceil($nbAnnonces / $limit);
    var_dump($nbPages);
    $annoncesPhotos=getAnnoncesPhotos($limit, $nbPages);
 /*   try {
    $db = connect();
    $AnnoncesPhotosQuery = $db->query('SELECT annonces.titre, annonces.prix_vente, annonces.id_etat, annonces.description, photos.url, annonces.id FROM annonces INNER JOIN photos ON annonces.id=photos.id_annonce 
    WHERE annonces.date_validation IS NOT NULL ORDER BY date_validation DESC'.generate_sql_limit($limit, $page));
    return $AnnoncesPhotosQuery->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo $e->getMessage();
}

var_dump($AnnoncesPhotosQuery); */
  /*   
    SELECT COUNT(*) AS nb_annonces FROM `annonces` INNER JOIN photos ON annonces.id=photos.id_annonce WHERE date_validation IS NOT NULL; */

	foreach($annoncesPhotos as $annoncePhoto) :
        /* for($ann=0; $ann < ; $ann++): */
	?>
        <div class="col-3">
            <div class="element d-flex h-100 flex-column justify-content-between">
                <div class="inner d-flex h-100 flex-column align-items-center justify-content-center">
                    <span>&nbsp;</span>
                    <a href="index.php?p=annonces&id=<?= $annoncePhoto["id"] ?>" class="">
                    <img src="<?= $annoncePhoto["url"];?>" alt="<?= $annoncePhoto["titre"];?>" width="" height="" class="img-fluid"></a>	
                    <p><?= $annoncePhoto["titre"];?></p>
                    <p><?= $annoncePhoto["prix_vente"];?> €</p>
                </div>	
            </div>		
        </div>					
	<?php 
        /* endfor; */
    endforeach; 
    ?>
		
	</div>
	</section>

<?php 
  
?>
	<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
    
        
    <?php
   /*  if ($page < 1): */
    ?> 
        <li class="page-item disabled">
            <a class="page-link" href="<?= 'index.php?p=home&page='.$page - 1; ?>" aria-label="Précédente">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only"></span>
            </a>
        </li>
    <?php
   /*  endif; 
    if ($page == 1): */
        for($page = 1; $page <= $nbPages; $page++): ?> 
            <li class="page-item"><a class="page-link" href="<?= 'index.php?p=home&page='.$page ?>"><?= $page ?></a></li>
    <?php 
      endfor; 
    /* endif;  
    
    if ($page > 1): */
    ?>    
    <li class="page-item">
        <a class="page-link" href="<?= 'index.php?p=home&page='.$page + 1 ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only"></span>
        </a>
    </li>
    <?php 
  /*   endif; */
    ?> 
  </ul>
</nav>
		
	</div>
</div>	

