<?php

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
require 'includes/init.php';

//Varibale qui récupére la connexion à la DATABASE
$conn = require 'includes/db.php';

 ?>



<!-- REQUIRE DU HEADER -->
 <?php require 'includes/header.php' ?>



<!-- TODO Index à l'acceuil sans connexion USER / ADMIN -->




 <!-- REQUIRE DU FOOTER -->
  <?php require 'includes/footer.php' ?>
