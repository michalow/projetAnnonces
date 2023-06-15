<?php 
session_start();
require_once __DIR__.'/models/functions.php';
require_once __DIR__.'/models/functions2.php';


$p = $_GET['p'] ?? "";


if($_SERVER["REQUEST_METHOD"] === "POST"){ // LOGGER ACTION
	$action= $_POST['action'] ?? ""; //champ caché action
	switch ($action) { 
		case 'signup': //input type hidden
			$message=addUser(); //fonction et return message succès au pas
			break;
		case 'login': 
			$message=logUser(); 
			$p="home"; 
			break;
		case 'forgot': 
            $message=waitReset();
			$p="home";
			break;
		case 'reset': 
			$message=resetPwd();
			$p="signup";
			break;
		case 'compte_edit':
			//traitement
			include 'views/Membre/compte_edit.php';
			$p="compte_form";
			//header('location:' . $p .'?type=' . $type . '&message=' . $message);
			break;
		case 'annonce_edit':
			include 'views/Membre/annonce_edit.php';
			$p="annonce_form";
			break;
	}
}

// ETAT CONNECTE ET DECONNECTE ET MDP OUBLIE OU REINITIALISE GESTION DE SESSIONS
if ($p=='activation') //si page activation $p //activation par mail LIEN D ACTIVATION AVEC TOKEN
	$message=activUser(); //message fonction ADDUSER
if ($p=='deconnect'){ //HOME.PHP <a class="button" href="?p=deconnect">Se déconnecter</a>
	session_unset(); //plus connecter FONCTION LOGUSER
	session_destroy(); // 2 unset et destroy parce que certains navoigaeur ne support pas une
	$message=array("success", "Vous êtes déconnecté"); //MESSAGE SUCCESS
}
if ($p=='reset' && !isset($_GET['t'])){ //si p est reset RESET.PHP value="reset"
	$message=array("error", "Lien invalide. Veuillez réessayer"); //MESSAGE ERROR
	$p="forgot"; //MDP oublié
}

$logged = $_SESSION['is_login'] ?? false;

include __DIR__."/views/common/header.php";
include __DIR__."/views/common/navbar.php";

switch ($p) {
	case 'forgot':
		include "views/forgot.php";	
		break;	
	case 'reset': //réinitialisation de mdp recup token dans t
		$token=htmlspecialchars($_GET['t']); //$TOKEN $_GET['t']
		include "views/reset.php";	
		break;	
	case 'signup': //champ caché hidden value signup dans fichier signup.php
		include "views/signup.php";	
		break;
	case 'annonces':
		$id=null;
		$annonces=null;
		if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"]>=0){
			$id = $_GET['id'];
			$annonces=$annonces[$id];
		}
		if($annonces){
			echo "test";
			include "views/annonces.php";
		}else{
			echo "Merde";
		} 		
		break;	
    case 'espace':
		include "views/Membre/espace.php";	
		break;
    case 'annonces_user': 
        include "views/Membre/annonces.php";	
        break;  
    case 'annonces_user_form':
		/* ?id=$annonce['id'] */
		/* $idAnnonce=null;
		$annonce=null;
		if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"]>=0){
			$idAnnonce = $_GET['id'];
			$annonce=$annonce[$id];
		}else{
			echo 'TEST';
			var_dump($_GET);
		} */
		/* if($annonce){
			include "views/Membre/annonce_form.php";
		}  */
       include "views/Membre/annonce_form.php";	
        break;
    case 'annonces_user_del': 
        include "views/Membre/annonce_delete.php";	
        break;             
    case 'compte': 
        include "views/Membre/compte.php";	
        break; 
    case 'compte_form': 
        include "views/Membre/compte_form.php";	
        break;             
    case 'contact':
        include "views/contact.php";	
        break; 
	case 'admin':
		include "views/Admin/admin.php";	
		break;
	case 'categories':
		include "views/Admin/categories.php";	
		break;
	case 'categorie_form':
		include "views/Admin/categorie_form.php";	
		break;	
	case 'etats':
		include "views/Admin/etats.php";	
		break;			
	default:
		include "views/home.php";	//si $p vide c'est une page HOME ; $p = $_GET['p'] ?? ""; sinon "" vide
} 

include __DIR__."/views/common/footer.php";

?>

