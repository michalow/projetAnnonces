<?php
require_once '../../models/functions.php';

// L'ID est-il dans les paramètres d'URL?
if (isset($_GET['id'])) {

    // Récupérer $id depuis l'URL
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    try {
        $db = connect();
        // Avant de supprimer une categorie, on vérifie qu'aucune annonce l'utilise
        $announcementsQuery = $db->prepare('UPDATE annonces SET date_validation=CURRENT_TIMESTAMP WHERE id =:id');
        
        $announcementsQuery->execute(['id' => $id]);
        if($announcementsQuery->rowCount()){
            $type = 'success';
            $message = 'Annonce a été validée';
        } else {
            $type = 'error';
            $message = 'Annonce n\'a pas été validée';
        }

        $announcements = $announcementsQuery->fetch(PDO::FETCH_ASSOC);
        // Si un membre utilise la catégorie, création d'une erreur et redirection sur la page des catégorie
        
    } catch (Exception $e) {
        $type = 'error';
        $message = 'Exception message: ' . $e->getMessage();
    }
    
    $announcementsQuery = null;
    $db = null;

    // Redirection vers la page principale des categories en passant le message et son type en variables GET
    header('location:' . 'annonces.php?type=' . $type . '&message=' . $message);
} else {
    header('location:' . 'index.php');
}