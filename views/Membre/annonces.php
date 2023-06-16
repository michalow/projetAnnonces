<?php

if(isset($_SESSION['id'])){
    $user=$_SESSION['id'];
    $annoncesByUser=getAnnoncesByUser($user);
}

?>

<div class='row'>
<h1 class='col-md-12 text-center border border-dark text-white bg-primary'>Annonces</h1>
    <table class='table table-striped'>
        <thead>
            <tr>
                <!-- titres colonnes -->
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
                <th scope='col'>Categorie</th>
                <th scope='col'>Etat</th>
                <th scope='col'>Photo</th>
                <!-- <th scope='col'>Id utilisateur</th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($annoncesByUser as $annonce) : ?>
                <tr>
                    <!-- id from DB -->
                    <td><?= $annonce['id_annonce'] ?></td>
                    <td><?= htmlentities($annonce['titre'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['description'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['date_creation'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['cout_annonce'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['duree_publication'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['prix_vente'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['date_validation'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['fin_publication'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['date_vente'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['nom_categorie'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['nom'] ?? '') ?></td>
                    <td><?= htmlentities($annonce['url'] ?? '') ?></td>
                    <td>
                    <!--   description	duree_de_publication	prix_vente	cout_annonce	date_validation	date_fin_publication	id_etat	id_utilisateur	date_vente	id_acheteur	 -->
                    <a class='btn btn-info' href='?p=annonces_user_edit&id=<?= $annonce['id_annonce'] ?>' role='button'>Vaier</a>
                    <a class='btn btn-primary' href='?p=annonces_user_form&id=<?= $annonce['id_annonce'] ?>' role='button'>Modifier</a>
                    <a class='btn btn-danger' href='?p=annonces_user_del&id=<?= $annonce['id_annonce'] ?>' role='button'>Supprimer</a>
                        
                        <!-- ???? valider message que c'était bien valider comme pour catégorie si supprimée ou pas -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- <div class='row'>
    <div class='col'>
        <a class='btn btn-success' href='annonces_form.php' role='button'>Valider annonce</a>
        sélectionner plusieurs au même temps et valider, case à cocher -->
    <!-- </div> -->
</div>