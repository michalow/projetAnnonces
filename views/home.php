<section>
<h1>Petites annonces</h1>

<div class="container-fluid">
    <div class="row">

<?php 
    $_GET['page']=1;
    $page=intval($_GET['page']);
    if($page <= 0) {
    $page = 1;
    }

    var_dump($_GET);
    var_dump($page);
    $limit=4;
	$annoncesPhotos=getAnnoncesPhotos(); 
    $nombreAnnonces=0;

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
    $nombreAnnonces++;
    endforeach; 
    var_dump($nombreAnnonces);
    ?>
		
	</div>
	</section>

<?php 
    $nbPages = ceil($nombreAnnonces / $limit);
    var_dump($nbPages);
?>
	<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
    
        
    <?php
    if ($page < 1):
    ?> 
        <li class="page-item disabled">
            <a class="page-link" href="<?= $page - 1; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only"></span>
            </a>
        </li>
    <?php
    endif; 
    if ($page == 1):
        for($p = 1; $p <= $nbPages; $p++): ?> 
            <li class="page-item"><a class="page-link" href="<?= 'index.php?p=home/'.$page ?>"><?= $p ?></a></li>
    <?php 
        endfor; 
    endif; 
    
    if ($page > 1):
    ?>    
    <li class="page-item">
        <a class="page-link" href="<?= 'index.php?p=home/'.$page + 1 ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only"></span>
        </a>
    </li>
    <?php 
    endif;
    ?> 
  </ul>
</nav>
		
	</div>
</div>	

