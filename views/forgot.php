<!-- <form action="" method="post">
    <div>    //formulaire réinitialisation
        <label for="password">Nouveau mot de passe</label>
        <input type="password" name="password" id="password" placeholder="nouveau mot de passe">
    </div>
    <div>    
        <label for="password_conf">Confirmation de nouveau mot de passe</label>
        <input type="password" name="password_conf" id="password_conf" placeholder="nouveau mot de passe">
    </div> 
    <div>   
        <input type="submit" value="Se connecter">
    </div>
</form> -->

<div class='main'>
    <div class="forgot">
    <form action="" method="post">
        <input type="hidden" name="action" value="forgot"> 
        <label for="email">Votre Email</label>
        <input type="email" name="email">
        <input type="submit" value="Réinitialiser mon mot de passe !">
        <a href="index.php?p=signup">La mémoire m'est revenue</a>     
    </form>
    </div>
</div>
