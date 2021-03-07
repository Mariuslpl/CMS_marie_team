<?php

require 'includes/init.php';


//on crée un nouvel objet User
$nouvelUser = new User();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // on attribue à $conn la connexion de BDD
    $conn = require 'includes/db.php';

    // on va set les attribut de notre nouvel objet User
    $nouvelUser->nom = $_POST['nom'];
    $nouvelUser->prenom = $_POST['prenom'];
    $nouvelUser->adresse = $_POST['adresse'];
    $nouvelUser->cp = $_POST['cp'];
    $nouvelUser->ville = $_POST['ville'];
    $nouvelUser->username = $_POST['username'];

    // on va envoyer un password "hashé" au serveur ==> DEFAULT option, maj permetuelle de l'algo
    $nouvelUser->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //$nouvelUser->password = $_POST['password'];

    //ensuite on va tester le retour TRUE ou FALSE de la fonction creerUser()
    if ($nouvelUser->creerUser($conn)) {
        Url::redirect("/index.php");
    } else {
        echo 'erreur d\'inscription';
    }
}
?>



<!-- REQUIRE DU HEADER -->
<?php require 'includes/header.php'; ?>


<h1>Page d'inscription</h1>


<!-- formulaire d'inscription-->
<div id="container">
    <form method="post">
        <h1>Inscription</h1>

        <!-- nom prénom adresse et mail-->
        <label for="nom"><b>Nom</b></label>
        <input id="nom" type="text" placeholder="Entrer votre nom" name="nom" required>

        <label for="prenom"><b>Prénom</b></label>
        <input id="prenom" type="text" placeholder="Entrer votre prénom" name="prenom" required>

        <label for="adresse"><b>Adresse</b></label>
        <input id="adresse" type="text" placeholder="Entrer votre adresse" name="adresse" required>

        <label for="cp"><b>Code postal</b></label>
        <input id="cp" type="text" placeholder="Code postal" name="cp" required>

        <label for="ville"><b>Ville</b></label>
        <input id="ville" type="text" placeholder="Ville" name="ville" required>

        <!--crédentials -->
        <label for="username"><b>Nom d'utilisateur</b></label>
        <input id="username" type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

        <label for="password"><b>Mot de passe</b></label>
        <input id="password" type="password" placeholder="Entrer le mot de passe" name="password" required>

        <input type="submit" id='submit' value="S'INSCRIRE" >

    </form>
</div>


<!-- REQUIRE DU FOOTER -->
<?php require 'includes/footer.php'; ?>