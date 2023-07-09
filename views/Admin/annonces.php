<?php

/* require_once '../../models/functions.php';
require_once '../../models/functions2.php';
include_once '../common/header.php';
include_once '../common/admin_nav.php'; */

try {
    $db = connect();

    $annoncesQuery = $db->query('SELECT * FROM annonces WHERE date_validation IS NULL ORDER BY date_creation'); 
    //pour valider les annonces
    //changer la catégorie

    $annonces = $annoncesQuery->fetchAll(PDO::FETCH_ASSOC);;

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
    <h1 class='col-md-12 text-center border border-dark text-white bg-primary'>Annonces</h1>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Titre</th>
                <th scope='col'>Description</th>
                <th scope='col'>Date création</th>
                <th scope='col'>Cout annonce</th>
                <th scope='col'>Durée de publication</th>
                <th scope='col'>Prix vente</th>
                <th scope='col'>Date de validation</th>
                <th scope='col'>Fin de publication</th>
                <th scope='col'>Date de vente</th>
                <th scope='col'>Id utilisateur</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($annonces as $annonce) : ?>
                <tr>
                    <!-- id from DB -->
                    <td><?= $annonce['id'] ?></td>
                    <td><?= htmlentities($annonce['titre'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['description'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['date_creation'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['cout_annonce'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['duree_publication'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['prix_vente'] ?? '') ?></td>
                    <td></td>
                    <td><?= htmlentities($annonce['date_validation'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['fin_publication'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['date_vente'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['id_utilisateur'] ?? '') ?></td>
                    <td>
                        <a class='btn btn-info' href='index.php?p=annonces_val?id=<?= $annonce['id'] ?>' role='button'>
                            Valider
                        </a>
                        <a class='btn btn-primary' href='index.php?p=annonces_form?id=<?= $annonce['id'] ?>' role='button'>
                            Modifier
                        </a>
                        <a class='btn btn-danger' href='index.php?p=annonces_del?id=<?= $annonce['id'] ?>' role='button'>
                            Supprimer
                        </a>
                        
                        <!-- ???? valider message que c'était bien valider comme pour catégorie si supprimée ou pas -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- <div class='row'>
    <div class='col'>
        <a class='btn btn-success' href='index.php?p=annonces_form' role='button'>Valider annonce</a>
    </div>
</div> -->

