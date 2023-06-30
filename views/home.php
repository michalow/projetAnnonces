<section>
<h1>Petites annonces</h1>

<div class="container-fluid">
    <div class="row">
  	
	<!-- <div class="col-3">
            <div class="element d-flex h-100 flex-column justify-content-between">
                <div class="inner d-flex h-100 flex-column align-items-center justify-content-center">
                    <span>&nbsp;</span>
                    <img class="img-fluid" src="http://www.comohacercrepes.com//ImagenesComoHacerCrepes/ImagenesCrepes/receta-crepes-masa-thermomix.jpg">
                    <p>Some text</p>
                </div>
                <a href>Link</a>
            </div>
        </div> -->
	<?php 
	$annoncesPhotos=getAnnoncesPhotos(); 
	foreach($annoncesPhotos as $annoncePhoto) :
	?>
	<div class="col-3">
            <div class="element d-flex h-100 flex-column justify-content-between">
                <div class="inner d-flex h-100 flex-column align-items-center justify-content-center">
                    <span>&nbsp;</span>
					<a href="index.php?p=annonces&id=<?= $annoncePhoto["id"] ?>" class="">
					<img src="<?= $annoncePhoto["url"];?>" alt="<?= $annoncePhoto["titre"];?>" width="" height="" class="img-fluid"></a>	
					<p><?= $annoncePhoto["titre"];?></p>
					<p><?= $annoncePhoto["prix_vente"];?></p>
				</div>	
			</div>		
	</div>					
	<?php endforeach; ?>
		
	</div>
	</section>


	<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
        <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only"></span>
        </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only"></span>
        </a>
    </li>
  </ul>
</nav>
		
	</div>
</div>	

<!-- <div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <div class="element d-flex h-100 flex-column justify-content-between">
                <div class="inner d-flex h-100 flex-column align-items-center justify-content-center">
                    <span>&nbsp;</span>
                    <img class="img-fluid" src="http://www.comohacercrepes.com//ImagenesComoHacerCrepes/ImagenesCrepes/receta-crepes-masa-thermomix.jpg">
                    <p>Some text</p>
                </div>
                <a href>Link</a>
            </div>
        </div>
    </div>
</div> -->