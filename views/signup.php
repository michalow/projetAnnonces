<div class="main">  	
	<div class="form-group">
		<form method="POST" action="" enctype="multipart/form-data">
			<input type="hidden" name="action" value="signup"> 
			<div class="form-group mb-3">
				<label for="name">Votre nom<span class="required">*</span></label>
				<input type="text" id="name" name="nom" class="form-control" placeholder="Nom" minlength=2 maxlength=25 autocomplete required="*">
			</div>
			<div class="form-group mb-3">
				<label for="prenom">Votre prénom<span class="required">*</span></label>
				<input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prénom" minlength=2 maxlength=25 autocomplete required="*">
			</div>
			<div class="form-group mb-3">
				<label for="username">Pseudo<span class="required">*</span></label>
				<input type="text" id="username" name="username" class="form-control" placeholder="Pseudo" maxlength=25 autocomplete required="*">
			</div>
			<div class="form-group mb-3">
				<label for="naissance">Date de naissance<span class="required">*</span></label>
				<input type="date" id="naissance" name="naissance" class="form-control" placeholder="Date de naissance" min="1900" max="2000" autocomplete required="*">
			</div class="form-group mb-3">
				<label for="telephone">Votre téléphone<span class="required">*</span></label>	
				<input type="number" id="telephone" name="telephone" class="form-control" placeholder="Téléphone" autocomplete required="*">
			</div>
			<div class="form-group mb-3">
				<label for="adresse">Adresse<span class="required">*</span></label>
				<input type="text" id="adresse" name="adresse" class="form-control" placeholder="Adresse" autocomplete required="*">
			</div>
			<div class="form-group mb-3">
				<label for="cp">Code postale<span class="required">*</span></label>
				<input type="number" id="cp" name="cp" class="form-control" aria-describedby="" placeholder="Code Postal" autocomplete required="*">
			</div>
      		<div class="form-group mb-3">
        		<label for="city">Ville<span class="required">*</span></label>
        		<input type="text" id="city" name="city" class="form-control" aria-describedby="" placeholder="Ville" required="*" autocomplete>
			</div>
			<div class="form-group mb-3">
        		<label for="email">Votre Email<span class="required">*</span></label>
        		<input type="email" id="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
			</div>
      		<div class="form-group mb-3">
        		<label for="password">Mot de passe<span class="required">*</span></label>
        		<input type="password" id="password" name="password" class="form-control" aria-describedby="emailHelp" placeholder="Mot de passe" required="" pattern="^(?=.*\d)(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}$" title="Le mot de passe doit comporter au moins 8 caractères dont au moins 1 chiffre, 1 minuscule, 1 majuscule et 1 caractères spécial">
			</div>
			<div class="form-group mb-3">
				<label for="password_conf">Confirmation de mot de passe<span class="required">*</span></label>
				<input type="password" id="password_conf" name="password_conf" class="form-control" aria-describedby="emailHelp" placeholder="Mot de passe" required="">
			</div>
			<div class="mb-3">
				<input type="file" name="avatar[]" accept="image/*" multiple>
			</div>
			<button type="submit" class="btn btn-primary mb-3">Inscription</button>
		</form>
	</div>

  <hr>

<!-- LOGIN -->
	<div class="login" action="">
		<form method="POST">
			<input type="hidden" name="action" value="login">
			<div class="form-group mb-3">
				<label for="email">Email</label>
				<input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" required="">
			</div>
			<div class="form-group mb-3">
				<label for="password">Mot de passe</label>
				<input type="password" id="password" name="password" class="form-control" aria-describedby="emailHelp" placeholder="Mot de passe" required="">
			</div>		
			<button type="submit" class="btn btn-primary">Login</button>
			<a href="index.php?p=forgot">Mot de passe oublié ?</a> 
		</form>
	</div>
</div>







   

    

     
  


    

      

      