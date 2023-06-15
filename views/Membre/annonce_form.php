<?php
 
if(isset($_GET['id'])) {
    // récupérer $id dans les paramètres d'URL
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    try {
        $db = connect();

        $annoncesQuery = $db->prepare('SELECT * FROM annonces WHERE id= :id');
        $annoncesQuery->execute(['id' => $id]);
        
        $annonces = $annoncesQuery->fetch(PDO::FETCH_ASSOC); 
    } catch (Exception $e) {
        echo $e->getMessage();
    }


    $annoncesQuery=null;
    $db=null;
}

$etats = getEtats();
$categories = getCategories();

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
    <h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Créer votre annonce</h1>
</div>    
<div class='row'>    
    <form method='post' action='' enctype="multipart/form-data">
        <input type='hidden' name='action' value='annonce_edit'>
        <input type='hidden' name='id' value='<?= $annonce['id'] ?? '' ?>'>
        <div class='form-group my-3'>
            <label for='titre'>Titre d'annonce<span>max 150 caractères (au délà chaque caractère coûte 0.001 centimes)</span></label>
            <input type='text' id='titre' name='titre' class='form-control' placeholder='Enter titre' required autofocus value='<?= isset($annonce['titre']) ? htmlentities($annonce['titre']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='description'>Description<span>max 250 caractères (au délà chaque caractère coûte 0.001 centimes)</span></label>
            <input type='text' name='description' class='form-control' id='description' placeholder='Enter description' value='<?= isset($annonce['description']) ? htmlentities($annonce['description'])  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='prix'>Prix</label>
            <input type='text' name='prix' class='form-control' id='prix' placeholder='Enter prix' value='<?= isset($annonce['prix']) ? htmlentities($annonce['prix'])  : '' ?>'>
        </div>
        <!-- <div class='form-group my-3'>
            <label for='photo'>Photos</label>
            <div>1 photo gratuit, max 10 photos (chaque photo supplémentaire coûte 0.10 centimes)</div>
            <input type='file' name='photo[]' accept="image/*" multiple class='form-control' id='photo'>
        </div>
        <div class='form-group my-3'>
            <label for='categorie'>Catégorie</label>
            <select class='custom-select' name='id_categorie'>
                <?php foreach ($categories as $categorie) : ?>
                    <option <?= (!empty($annonce['id_categorie']) && $annonce['id_categorie'] == $categorie['id']) ? 'selected' : '' ?> value='<?= $categorie['id'] ?>'>
                        <?= htmlentities($categorie['nom_categorie']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class='form-group my-3'>
            <label for='etat'>Etat</label>
            <select class='custom-select' name='id_etat'>
                <?php foreach ($etats as $etat) : ?>
                    <option <?= (!empty($annonce['id_etat']) && $annonce['id_etat'] == $categorie['id']) ? 'selected' : '' ?> value='<?= $etat['id'] ?>'>
                        <?= htmlentities($etat['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select> -->
       <!--  </div> -->

        <button type='submit' class='btn btn-primary my-3' name='submit'>Ajouter</button>
        <!-- fonctionnalité enregistrer et à modifier plus tard -->
    </form>
</div>

