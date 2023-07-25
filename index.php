<?php 
session_start();
require_once __DIR__.'/models/functions.php';
require_once __DIR__.'/models/functions2.php';

/* if(isset($_GET['p'])) { */
	/* $p = $_GET['p']; */
/* }  */
$p = $_GET['p'] ?? "";

define("LIMIT", 10);

if($_SERVER["REQUEST_METHOD"] === "POST"){ // LOGGER ACTION
	$action= $_POST['action'] ?? ""; 
	switch ($action) { 
		case 'signup': //input type hidden
			$message=addUser(); //fonction et return message succès au pas
			break;
		case 'login': 
			$message=logUser(); 
			if(isset($_SESSION)){
				if($_SESSION['is_admin']==0){
					$p="espace";
				} else {
					$p="admin";
				}
			} else {
				$p="home";
			} 
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
			/* header('location:' . $p .'?type=' . $type . '&message=' . $message); */
			break;
		case 'annonce_edit':
			include 'views/Membre/annonce_edit.php';
			$p="annonces_user_form";
			break;
		case 'categorie_edit';
			include 'views/Admin/categorie_edit.php';
			$p="categorie_form";
			break;	
		case 'contact':
			$message=contactEmail();
			$p="contact";
			break;		
	}
}

// ETAT CONNECTE ET DECONNECTE ET MDP OUBLIE OU REINITIALISE GESTION DE SESSIONS
if ($p=='activation') //si page activation $p //activation par mail LIEN D ACTIVATION AVEC TOKEN
	$message=activUser(); 
if ($p=='deconnect'){ 
	session_unset(); 
	session_destroy(); // 2 unset et destroy parce que certains navigateur ne support pas une
	$message=array("success", "Vous êtes déconnecté"); 
}
if ($p=='reset' && !isset($_GET['t'])){ 
	$message=array("error", "Lien invalide. Veuillez réessayer"); 
	$p="forgot"; 
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
	case 'signup': 
		include "views/signup.php";	
		break;
	case 'annonces':
		$id=null;
		$annonces=null;
		if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"]>=0){
			$id = $_GET['id'];
			$annonces=getAnnoncesPhotos();
		}
		if($annonces){
			include "views/annonces.php";
		}else{
			echo "Cet article n'existe pas";
		} 		
		break;	
	case 'femme':
		include "views/Annonces/femme.php";
		break;
	case 'homme':
		include "views/Annonces/homme.php";
		break;
	case 'enfant':
		include "views/Annonces/enfant.php";
		break;			
		
//MEMBRE
    case 'espace':
		include "views/Membre/espace.php";
		break;
    case 'annonces_user': 
        include "views/Membre/annonces.php";	
        break;  
    case 'annonces_user_form':
       include "views/Membre/annonce_form.php";	
        break;
    case 'annonces_user_del': 
        include "views/Membre/annonce_delete.php";	
        break;             
    case 'compte_form': 
        include "views/Membre/compte_form.php";	
        break;             
    case 'contact':
        include "views/contact.php";	
        break; 
//ADMIN
	case 'admin':
		include "views/Admin/admin.php";	
		break;
	case 'annonces_admin':
		include "views/Admin/annonces.php";	
		break;	
	case 'annonces_val':
		include "views/Admin/annonce_valide.php";	
		break;
	case 'annonces_form':
		include "views/Admin/annonces_form.php";	
		break;		
	case 'categories':
		include "views/Admin/categories.php";	
		break;
	case 'categorie_form':
		include "views/Admin/categorie_form.php";	
		break;
	case 'categorie_del':
		include "views/Admin/categorie_delete.php";	
		break;			
	case 'etats':
		include "views/Admin/etats.php";	
		break;	
	case 'membres':
		include "views/Admin/membres.php";	
		break;
	case 'membre_form':
		include "views/Admin/membre_form.php";	
		break;
	case 'membre_val':
		include "views/Admin/membre_valide.php";	
		break;		
	case 'membre_del':
		include "views/Admin/membre_delete.php";	
		break;				
		
	default:
		include "views/home.php";	
} 

include __DIR__."/views/common/footer.php";

?>

