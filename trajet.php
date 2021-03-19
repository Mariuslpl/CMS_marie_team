<?php 

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
require 'includes/init.php';

//Varibale qui récupére la connexion à la DATABASE
$conn = require 'includes/db.php';

 ?>



<!-- REQUIRE DU HEADER -->
 <?php require 'includes/header.php' ?>




<h1>Decouvrez nos trajets et nos tarifs</h1>



<div class="container">
    <br>
    <!-- Data TABLE -->
    <div id="table_trajet" class="table-responsive">

    </div>
</div>


<!-- REQUIRE DU FOOTER -->
<?php require 'includes/footer.php' ?>