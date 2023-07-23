<?php 

if (empty($_SESSION)) {
	header ('Location: index.php?p=home');
	exit();
}

/* if(isset($_SESSION['id']) && getAvatar($_SESSION['id'])){
    $src=getAvatar($_SESSION['id']);
}else{
    $src='images/defaut.jpg';
} */ 

if(isset($_SESSION['id'])) {
    $id=$_SESSION['id'];
    /* $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); */
    $member=getMember($id);
}

?>

<h1>Espace membre</h1>
<p>Bienvenu <?= $member['username'] ?> sur votre espace personnel!</p>

<!-- <a href='index.php?p=compte' class='btn btn-secondary m-2 active' role='button'>Mon compte</a> -->
<a href='index.php?p=annonces_user' class='btn btn-secondary m-2 active' role='button'>Mes annonces</a>
<a href='index.php?p=annonces_user_form' class='btn btn-secondary m-2 active' role='button'>Nouvelle annonce</a>

<div>
    <img src="<?= isset($member['avatar']) ? 'images/'.$member['avatar'] : 'images/defaut.jpg' ?>" width="200" height="155">
</div>
<div>
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
                    <td><a class='btn btn-success' href='index.php?p=compte_form' role='button'>Modifier mes données personnelles</a></td>
                </tr>
        </tbody>
    </table>
</div>    

