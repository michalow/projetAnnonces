<?php

require_once '../../models/functions.php';
include_once '../common/header.php'; 
include_once '../common/admin_nav.php'; 

// Pour éviter de dupliquer le code, ce formulaire sera utiliser pour créer ou modifier une etat. Si l'url est appelée avec id= alors nous l'utiliserons pour éditer l'abo avec l'id spécifié. 
if(isset($_GET['id'])) {
    // récupérer $id dans les paramètres d'URL
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    try {
        $db = connect();

        $etatsQuery = $db->prepare('SELECT * FROM etats WHERE id= :id');
        $etatsQuery->execute(['id' => $id]);
        
        $etat = $etatsQuery->fetch(PDO::FETCH_ASSOC); //cette variable récupère les données selon id et sert à afficher dans formulaire prérempli (champ value)  

    } catch (Exception $e) {
        echo $e->getMessage();
    }


    $etatsQuery=null;
    $db=null;
}

$etats = getEtats();

?>


<div class='row'>
    <h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Etat Formulaire</h1>
</div>
<div class='row'>
    <form method='post' action='etat_edit.php'>
        <!--  Ajouter un champs cacher avec l'ID (s'il existe) pour qu'il soit envoyé avec le formulaire -->
        <input type='hidden' name='id' value='<?= $etat['id'] ?? '' ?>'>
        <div class='form-group my-3'>
            <label for='nom'>Nom</label>
            <input type='text' name='nom' class='form-control' id='nom' placeholder='Enter nom' required autofocus value='<?= isset($etat['nom']) ? htmlentities($etat['nom']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='description'>Description</label>
            <input type='text' name='description' class='form-control' id='description' placeholder='Enter description' value='<?= isset($etat['description']) ? htmlentities($etat['description'])  : '' ?>'>
        </div>
        <button type='submit' class='btn btn-primary my-3' name='submit'>Envoyer</button>
    </form>
</div>

<?php require_once '../common/footer.php' ?>