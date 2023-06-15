<?php include '../common/header.php'; ?>

    <div class='row'>
        <div class='jumbotron bg-light m-2 p-2'>
            <h1 class='display-4'>Backoffice</h1>
            <p class='lead'>Ici vous pouvez gérer l'administration du site Petites Annonces!</p>
            <hr class='my-4'>
            <p>Cliquer sur un des boutons ci-dessous pour obtenir une liste des membres ou des types d'abos</p>
            <p class='lead'>
                <a class='btn btn-primary btn-lg' href='categories.php' role='button'>Categories</a>
                <a class='btn btn-primary btn-lg' href='etats.php' role='button'>Etats</a>
                <a class='btn btn-primary btn-lg' href='annonces.php' role='button'>Annonces</a>
                <a class='btn btn-primary btn-lg' href='membres.php' role='button'>Members</a>
            </p>
        </div>
    </div>

   
<?php require_once '../common/footer.php' ?>