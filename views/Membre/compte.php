<?php

/* var_dump($_SESSION['id']); */

if(isset($_SESSION['id'])) {
    // récupérer $id dans les paramètres d'URL
    $id=$_SESSION['id'];
    /* $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); */

    try {
        $db = connect();

        $membersQuery = $db->prepare('SELECT * FROM membres WHERE id= :id');
        $membersQuery->execute(['id' => $id]);
        
        $member = $membersQuery->fetch(PDO::FETCH_ASSOC); //cette variable récupère les données selon id et sert à afficher dans formulaire prérempli (champ value)  
        
    } catch (Exception $e) {
        echo $e->getMessage();
    }


  /*   $membersQuery=null; */
    $db=null;
} else die('erreur');

//var_dump($member);

?>
<?php if (!empty($_GET['type']) && ($_GET['type'] === 'success')) : ?>
    <div class='row'>
        <div class='alert alert-success'>
            Succès! <?= $_GET['message'] ?>
        </div>
    </div>
<?php elseif (!empty($_GET['type']) && ($_GET['type'] === 'error')) : ?>
    <div class='row'>
        <div class='alert alert-danger'>
            Erreur! <?= $_GET['message'] ?>
        </div>
    </div>
<?php endif; ?>
<div class='row'>
<h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Mes données personnelles</h1>
</div>
<div class='row'>
    <table class='table table-striped'>
        <thead>
            <tr>
            <th scope='col'>Id</th>
                <th scope='col'>Pseudo</th>
                <th scope='col'>Prénom</th>
                <th scope='col'>Nom</th>
                <th scope='col'>Email</th>
                <th scope='col'>Date de naissance</th>
                <th scope='col'>Télephone</th>
                <th scope='col'>Adresse</th>
                <th scope='col'>Code postal</th>
                <th scope='col'>Ville</th>
                <th scope='col'>Date d'inscription</th>
                <th scope='col'>Cagnotte</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td class='hidden'><?= $member['id'] ?></td>
                    <td><?= htmlentities($member['username']) ?></td>
                    <td><?= htmlentities($member['prenom'] ?? '') ?></td>
                    <td><?= htmlentities($member['nom']) ?></td>
                    <td><?= htmlentities($member['email'] ?? '') ?></td>
                    <td><?= htmlentities($member['date_naissance'] ?? '') ?></td>
                    <td><?= htmlentities($member['telephone'] ?? '') ?></td>
                    <td><?= htmlentities($member['adresse'] ?? '') ?></td>
                    <td><?= htmlentities($member['code_postal'] ?? '') ?></td>
                    <td><?= htmlentities($member['ville'] ?? '') ?></td>
                    <td><?= htmlentities($member['date_inscription'] ?? '') ?></td>
                    <td><?= htmlentities($member['cagnotte'] ?? '') ?></td>
                    <td><a class='btn btn-success' href='?p=compte_form' role='button'>Modifier mes données personnelles</a></td>
                </tr>
        </tbody>
    </table>
</div>

