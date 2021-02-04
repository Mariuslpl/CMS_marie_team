<?php

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
require 'includes/init.php';

?>



<!-- REQUIRE DU HEADER -->
<?php require 'includes/header.php'; ?>



<!-- lien de retour vers la page d'acceuil -->
<a href="index.php">Acceuil</a>

<h1>Page de connexion</h1>



<!-- formulaire de connexion -->
<div id="container">
    <!-- utilise la méthode POST -->
    <form method="POST">
        <h1>Connexion</h1>

        <!-- champ du nom d'utilisateur -->
        <label for="username"><b>Nom d'utilisateur</b></label>
        <input id="username" type="text" placeholder="Entrer le nom d'utilisateur" name="username">

        <!-- champ du mot de passe -->
        <label for="password"><b>Mot de passe</b></label>
        <input id="password" type="text" placeholder="Entrer le mot de passe" name="password">

        <input id="submit" type="submit" value="Se Connecter">

        <!-- lien vers la page d'inscription -->
        <a href="inscription.php">Pas encore inscrit?</a>
    </form>
</div>



<!-- REQUIRE DU FOOTER -->
<?php require 'includes/footer.php'; ?>