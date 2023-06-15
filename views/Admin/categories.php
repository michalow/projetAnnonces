<?php

/* require_once "../../models/functions.php";
require_once "../../models/functions2.php";
include_once '../common/header.php';
include_once '../common/admin_nav.php'; */

try {
 $categories=getCategories();
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    alertMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}

?>

<div class='row'>
<h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Catégories d'annonce</h1>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Catégorie</th>
                <th scope='col'>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $cat) : ?>
                <tr>
                    <td><?= $cat['id'] ?></td>
                    <td><?= htmlentities($cat['nom_categorie']) ?></td>
                    <td><?= htmlentities($cat['description']) ?></td>
                    <td>
                        <a class='btn btn-primary' href='categorie_form.php?id=<?= $cat['id'] ?>' role='button'>Modifier</a>
                        <a class='btn btn-danger' href='categorie_delete.php?id=<?= $cat['id'] ?>' role='button'>Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class='row'>
    <div class='col'>
        <a class='btn btn-success' href='categorie_form.php' role='button'>Ajouter catégorie</a>
    </div>
</div>

<!-- <?php include_once '../common/footer.php' ?> -->