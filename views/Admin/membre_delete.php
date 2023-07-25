<?php
if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    try {
        $db = connect();
        $membersQuery = $db->prepare('SELECT m.*, a.titre, a.id AS id_utilisateur, a.fin_publication FROM membres AS m INNER JOIN annonces AS a ON m.id=a.id_utilisateur WHERE m.id =:id');
        
        $membersQuery->execute(['id' => $id]);
       
        $members = $membersQuery->fetch(PDO::FETCH_ASSOC);
        // Si un membre utilise la catégorie, création d'une erreur et redirection sur la page des catégorie
        if ($members) {
            $type = 'error';
            $message = 'Le membre ne peut pas être supprimé car il a des annonces en cours';
        } else {
            $deleteMemStmt = $db->prepare('DELETE FROM membres WHERE id=:id');
            $deleteMemStmt->execute(['id' => $id]);

            $deleteAnnoncesStmt = $db->prepare('DELETE FROM annonces WHERE id_utilisateur=:id_user');
            $deleteAnnoncesStmt->execute(['id_user' => $id_user]);
            // Vérification qu'une ligne a été impactée avec rowCount()
            if ($deleteMemStmt->rowCount() && $deleteAnnoncesStmt->rowCount()) {
                $type = 'success';
                $message = 'Membre supprimé';
            } else {
                $type = 'error';
                $message = 'Membre non supprimé';
            }
        }    
        
    } catch (Exception $e) {
        $type = 'error';
        $message = 'Exception message: ' . $e->getMessage();
    }
    
    $membresQuery = null;
    $deleteMemStmt = null;
    $db = null;

    // Redirection vers la page principale des categories en passant le message et son type en variables GET
    header('location:' . 'membres.php?type=' . $type . '&message=' . $message); 
} /* else {
    header('location:' . 'index.php');
}  */