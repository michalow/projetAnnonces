<?php
if (isset($_GET['id'])) {
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
        
    } catch (Exception $e) {
        $type = 'error';
        $message = 'Exception message: ' . $e->getMessage();
    }
    
    $membresQuery = null;
    $deleteMemStmt = null;
    $db = null;

    header('location:' . 'index.php?p=membres&type=' . $type . '&message=' . $message);
} else {
    header('location:' . 'index.php');
}