<?php

require_once "../models/CategoriesManager.class.php";
require_once "../models/Categorie.class.php";

/* $CategoriesManager = new CategoriesManager();
var_dump($categoriesManager->getAllCategories()); */

class CategoriesController extends CategoriesManager 
{
    /* public $categorieManager;

    public function __construct(){
        $this->categorieManger = new CategoriesManager; //création d'objet du model de la classe Manager pour afficher la liste de categories
    }

    public function viewsCategories(){
        $cat = $this->categorieManager;
        return $cat; // fonction de Manager qui récupére toutes les catégories
    } */
}

$categoriesController = new CategoriesController;

$allcategories = $categoriesController->getAllCategories();

/* foreach($allcategories as $categorie){
  echo $categorie->getName()."<br>";
  echo $categorie->getId()."<br>";
  echo $categorie->getDescription()."<br>";
} */

/* $categorie_detail=new Categorie;
var_dump($categorie_detail->getIdCategories()); */

/* C:\laragon\www\PROJET\2505\controllers\CategoriesController.php:24:
array (size=4)
  0 => 
    object(Categorie)[4]
      private 'id' => int 1
      private 'name' => string 'jupe' (length=4)
      private 'description' => string 'jupe bla, bla' (length=13)
  1 => 
    object(Categorie)[5]
      private 'id' => int 5
      private 'name' => string 'pppa' (length=4)
      private 'description' => string '<p>description</p>' (length=18)
  2 => 
    object(Categorie)[6]
      private 'id' => int 6
      private 'name' => string 't-shirt' (length=7)
      private 'description' => string 'dsqddqsdqfd' (length=11)
  3 => 
    object(Categorie)[7]
      private 'id' => int 7
      private 'name' => string 'Pull' (length=4)
      private 'description' => string 'pull bla bla' (length=12)
C:\laragon\www\PROJET\2505\controllers\CategoriesController.php:27:string 'vetem' (length=5) */
?>