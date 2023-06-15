<?php

/* require_once '../../models/functions.php'; */

if (!empty($_POST)) {
    $nomCategorie = $_POST['nom'] ?? '';
    $decriptionCategorie = $_POST['description'] ?? '';
    //$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

    $db = connect();

    if (empty($_POST['id'])) {
        try {
            $createCatStmt = $db->prepare('INSERT INTO categories (nom_categorie,description) VALUES (:nom_categorie, :description)');
            $createCatStmt->execute(['nom_categorie'=>$nomCategorie, 'description'=>$decriptionCategorie]);
        
            if ($createCatStmt->rowCount()) {
                $type = 'success';
                $message = 'Catégorie ajoutée';
            } else {
                $type = 'error';
                $message = 'Catégorie non ajoutée';
            }
        } catch (Exception $e) {
            $type = 'error';
            $message = 'Exception message: ' . $e->getMessage();
        }
//categorie existe en BDD, on le met à jour
    } else {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        try {
            $updateCatStmt = $db->prepare('UPDATE categories SET nom_categorie=:nom_categorie, description=:description WHERE id=:id');
           $updateCatStmt->execute(['nom_categorie'=>$nomCategorie, 'description'=>$decriptionCategorie, 'id'=>$id]);
       
            if($updateCatStmt->rowCount()) {
                $type = 'success';
                $message = 'Catégorie mis à jour';
            }else{
                $type = 'error';
                $message = 'Catégorie non mis à jour';
            }
        } catch (Exception $e) {
            $type = 'error';
            $message = 'Catégorie non mis à jour: ' . $e->getMessage();
        }
    }

    $createCatStmt = null;
    $updateCatStmt = null;
    $db = null;

    header('location:' . 'categories.php?type=' . $type . '&message=' . $message);
}