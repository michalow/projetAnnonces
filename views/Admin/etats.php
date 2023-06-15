<?php

/* require_once '../../models/functions.php';
require_once '../../models/functions2.php';
include_once '../common/header.php';
include_once '../common/admin_nav.php'; */

try {
 $etats=getEtats();
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
<h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Etats de produit</h1>    
    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Etat</th>
                <th scope='col'>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etats as $etat) : ?>
                <tr>
                    <td><?= $etat['id'] ?></td>
                    <td><?= htmlentities($etat['nom']) ?></td>
                    <td><?= htmlentities($etat['description']) ?></td>
                    <td>
                        <a class='btn btn-primary' href='etat_form.php?id=<?= $etat['id'] ?>' role='button'>Modifier</a>
                        <a class='btn btn-danger' href='etat_delete.php?id=<?= $etat['id'] ?>' role='button'>Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class='row'>
    <div class='col'>
        <a class='btn btn-success' href='etat_form.php' role='button'>Ajouter etat</a>
    </div>
</div>

<!-- <?php include_once '../common/footer.php' ?> -->