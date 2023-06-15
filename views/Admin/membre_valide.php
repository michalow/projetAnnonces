<?php
require_once '../../models/functions.php';

// L'ID est-il dans les paramètres d'URL?
if (isset($_GET['id'])) {

    // Récupérer $id depuis l'URL
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    try {
        $db = connect();
        // Avant de supprimer une categorie, on vérifie qu'aucune annonce l'utilise
        $membersQuery = $db->prepare('UPDATE membres SET actif=1 WHERE id =:id');
        
        $membersQuery->execute(['id' => $id]);
        if($membersQuery->rowCount()){
            $type = 'success';
            $message = 'Membre a été activé';
        } else {
            $type = 'error';
            $message = 'Membre n\'a pas été activé';
        }

        $members = $membersQuery->fetch(PDO::FETCH_ASSOC);
        // Si un membre utilise la catégorie, création d'une erreur et redirection sur la page des catégorie
        
    } catch (Exception $e) {
        $type = 'error';
        $message = 'Exception message: ' . $e->getMessage();
    }
    
    $membresQuery = null;
    $deleteMemStmt = null;
    $db = null;

    // Redirection vers la page principale des categories en passant le message et son type en variables GET
    header('location:' . 'membres.php?type=' . $type . '&message=' . $message);
} else {
    header('location:' . 'index.php');
}