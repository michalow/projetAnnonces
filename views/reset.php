

<form action="" method="post">
    <div>    
        <label for="password">Nouveau mot de passe</label>
        <!-- index switch ACTION POST["action"]-->
        <input type="hidden" name="action" value="reset"> 
		<input type="hidden" name="token" value="<?=$token?>">

        <input type="password" name="password" id="password" placeholder="nouveau mot de passe" required pattern="^(?=.*\d)(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}$" title="Le mot de passe doit comporter au moins 8 caractères dont au moins 1 chiffre, 1 minuscule, 1 majuscule et 1 caractères spécial">
    </div>
    <div>    
        <label for="password_conf">Confirmation de nouveau mot de passe</label>
        <input type="password" name="password_conf" id="password_conf" placeholder="nouveau mot de passe" required> <!-- au lieu de pwd chez moi il y a password et pwd2 password_conf -->
    </div> 
    <div>   
        <input type="submit" value="Se connecter">
    </div>
</form>