<?php
require_once 'functions.php';

// L'ID est-il dans les paramètres d'URL?
if (isset($_GET['id'])) {

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    try {
        $db = connect();
        $deleteAnnStmt = $db->prepare('DELETE FROM annonces WHERE date_validation IS NULL AND id=:id');
        $deleteAnnStmt->execute(['id' => $id]);
    
        if ($deleteAnnStmt->rowCount()) {
            $type = 'success';
            $message = 'Annonce a été supprimée';
        } else {
            $type = 'error';
            $message = 'Annonce n\'a pas été supprimée';
        }

    } catch (Exception $e) {
        $type = 'error';
        $message = 'Exception message: ' . $e->getMessage();
    }
    $deleteAnnStmt = null;
    $db = null;

    // Redirection vers la page principale des membres en passant le message et son type en variables GET
    header('location:' . 'annonces.php?type=' . $type . '&message=' . $message); //renvoie sur members qui affiche un message
} else {
    //Redirection vers l'Accueil s'il n'y a pas d'ID membre 
    header('location:'. 'index.php');
}