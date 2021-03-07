<?php 

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
require 'includes/init.php';

//Varibale qui récupére la connexion à la DATABASE
$conn = require 'includes/db.php';

if(isset($_SESSION["id"]) && isset($_SESSION["user_name"])) {
    $test_id = $_SESSION["id"];
    $test_username = $_SESSION["user_name"];
}

 ?>



<!-- REQUIRE DU HEADER -->
 <?php require 'includes/header.php' ?>




<h1>Page d'acceuil</h1>

<?php if (!empty($test_id)): ?>
    <p>Bienvenu utilisateur n° : <?= $test_id ?></p>
    <p>Bienvenu <?= $test_username ?></p>
<?php endif; ?>

<!-- REQUIRE DU FOOTER -->
<?php require 'includes/footer.php' ?>
