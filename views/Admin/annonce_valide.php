<?php

if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    try {
        $db = connect();
        $announcementsQuery = $db->prepare('UPDATE annonces SET date_validation=CURRENT_TIMESTAMP WHERE id =:id');
        $announcementsQuery->execute(['id' => $id]);
        if($announcementsQuery->rowCount()){
            $message[0] = 'success';
            $message[1] = 'Annonce a été validée';
        } else {
            $message[0] = 'error';
            $message[1] = 'Annonce n\'a pas été validée';
        }
        $announcements = $announcementsQuery->fetch(PDO::FETCH_ASSOC);
        
    } catch (Exception $e) {
        $message[0] = 'error';
        $message[1] = 'Exception message: ' . $e->getMessage();
    }
    
    //header("location: index.php?p=annonces_admin&type=".$message[0]."&message=".$message[1]);
    
} 