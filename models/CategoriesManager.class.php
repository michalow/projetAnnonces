<?php

require_once "Model.class.php";
require_once "Categorie.class.php";

class CategoriesManager extends Model{ 

    public function getAllCategories(){
        $result=[];

        $req = $this->getDatabase()->prepare("SELECT * FROM categories");
        $req->execute();
        $categories = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

            foreach ($categories as $categorie) {
                $new_categorie = new Categorie(
                    $categorie['id'],
                    $categorie['nom_categorie'],
                    $categorie['description']
                );
                /* array_push($result, $new_categorie); */
                $result[] = $new_categorie;
            }
            return $result;
    }   
    
    //récupérer ou ajouter
    public function getIdCategories(){
        $req = $this->getDatabase()->prepare("SELECT * FROM categories where id = ?");
        $req->execute([$id]);
        $categories = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

            foreach ($categories as $categorie) {
                $new_categorie = new Categorie(
                    $categorie['id'],
                    $categorie['nom_categorie'],
                    $categorie['description']
                );
                /* array_push($result, $new_categorie); */
                 
            }
            return $new_categorie;
    } 
}
/* $CategoriesManager = new CategoriesManager;
var_dump($CategoriesManager->getAllCategories()); */
?>