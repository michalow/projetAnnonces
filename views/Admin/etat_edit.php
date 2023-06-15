<?php

require_once '../../models/functions.php';

if (!empty($_POST)) {
    $nomEtat = $_POST['nom'] ?? '';
    $decriptionEtat = $_POST['description'] ?? '';
    //$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

    $db = connect();

    if (empty($_POST['id'])) {
        try {
            $createEtatStmt = $db->prepare('INSERT INTO etats (nom, description) VALUES (:nom, :description)');
            $createEtatStmt->execute(['nom'=>$nomEtat, 'description'=>$decriptionEtat]);
        
            if ($createEtatStmt->rowCount()) {
                $type = 'success';
                $message = 'Etat ajouté';
            } else {
                $type = 'error';
                $message = 'Etat non ajouté';
            }
        } catch (Exception $e) {
            $type = 'error';
            $message = 'Exception message: ' . $e->getMessage();
        }
//etat existe en BDD, on le met à jour
    } else {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        try {
            $updateEtatStmt = $db->prepare('UPDATE etats SET nom=:nom, description=:description WHERE id=:id');
            $updateEtatStmt->execute(['nom'=>$nomEtat, 'description'=>$decriptionEtat, 'id'=>$id]);
       
            if($updateEtatStmt->rowCount()) {
                $type = 'success';
                $message = 'Etat mis à jour';
            }else{
                $type = 'error';
                $message = 'Etat non mis à jour';
            }
        } catch (Exception $e) {
            $type = 'error';
            $message = 'Etat non mis à jour: ' . $e->getMessage();
        }
    }

    $createEtatStmt = null;
    $updateEtatStmt = null;
    $db = null;

    header('location:' . 'etats.php?type=' . $type . '&message=' . $message);
}