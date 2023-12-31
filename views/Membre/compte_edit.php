<?php

if (!empty($_POST)) 
{
    $id = $_SESSION['id'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $pseudo = $_POST['pseudo'] ?? '';
    $photo = $_POST['avatar'] ?? '';
    $date = $_POST['date'] ?? '';
    $tel = $_POST['tel'] ?? '';
    $adresse = $_POST['adresse'] ?? '';
    $cp = $_POST['cp'] ?? '';
    $ville = $_POST['ville'] ?? '';
    $date_update = date('Y-m-d H:i:s');

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
 
    $db = connect();

    /* if (!empty($_POST['id'])) {
        
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT); */

        try {
            $updateCptStmt = $db->prepare('UPDATE membres SET nom=:nom, prenom=:prenom, username=:pseudo, avatar=:avatar, date_naissance=:date_naissance, telephone=:tel, adresse=:adresse, code_postal=:cp, ville=:ville,  date_update=:date_update WHERE id=:id');
            
            $updateCptStmt->execute(['nom'=>$nom, 'prenom'=>$prenom, 'pseudo'=>$pseudo, 'avatar'=>$photo, 'date_naissance'=>$date, 'tel'=>$tel, 'adresse'=>$adresse, 'cp'=>$cp, 'ville'=>$ville, 'id'=>$id, 'date_update' => $date_update]);
            if($updateCptStmt->rowCount()) {
                $type = 'success';
                $message = ['success','Vos données personnelles ont été mises à jour'];
            }else{
                $type = 'error';
                $message = ['danger','Vos données personnelles n\'ont pas été mises à jour'];
            }
        } catch (Exception $e) {
            $type = 'error';
            $message = ['danger','Vos données personnelles n\'ont pas été mises à jour: ' . $e->getMessage()];
        }
  /* } */

    $updateCptStmt = null;
    $db = null;
}