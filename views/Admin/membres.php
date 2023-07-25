<?php
    try {
        $db = connect();
        $membersQuery = $db->query('SELECT * FROM membres ORDER BY date_inscription LIMIT 10');
        $members = $membersQuery->fetchAll(PDO::FETCH_ASSOC);;
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
    <h1 class='col-md-12 text-center border border-dark text-white bg-primary'>Membres</h1>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Prénom</th>
                <th scope='col'>Nom</th>
                <th scope='col'>Username</th>
                <th scope='col'>Date de naissance</th>
                <th scope='col'>Date d'inscription</th>
                <th scope='col'>Adresse</th>
                <th scope='col'>Email</th>
                <th scope='col'>Télephone</th>
                <th scope='col'>Cagnotte</th>
                <th scope='col'>Actif</th>
                <th scope='col'>Admin</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $member) : ?>
                <tr>
                    <td><?= $member['id'] ?></td>
                    <td><?= htmlentities($member['prenom'] ?? '') ?></td>
                    <td><?= htmlentities($member['nom'] ?? '') ?></td>
                    <td><?= htmlentities($member['username'] ?? '') ?></td>
                    <td><?= htmlentities($member['date_naissance'] ?? '') ?></td>
                    <td><?= htmlentities($member['date_inscription'] ?? '') ?></td>
                    <td><?= htmlentities($member['adresse'] ?? '') ?></td>
                    <td><?= htmlentities($member['email'] ?? '') ?></td>
                    <td><?= htmlentities($member['telephone'] ?? '') ?></td>
                    <td><?= htmlentities($member['cagnotte'] ?? '') ?></td>
                    <td><?= htmlentities($member['actif'] ?? '') ?></td>
                    <td><?= htmlentities($member['is_admin'] ?? '') ?></td>
                    <td>
                        <a class='btn btn-danger' href='index.php?p=membre_del&id=<?= $member['id'] ?>' role='button'>Supprimer</a>
                    </td>
                    <td>
                    <?php if($member['actif']==0) 
                    { ?><a class='btn btn-info' href='membre_valide.php?id=<?= $member['id'] ?>' role='button'>Valider</a><?php } ?>
                    </td>
                    <td>
                    <?php if($member['is_admin']==1) 
                    { ?><a class='' href='membre_valide.php?id=<?= $member['id'] ?>' role='button'>Admin</a><?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class='row'>
    <div class='col'>
        <a class='btn btn-success' href='index.php?p=membre_form' role='button'>Ajouter membre</a>
    </div>
</div>
