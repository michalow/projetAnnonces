<?php
require_once '../../models/functions.php';

// L'ID est-il dans les paramètres d'URL?
if (isset($_GET['id'])) {

    // Récupérer $id depuis l'URL
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    try {
        $db = connect();

        // Avant de supprimer une categorie, on vérifie qu'aucune annonce l'utilise
        $categoriesQuery = $db->prepare('SELECT ca.*, c.nom_categorie FROM categories AS c INNER JOIN categories_annonces AS ca ON c.id=ca.id_categorie WHERE c.id = :id');
        
        $categoriesQuery->execute(['id' => $id]);
       
        $categories = $categoriesQuery->fetch(PDO::FETCH_ASSOC);
        // Si un membre utilise la catégorie, création d'une erreur et redirection sur la page des catégorie
        if ($categories) {
            $type = 'error';
            $message = 'La catégorie ne peut pas être supprimée car un membre l\'utilise';
        } else {
            // la categorie peut être supprimée

            $deleteCatStmt = $db->prepare('DELETE FROM categories WHERE id=:id');
            $deleteCatStmt->execute(['id' => $id]);
            // Vérification qu'une ligne a été impactée avec rowCount()
            if ($deleteCatStmt->rowCount()) {
                $type = 'success';
                $message = 'Catégorie supprimée';
            } else {
                $type = 'error';
                $message = 'Catégorie non supprimée';
            }
        }
    } catch (Exception $e) {
        $type = 'error';
        $message = 'Exception message: ' . $e->getMessage();
    }
    
    $categoriesQuery = null;
    $deleteCatStmt = null;
    $db = null;

    // Redirection vers la page principale des categories en passant le message et son type en variables GET
    header('location:' . 'categories.php?type=' . $type . '&message=' . $message);
} else {
    header('location:' . 'index.php');
}