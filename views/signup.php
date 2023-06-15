<div class="main">  	
	<!-- <input type="checkbox" id="chk" aria-hidden="true"> -->
	<div class="signup">
		<form method="POST" action="" enctype="multipart/form-data">
			<!-- views/signup_traitement.php -->
			<!-- <label for="chk" aria-hidden="true">Enregistrement</label>  -->
			<input type="hidden" name="action" value="signup"> <!-- index.php signup switch pour pages -->
			<div>
				<label for="name">Votre nom<span class="required">*</span></label>
				<input type="text" id="name" name="nom" placeholder="Nom" minlength=2 maxlength=25 autocomplete required="*">
			</div>
			<div>
				<label for="prenom">Votre prénom<span class="required">*</span></label>
				<input type="text" id="prenom" name="prenom" placeholder="Prénom" minlength=2 maxlength=25 autocomplete required="*">
			</div>
			<div>
				<label for="username">Pseudo<span class="required">*</span></label>
				<input type="text" id="username" name="username" placeholder="Pseudo" maxlength=25 autocomplete required="*">
			</div>
			<div>
				<label for="naissance">Date de naissance<span class="required">*</span></label>
				<input type="date" id="naissance" name="naissance" placeholder="Date de naissance" min="1900" max="2000" autocomplete required="*">
			</div>
				<label for="telephone">Votre téléphone<span class="required">*</span></label>	
				<input type="number" id="telephone" name="telephone" placeholder="Téléphone" autocomplete required="*">
			</div>
			<div>
				<label for="adresse">Adresse<span class="required">*</span></label>
				<input type="text" id="adresse" name="adresse" placeholder="Adresse" autocomplete required="*">
			</div>
			<div>
				<label for="cp">Code postale<span class="required">*</span></label>
				<input type="number" id="cp" name="cp" placeholder="Code Postal" autocomplete required="*">
			</div>
			<div>
				<label for="city">Ville<span class="required">*</span></label>
				<input type="text" id="city" name="city" placeholder="Ville" autocomplete required="*">
			</div>
			<div>
				<label for="email">Votre Email<span class="required">*</span></label>
				<input type="email" id="email" name="email" placeholder="Email" required="">
			</div>
			<div>
				<label for="password">Mot de passe<span class="required">*</span></label>
				<input type="password" id="password" name="password" placeholder="Mot de passe" required="" pattern="^(?=.*\d)(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}$" title="Le mot de passe doit comporter au moins 8 caractères dont au moins 1 chiffre, 1 minuscule, 1 majuscule et 1 caractères spécial"> <!-- //message si mdp n'est pas OK -->
			</div>
			<div>
				<label for="password_conf">Mot de passe<span class="required">*</span></label>
				<input type="password" id="password_conf" name="password_conf" placeholder="Confirmation du mot de passe" required="">
			</div>
			<div>
				<input type="file" name="avatar[]" accept="image/*" multiple>
			</div>
			
			<button>Inscription</button>
		</form>
	</div>

	<div class="login" action="">
		<form method="POST">
			<!-- <label for="chk" aria-hidden="true">Login</label> --> <!-- pour savoir ce qu'il est traiter -->
			<input type="hidden" name="action" value="login"> <!-- LOGIN -->
			<div>
				<input type="email" name="email" placeholder="Email" required="">
			</div>
			<div>
				<input type="password" name="password" placeholder="Mot de passe" required="">
			</div>
			<button>Login</button>
			<a href="?p=forgot">Mot de passe oublié ?</a> <!-- mdp oublié paramétre d'url p ?P=FORGOT -->
			<!-- LIEN mdp oublie -->
		</form>
	</div>
</div>