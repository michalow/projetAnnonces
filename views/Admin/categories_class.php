<?php
include_once "common/header.php";
include_once "common/admin_nav.php";
require_once "../controllers/CategoriesController.php";
?>
<div class='row'>
    <h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Catégories d'annonce</h1>
</div>
<div class='row'>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Catégorie</th>
                <th scope='col'>Description</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($allcategories as $categorie) {  ?> 
            <tr>
                <td><?= $categorie->getId()?></td>
                <td><?= $categorie->getName()?></td>
                <td><?= $categorie->getDescription()?></td>
                <td>
                    <a class='btn btn-primary' href='categorie_form.php?id=<?= $categorie->getId(); ?>' role='button'>Modifier</a>
                    <a class='btn btn-danger' href='categorie_delete.php?id=<?= $categorie->getId(); ?>' role='button'>Supprimer</a>
                </td>
            </tr>
        <?php }  ?>  
        </tbody>
    </table>
</div> 
<div class='row'>
    <div class='col'>
        <a class='btn btn-success' href='categorie_form.php' role='button'>Ajouter catégorie</a>
    </div>
</div>      


<?php

include_once "common/footer.php";
?>