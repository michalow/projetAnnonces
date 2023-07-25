<?php

/* require_once '../../models/functions.php';
include_once '../common/header.php'; 
include_once '../common/admin_nav.php'; */

// Pour éviter de dupliquer le code, ce formulaire sera utiliser pour créer ou modifier une categorie. Si l'url est appelée avec id= alors nous l'utiliserons pour éditer l'abo avec l'id spécifié. 
if(isset($_GET['id'])) {
    // récupérer $id dans les paramètres d'URL
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    try {
        $db = connect();

        $membersQuery = $db->prepare('SELECT * FROM membres WHERE id= :id');
        $membersQuery->execute(['id' => $id]);
        
        $member = $membersQuery->fetch(PDO::FETCH_ASSOC); //cette variable récupère les données selon id et sert à afficher dans formulaire prérempli (champ value)  

    } catch (Exception $e) {
        echo $e->getMessage();
    }


    $membersQuery=null;
    $db=null;
}

//$members = getMembers();

?>




<!-- <a href='index.php' class='btn btn-secondary m-2 active' role='button'>Accueil</a>
<a href='categories.php' class='btn btn-secondary m-2 active' role='button'>Catégories</a>
<a href='membres.php' class='btn btn-secondary m-2 active' role='button'>Membres</a> -->

<div class='row'>

<h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Membres</h1>
</div>
<div class='row'>
    <form method='post' action='membre_edit.php'>
        <!--  Ajouter un champs cacher avec l'ID (s'il existe) pour qu'il soit envoyé avec le formulaire -->
        <input type='hidden' name='id' value='<?= $member['id'] ?? '' ?>'>
        <div class='form-group my-3'>
            <label for='nom'>Nom</label>
            <input type='text' name='nom' class='form-control' id='nom' placeholder='Enter nom' required autofocus value='<?= isset($member['nom']) ? htmlentities($member['nom']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='prenom'>Prenom</label>
            <input type='text' name='prenom' class='form-control' id='prenom' placeholder='Enter prenom' value='<?= isset($member['prenom']) ? htmlentities($member['prenom'])  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='pseudo'>Pseudo</label>
            <input type='text' name='pseudo' class='form-control' id='pseudo' placeholder='Pseudo' value='<?= isset($member['username']) ? htmlentities($member['username'])  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='date'>Date de naissance</label>
            <input type='date' name='date' class='form-control' id='date' placeholder='Enter date de naissance' value='<?= isset($member['date_naissance']) ? htmlentities($member['date_naissance'])  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='tel'>Téléphone</label>
            <input type='texte' name='tel' class='form-control' id='tel' placeholder='Enter numéro de telephone' value='<?= isset($member['telephone']) ? htmlentities($member['telephone'])  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='adresse'>Adresse</label>
            <input type='texte' name='adresse' class='form-control' id='adresse' placeholder='Enter adresse' value='<?= isset($member['adresse']) ? htmlentities($member['adresse'])  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='cp'>Code postal</label>
            <input type='texte' name='cp' class='form-control' id='cp' placeholder='Enter code postal' value='<?= isset($member['code_postal']) ? htmlentities($member['code_postal'])  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='ville'>Ville</label>
            <input type='texte' name='ville' class='form-control' id='ville' placeholder='Enter ville' value='<?= isset($member['ville']) ? htmlentities($member['ville'])  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='email'>Email</label>
            <input type='texte' name='email' class='form-control' id='email' placeholder='Enter email' value='<?= isset($member['email']) ? htmlentities($member['email'])  : '' ?>'>
        </div>
        <button type='submit' class='btn btn-primary my-3' name='submit'>Envoyer</button>
    </form>
</div>

