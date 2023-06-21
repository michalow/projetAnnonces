<?php

/* require_once '../../models/functions.php'; */
var_dump($_POST);
if (isset($_POST)) {
    $id = $_POST['id'];
    $titreAnnonce = $_POST['titre'] ?? '';
    $descriptionAnnonce = $_POST['description'] ?? '';
    $prixAnnonce = $_POST['prix'];
    $etat = filter_input(INPUT_POST, 'id_etat', FILTER_SANITIZE_NUMBER_INT);
    /* $id_categorie = filter_input(INPUT_POST, 'id_categorie', FILTER_SANITIZE_NUMBER_INT); */

    $db = connect();

    if (empty($_POST['id'])) {
        try {
            $createAnnStmt = $db->prepare('INSERT INTO annonces (
                titre, 
                description,
                prix_vente, 
                id_etat) VALUES (
                    :titre, 
                    :description, 
                    :prix, 
                    :etat)');
            $createAnnStmt->execute(['titre'=>$titreAnnonce, 'description'=>$descriptionAnnonce, 'prix'=>$prixAnnonce,
            'etat'=>$etat]);
            /* $createPhStmt = $db->prepare('INSERT INTO photos (url, legende, main, id_annonce) VALUES (:url, :legende, :main, :id_annonce)');
            $createPhStmt->execute(['url'=>$url, 'legende'=>$legende, 'main'=>$main, 'id_annonce'=>$idAnnonce]);
            //$idAnnonce=$_POST['id'];
            $createCatStmt = $db->prepare('INSERT INTO categories_annonces (id_annonce, id_categorie) VALUES (:id_annonce, :id_categorie)');
            $createCatStmt->execute(['id_annonce'=>$id_annonce, 'id_categorie'=>$id_categorie]); */
            if ($createAnnStmt->rowCount()) {
                $type = 'success';
                $message = ['Veuillez patienter. Votre annonce est en attente de publication'];
            } else {
                $type = 'error';
                $message = ['Veuillez réessayé. Votre annonce n\'a pas été ajoutée'];
            }
        } catch (Exception $e) {
            $type = 'error';
            $message = ['Exception message: ' . $e->getMessage()];
        }
//categorie existe en BDD, on le met à jour
    } else {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        try {
            $updateAnnStmt = $db->prepare('UPDATE annonces SET 
            titre=:titre, 
            description=:description, 
            prix_vente=:prix,
            id_etat=:etat 
            WHERE id=:id');
           $updateAnnStmt->execute([
            'titre'=>$titre, 
            'description'=>$decription, 
            'prix'=>$prix, 
            'etat'=>$etat, 
            'id'=>$id]);
       
            if($updateAnnStmt->rowCount()) {
                $type = 'success';
                $message = 'Annonce a été modifiée';
            }else{
                $type = 'error';
                $message = 'Annonce n\'a pas été modifiée. Veuillez réessayer';
            }
        } catch (Exception $e) {
            $type = 'error';
            $message = 'Annonce n\'a pas été modifiée: ' . $e->getMessage();
        }
    }

    $createAnnStmt = null;
    $updateAnnStmt = null;
    $db = null;

   header('location:' . 'annonces.php?type=' . $type . '&message=' . $message);
}