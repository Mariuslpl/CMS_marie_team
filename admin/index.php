<?php

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
// les deux point sont pour amener vers le ROOT folder
require '../includes/init.php';

?>



<!-- REQUIRE DU HEADER -->
<?php require '../includes/header.php'; ?>



<!-- lien de déconnexion -->
<a href="../logout.php">Se déconneter</a>

<h1>Page d'admin</h1>

    <!-- set de boutton pour load les différentes tables -->
    <div class="container">
        <button id="get_port" type="button" name="button">Ports</button>
        <button id="get_secteur" type="button" name="button">Secteurs</button>
        <button id="get_liaison" type="button" name="button">Liaisons</button>
        <button id="get_traversee" type="button" name="button">Traversées</button>
        <button id="get_bateau" type="button" name="button">Bateaux</button>
        <button id="get_categorie" type="button" name="button">Catégories</button>
        <button id="get_type" type="button" name="button">Types</button>
        <button id="get_reservation" type="button" name="button">Réservations</button>
        <button id="get_periode" type="button" name="button">Périodes</button>
        <button id="get_contenir" type="button" name="button">Contenir</button>
        <button id="get_enregistre" type="button" name="button">Enregistrements</button>
        <button id="get_tarif" type="button" name="button">Tarifs</button>
    </div>

    <!-- Tableau de données => rechargement à chaque click button -->
    <div class="container">
        <br>
        <!-- ADD button -->
        <div id="add_button" align="right" style="margin-bottom:5px;">

        </div>

        <!-- Data TABLE -->
        <div id="admin_data" class="table-responsive">

        </div>
    </div>



<!-- REQUIRE DU FOOTER -->
<?php require '../includes/footer.php'; ?>