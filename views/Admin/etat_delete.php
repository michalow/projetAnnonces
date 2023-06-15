<?php
require_once '../../models/functions.php';

// L'ID est-il dans les paramètres d'URL?
if (isset($_GET['id'])) {

    // Récupérer $id depuis l'URL
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    try {
        $db = connect();

        // Avant de supprimer une categorie, on vérifie qu'aucune annonce l'utilise
        $etatsQuery = $db->prepare('SELECT e.*, e.nom FROM etats AS e INNER JOIN annonces AS a ON e.id=a.id WHERE e.id = :id');
        
        $etatsQuery->execute(['id' => $id]);
       
        $etats = $etatsQuery->fetch(PDO::FETCH_ASSOC);
        
        if ($categories) {
            $type = 'error';
            $message = 'L\'état ne peut pas être supprimé car un membre l\'utilise';
        } else {
            $deleteEtatStmt = $db->prepare('DELETE FROM etats WHERE id=:id');
            $deleteEtatStmt->execute(['id' => $id]);
            // Vérification qu'une ligne a été impactée avec rowCount()
            if ($deleteEtatStmt->rowCount()) {
                $type = 'success';
                $message = 'Etat supprimé';
            } else {
                $type = 'error';
                $message = 'Etat non supprimé';
            }
        }
    } catch (Exception $e) {
        $type = 'error';
        $message = 'Exception message: ' . $e->getMessage();
    }
    
    $etatsQuery = null;
    $deleteEtatStmt = null;
    $db = null;

    // Redirection vers la page principale des categories en passant le message et son type en variables GET
    header('location:' . 'etats.php?type=' . $type . '&message=' . $message);
} else {
    header('location:' . 'index.php');
}