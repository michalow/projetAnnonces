<?php
/* Contient les fonctions générales et d'inscription/connexion  */
function connect() {
    $hostname = 'localhost';
    $dbname = 'projet_annonces';
    $username = 'root';
    $password = '';
    
    $dsn = "mysql:host=$hostname;dbname=$dbname";

    try{
      return new PDO($dsn, $username, $password);
      echo "Connecté";
    } catch (Exception $e){
      echo $e->getMessage();
    }
}

function getAnnonces(){
    try{
        $db = connect();

        $annoncesQuery = $db->query('SELECT * FROM annonces');

        return $annoncesQuery->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getCategories() {
    try {
        $db = connect();

        $categoriesQuery=$db->query('SELECT * FROM categories');

        return $categoriesQuery->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getEtats() {
    try {
        $db = connect();

        $categoriesQuery=$db->query('SELECT * FROM etats');

        return $categoriesQuery->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getMembers() {
    try {
        $db = connect();

        $categoriesQuery=$db->query('SELECT * FROM membres LIMIT 10');

        return $categoriesQuery->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

// récupére le chemin de l'avatar
/* function getAvatar($id) {
    try {
        $db = connect();
        $query=$db->prepare('SELECT url FROM avatars WHERE id_membre= :id');
        $query->execute(['id'=>$id]);
        if ($query->rowCount()){
            $avatars=$query->fetchAll(PDO::FETCH_COLUMN,0);
            return $avatars[random_int(0,count($avatars)-1)];
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    } 
    return false;
} */

function getAvatar($id) {
    try {
        $db = connect();
        $avatarQuery=$db->prepare('SELECT url FROM avatars WHERE id_membre= :id');
        $avatarQuery->execute(['id'=>$id]);
        
        $avatar=$avatarQuery->fetchAll(PDO::FETCH_ASSOC);
         
    } catch (Exception $e) {
        echo $e->getMessage();
    } 
    return false;
}

// enregistre les chemins des avatars
function addAvatar($id) {
    $cpt=0;
    print_r($_FILES['avatar']['tmp_name']);
    foreach($_FILES['avatar']['error'] as $k=>$v){
        if(is_uploaded_file($_FILES['avatar']['tmp_name'][$k]) && $v == UPLOAD_ERR_OK) {
            $url="images/".$_FILES['avatar']['name'][$k];
            var_dump($url);
            move_uploaded_file($_FILES['avatar']['tmp_name'][$k],$url);
            try{
                $db=connect();
                $query = $db->prepare("INSERT INTO avatars(id_membre, url) VALUES (:id_user, :url)");
                $req= $query->execute(['id_user'=>$id,'url'=>$url]);
                if($req) $cpt++;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
    return $cpt;
}

// récupére le chemin de la photo
function getPhotos($id) {
    try {
        $db = connect();
        $photosQuery=$db->prepare('SELECT url FROM photos WHERE id_annonce= :id');
        $photosQuery->execute(['id'=>$id]);
        if ($photosQuery->rowCount()){
            $photos=$photosQuery->fetchAll(PDO::FETCH_COLUMN,0);
            return $photos[random_int(0,count($photos)-1)];
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    } 
    return false;
}


// enregistre les chemins des avatars
function addPhotos($id) {
    $cpt=0;
    foreach($_FILES['photo']['error'] as $k=>$v){
        if(is_uploaded_file($_FILES['photo']['tmp_name'][$k]) && $v == UPLOAD_ERR_OK) {
            $url=__DIR__."/views/images/".$_FILES['photo']['name'][$k];
            move_uploaded_file($_FILES['photo']['tmp_name'][$k],$url);
            try{
                $db=connect();
                $query = $db->prepare("INSERT INTO photos( id_annonce, url) VALUES (:id_annonce, :url)");
                $req= $query->execute(['id_annonce'=>$id,'url'=>$url]);
                if($req) $cpt++;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
    return $cpt;
}
/* // ADMIN
function getAdmin(){
    try {
        $db = connect();
        $query=$db->query('SELECT * FROM membres WHERE is_admin=1');
        
        return $query->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
        echo $e->getMessage();
    }
  }  */

//RECUPERATION DE BDD PAR SON EMAIL CETTE FONCTION EST UTILISEE DANS LOGUSER
function getUserByEmail($email) {
  try {
      $db = connect();
      $query=$db->prepare('SELECT * FROM membres WHERE email= :email');
      $query->execute(['email'=>$email]);
      if ($query->rowCount()){
          return $query->fetch();
      }
  } catch (Exception $e) {
      echo $e->getMessage();
  } 
  return false;
}     

// Récupération d'un utilisateur à partir d'un token
function getUserByToken($token) {
  try {
      $db = connect();
      $query=$db->prepare('SELECT * FROM membres WHERE token= :token');
      $query->execute(['token'=>$token]);
      if ($query->rowCount()){
          return $query->fetch();
      }
  } catch (Exception $e) {
      echo $e->getMessage();
  } 
  return false;
}   

function getAdmin($isAdmin){
    try {
        $db = connect();
        $query=$db->prepare('SELECT * FROM membres WHERE is_admin= :isadmin=true');
        $query->execute(['isadmin'=>$isAdmin]);
        if ($query->rowCount()){
            return $query->fetch();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    } 
    return false;
  }     

//LOGGER USER
function logUser() {
  $email=filter_var(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
  $user=getUserByEmail($email); //fonction pour récuperer user par son email
  if($user){
      if(password_verify($_POST['password'], $user['password'])){ //comparaire mdp envoyé avec mdp dans la BDD
          if($user['actif']){
              $_SESSION['is_login']=true; //test connexion
              $_SESSION['is_actif']=$user['actif']; //1 ou 0
              $_SESSION['id']=$user['id'];
              header("Location: ?p=espace");
              return array("success", "Connexion réussie. Bonjour ".$user['nom']);               
          }else return array("error", "Veuillez activer votre compte");
      }else return array("error", "Mauvais identifiants");
  }else return array("error", "Mauvais identifiants"); //ne repond pas que c'est le mdp (sécurité)
}


//AJOUTER UN USER
function addUser() {
  $email=filter_var(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
  if(!getUserByEmail($email)){ // Récupération d'un utilisateur à partir de son email //si l'email n'est pas dans la BDD
      if ($_POST['password']===$_POST['password_conf']){ //confirmation de mail vérifier si 2 mdp sont OK
          if(preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}$/", $_POST['password'])){ 
              $pwd=password_hash($_POST['password'], PASSWORD_DEFAULT); // haché le mdp avec la fonction password_hach
              $nom=htmlspecialchars($_POST['nom']);
              $prenom=htmlspecialchars($_POST['prenom']); 
              $username=htmlspecialchars($_POST['username']);
              $token=bin2hex(random_bytes(16)); // 16 catactères au hasard avec fonction bin to heximal passer en parametre de l'URL
              $email=htmlspecialchars($_POST['email']);
            $naissance=htmlspecialchars($_POST['naissance']);
            $tel=htmlspecialchars($_POST['telephone']);
            $adresse=htmlspecialchars($_POST['adresse']);
            $cp=htmlspecialchars($_POST['cp']);
            $ville=htmlspecialchars($_POST['city']);
              try {
                  $db = connect(); 
                  $query=$db->prepare('INSERT INTO membres (username, nom, prenom, email, password, token, date_naissance, telephone, adresse, code_postal, ville) VALUES (:username, :nom, :prenom, :email, :pwd, :token, :naissance, :telephone, :adresse, :cp, :ville)'); //requette d'insértion dans le bon ordre email VALUES :email (playholder par exemple en mysql "?" )
                  $query->execute(['username'=>$username, 'nom'=>$nom, 'prenom'=>$prenom, 'email'=> $email,  'pwd'=> $pwd, 'token'=> $token, 'naissance'=> $naissance, 'telephone'=>$tel, 'adresse'=>$adresse, 'cp'=>$cp, 'ville'=>$ville]); //enregistrement dans la BDD
                  if ($query->rowCount()){ //combien de lignes impactées, vérifier si c'était bien enregistrer
                    addAvatar($db->lastInsertId());
                      $content="<p><a href='0906/index.php?p=activation&t=$token'>Merci de cliquer sur ce lien pour activer votre compte</a></p>"; //changer URL (comme index.php) qui contient la page et token //CONTENU du MAIL p=activation !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                      // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
                      $headers = array(
                          'MIME-Version' => '1.0',
                          'Content-type' => 'text/html; charset=iso-8859-1',
                          'X-Mailer' => 'PHP/' . phpversion()
                      );
                      mail($email,"Veuillez activer votre compte", $content, $headers); //ENVOIE un mail
                      return array("success", "Inscription réussi. Vous allez recevoir un mail pour activer votre compte. Contenu du message envoyé : $email $content"); //message de succès si l'inscription est OK
                  }else return array("error", "Problème lors de enregistrement"); //ARRAY avec ERROR return tableau 
              } catch (Exception $e) {
                  return array("error",  $e->getMessage()); //tableau d'erreur
              } 
          }else array("error", "Le mot de passe doit comporter au moins 8 caractères dont au moins 1 chiffre, 1 minuscule, 1 majuscule et 1 caractère spécial");
      }else array("error", "Les 2 saisies de mot de passes doivent être identique.");
  }else array("error", "Un compte existe déjà pour cet email.");
}

function activUser() {
    $token=htmlspecialchars($_GET['t']);
    $user=getUserByToken($token);
    if($user){
        if(!$user['actif']){
            try {
                $db = connect();
                $query=$db->prepare('UPDATE membres SET token = NULL, actif = 1 WHERE token= :token');
                    $query->execute(['token'=> $token]);
                    if ($query->rowCount()){
                         return array("success", "Votre compte est activé, vous pouvez vous connecter"); 
                    }else return array("error", "Problème lors de l'activation"); 
            } catch (Exception $e) {
                return array("error",  $e->getMessage());
            }              
        }else return array("error", "Ce compte est déjà actif");
    }else return array("error", "Lien invalide !");
}

function waitReset() {
    $email=filter_var(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
    if(getUserByEmail($email)){
        $token=bin2hex(random_bytes(16));
        $perim=time()+1200;
        try {
            $db = connect();
            $query=$db->prepare('UPDATE membres SET token = :token, date_validite_token = :perim WHERE email = :email');
            $query->execute(['email'=> $email, 'perim'=> $perim , 'token'=> $token]);
            if ($query->rowCount()){
                $content="<p><a href='1006/index.php?p=reset&t=$token'>Merci de cliquer sur ce lien pour réinitialiser votre mot de passe</a></p>";
                $headers = array(
                    'MIME-Version' => '1.0',
                    'Content-type' => 'text/html; charset=iso-8859-1',
                    'X-Mailer' => 'PHP/' . phpversion()
                );
                mail($email,"Réinitialisation de mot de passe", $content, $headers);
                return array("success", "Vous allez recevoir un mail pour réinitialiser votre mot de passe".$content);
            }else array("error", "Problème lors du process de réinitialisation");
        } catch (Exception $e) {
            return array("error",  $e->getMessage());
        }
    }else array("error", "Aucun compte ne correspond à cet email.");
}

function resetPwd() { $token=htmlspecialchars($_POST['token']);
  $user=getUserByToken($token);
  if($user){
      if (time()<$user['date_validite_token']){
          if ($_POST['password']===$_POST['password_conf']){
              if(preg_match("/^(?=.\d)(?=.[0-9])(?=.[a-z])(?=.[A-Z])(?=.*[\W]).{8,}$/", $_POST['password'])){                  
                $pwd=password_hash($_POST['password'], PASSWORD_DEFAULT);
                  try {
                      $db = connect();
                      $query=$db->prepare('UPDATE membres SET token = NULL, password = :pwd, actif = 1 WHERE token= :token');
                      $query->execute(['pwd'=> $pwd, 'token'=> $token]);
                      if ($query->rowCount()){
                          $content="<p>Votre mot de passe a été réinitialisé</p>";
                          $headers = array(
                              'MIME-Version' => '1.0',
                              'Content-type' => 'text/html; charset=iso-8859-1',
                              'X-Mailer' => 'PHP/' . phpversion()
                          );
                          mail($user['email'],"Réinitialisation de mot de passe", $content, $headers);
                          return array("success", "Votre mot de passe a bien été réinitialisé");
                      }else return array("error", "Problème lors de la réinitialisation");
                  } catch (Exception $e) {
                      return array("error",  $e->getMessage());
                  } 
              }else return array("error", "Le mot de passe doit comporter au moins 8 caractères dont au moins 1 chiffre, 1 minuscule, 1 majuscule et 1 caractère spécial");
          }else return array("error", "Les 2 saisies de mot de passe doivent être identiques.");
      }else return array("error", "Le lien n'est plus valide ! Veuillez <a href='?p=forgot'>recommencer</a>");
  }else return array("error", "Les données ont été corrompues ! Veuillez <a href='?p=forgot'>recommencer</a>");
}

function ContactEmail(){
    if($_SERVER['REQUEST_METHOD'==='POST']){
        if(isset($_POST['email'])){
            $_POST['email']=filter_var(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
            if(!empty($_POST['message'])){
                isset($_POST['objet']) ? $objet=htmlspecialchars($_POST['objet']) : '';
                $content=htmlentities($_POST['message']);
                    $headers = array(
                        'MIME-Version' => '1.0',
                        'Content-type' => 'text/html; charset=iso-8859-1',
                        'X-Mailer' => 'PHP/' . phpversion()
                        );
                        mail('nat06@net-c.fr', isset($_POST['objet']) ? $objet=htmlspecialchars($_POST['objet']) : $objet='', $content, $headers);
                        return array("success", "Votre message a bien été envoyé");       
            }else{
                return array("error", "Merci de saisir votre message");
            }
        }else{
            return array("error", "Votre email est non valid");
        }
        return array("error", "Votre email n'a pas été envoyé. Veuillez réessayer");
    }
}
