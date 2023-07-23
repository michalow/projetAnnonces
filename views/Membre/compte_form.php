<?php
if(isset($_SESSION['id'])) {
    $id=$_SESSION['id'];
    /* $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); */
    $member=getMember($id);
}

alertMessage();
?>


<div class='row'>
<h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Mon compte à modifier</h1>
</div>
<div class='row'>
    <form method='post' action=''>
        <input type='hidden' name='action' value='compte_edit'>
        <div class='form-group my-3'>
            <label for='nom'>Nom</label>
            <input type='text' name='nom' class='form-control' id='nom' placeholder='Enter nom' required autofocus value='<?= isset($member['nom']) ? htmlentities($member['nom'] ?? '') : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='prenom'>Prenom</label>
            <input type='text' name='prenom' class='form-control' id='prenom' placeholder='Enter prenom' value='<?= isset($member['prenom']) ? htmlentities($member['prenom'] ?? '')  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='pseudo'>Pseudo</label>
            <input type='text' name='pseudo' class='form-control' id='pseudo' placeholder='Pseudo' value='<?= isset($member['username']) ? htmlentities($member['username'])  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='avatar'>Photo</label>
            <input type='file' name='avatar' class='form-control' id='avatar' placeholder='' value='<?= isset($member['avatar']) ? htmlentities($member['avatar'])  : '' ?>'>
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
        <button type='submit' class='btn btn-primary my-3' name='submit'>Envoyer</button>
    </form>
</div>

