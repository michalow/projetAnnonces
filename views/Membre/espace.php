<?php 

require_once 'models/functions.php';

if(isset($_SESSION['id']) && getAvatar($_SESSION['id'])){
    $src=getAvatar($_SESSION['id']);
}else{
    $src='images/defaut.jpg';
} 
var_dump($_SESSION);
/* var_dump(getAvatar('1')); */  //fonction  getAvatar ne fonctionne pas!!!
?>

<h2>Espace membre</h2>

<a href='index.php?p=compte' class='btn btn-secondary m-2 active' role='button'>Mon compte</a>
<a href='index.php?p=annonces_user' class='btn btn-secondary m-2 active' role='button'>Mes annonces</a>
<a href='index.php?p=annonces_user_form' class='btn btn-secondary m-2 active' role='button'>Nouvelle annonce</a>

<div>
    <img src="<?= $src ?>" width="200" height="185">
</div>

