<?php
    if(isset($_SESSION['id'])){
        $user=$_SESSION['id'];
        $annoncesByUser=getAnnoncesByUser($user);
    }

    $categories = getCategories();
?>


<div class='row'>
    <h1 class='col-md-12 text-center border border-dark text-white bg-primary'>Annonces</h1>
</div>
<div class='row'>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Titre</th>
                <th scope='col'>Description</th>
                <th scope='col'>Date création</th>
                <th scope='col'>Coût annonce</th>
                <th scope='col'>Durée de publication</th>
                <th scope='col'>Prix vente</th>
                <th scope='col'>Date de validation</th>
                <th scope='col'>Fin de publication</th>
                <th scope='col'>Date de vente</th>
                <th scope='col'>Categorie</th>
                <th scope='col'>Etat</th>
                <th scope='col'>Photo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($annoncesByUser as $annonce) : 
                ?>
                <tr>
                    <td><?= $annonce['id'] ?></td>
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
                    <td>
                        <img src="<?= htmlentities($annonce['url'] ?? '') ?>" alt="<?= htmlentities($annonce['legende'] ?? '') ?>" width="120" height="120">
                    </td>
                    <td>
                        <a class='btn btn-primary' href='index.php?p=annonces_user_form&id=<?= $annonce['id'] ?>' role='button'>
                            Modifier
                        </a>
                        <a class='btn btn-danger' href='index.php?p=annonces_user_del&id=<?= $annonce['id'] ?>' role='button'>
                            Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class='row'>
    <div class='col'>
        <a class='btn btn-success' href='index.php?p=annonces_user_form' role='button'>Ajouter annonce</a>
    </div>
</div>

