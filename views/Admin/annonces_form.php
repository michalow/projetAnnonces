<?php
 /* && $_SESSION */
if(!empty($_GET['id'])){
    // récupérer $id dans les paramètres d'URL
    $idAnnonce = $_GET['id'];
    /* var_dump($idAnnonce); */
    /* $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
 */
    $annonces=getAnnoncesByIdAnnonce($idAnnonce);
    var_dump($annonces);
    $categories=getCategories();
    var_dump($categories);
    $etats=getEtats();
    var_dump($etats);
} 


if (!empty($_GET['type']) && ($_GET['type'] === 'success')) : ?>
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
    <h1 class='col-md-12 text-center border border-dark bg-primary text-white'>
        Modifier annonce
    </h1>
</div>    
<div class='row'>    
    <form method='post' action='' enctype="multipart/form-data">
        <input type='hidden' name='action' value='annonces_form'>
        <input type='hidden' name='id' value='<?= $annonces['id'] ?? '' ?>'>
        <div class='form-group my-3'>
            <label for='titre'>Titre d'annonce
                <span>max 150 caractères (au délà chaque caractère coûte 0.001 centimes)</span>
            </label>
            <input type='text' id='titre' name='titre' class='form-control' placeholder='Enter titre' required autofocus value='<?= isset($annonces['titre']) ? htmlentities($annonces['titre']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='description'>Description 
                <span>max 250 caractères (au délà chaque caractère coûte 0.001 centimes)</span>
            </label>
            <textarea name="description" id="description" cols="120" rows="5">
            <?= isset($annonces['description']) ? htmlentities($annonces['description'])  : '' ?>    
            </textarea>  
        </div>
        <!-- <button><?php NbrChars($annonces['description']); ?></button> -->
        <div class='form-group my-3'>
            <label for='prix'>Prix</label>
            <input type='text' name='prix' class='form-control' id='prix' placeholder='Enter prix' value='<?= isset($annonces['prix_vente']) ? htmlentities($annonces['prix_vente'])  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='photo'>Photos</label>
            <div>1 photo gratuit, max 10 photos (chaque photo supplémentaire coûte 0.10 centimes)</div>
            <input type='file' name='photo[]' accept="image/*" multiple class='form-control' id='photo'>
            <img src="<?= isset($annonces['url']) ? htmlentities($annonces['url'])  : '' ?>" alt="<?= isset($annonces['legende']) ? htmlentities($annonces['legende']) : '' ?>" width="120" height="100">
        </div>
        <div class='form-group my-3'>
            <label for='legende'>Legende</label>
            <input type="text" name="legende" id="legende" value="<?= htmlentities($annonces['legende'] ?? '') ?>">
        </div>
       <!--  <div class='form-group my-3'>
            <label for='etat'>Etat</label>
            <select class='custom-select' name='id_etat' id="etat">
                
                <?php foreach ($etats as $etat) : ?>
                    <option <?= (!empty($annonces['id_etat']) && $annonces['id_etat'] === $annonces['nom']) ? 'selected' : '' ?> value='<?= $etat['nom'] ?>'>
                        <?= htmlentities($etat['nom']); ?>
                    </option>
                <?php endforeach; ?>

            </select>
        </div> -->
        <div class='form-group my-3'>
            <label for='etat'>Etat</label>
            <select class='custom-select' name='id_etat' id="etat">
        <?php foreach ($etats as $etat) : ?>
            <option <?= (!empty($annonces['id_etat']) && $annonces['id_etat'] === $etat['nom']) ? 'selected' : '' ?> value='<?= $etat['nom'] ?>'>
                <?= htmlentities($etat['nom']); ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>
        <div class='form-group my-3'>
            <label for='categorie'>Catégorie</label>
            <select class='custom-select' name='id_categorie' id='categorie'>

                <?php foreach ($categories as $categorie) : ?>
                    <option <?= (!empty($annonces['id_categorie']) && $annonces['id_categorie'] === $categorie['id']) ? 'selected' : '' ?> value='<?= $categorie['nom_categorie'] ?>'>
                        <?= htmlentities($categorie['nom_categorie']) ?>
                    </option>
                <?php endforeach; ?>

            </select>
        </div>

        <button type='submit' class='btn btn-primary my-3' name='submit'>Valider</button>
    </form>
</div>
