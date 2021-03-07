<?php 

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
require 'includes/init.php';

//Varibale qui récupére la connexion à la DATABASE
$conn = require 'includes/db.php';

 ?>



<!-- REQUIRE DU HEADER -->
 <?php require 'includes/header.php' ?>




<h1>Page de Réservations</h1>

<div>
    Séléctionner un secteur : 
    <div id="btn_secteur">
    
    </div>
</div>


<div>
    <!-- DROPDOWN liaison-->
    <div id="drop_resa_liaison" style="width: 90%;">
    
    </div>
</div>


<div style="width: 90%;">  
    <label for="date_traversee">Date souhaitée :</label>
    <input type="date" id="date_traversee" name="date_traversee">
</div>


<div>
    <button id="aff_resa_traversee">Afficher les traversées</button>
</div>


<div id="table_resa">
    
</div>


<!-- ************************************************ La MODALE RESERVATION utilisateur -->
<div class="modal fade" id="modale_resa">
    <div class="modal-dialog">
        <div class="modal-content">

            <form id="modale_resa_contenu" method="post">
                <!-- MODAL HEADER -->
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">X</button>
                </div>

                <!-- MODAL BODY -->
                <div class="modal-body">
                    <div style="width: 90%;">    
                        <label>Nom de la réservation :</label>
                        <input id="nom" type="text" name="nom">
                    </div>

                    <div style="width: 90%;">  
                        <label>Adresse :</label>
                        <input id="adresse" type="text" name="adresse">
                    </div>
                    
                    <div style="width: 90%;">  
                        <label>Code Postal :</label>
                        <input id="cp" type="text" name="cp">
                    </div>

                    <div style="width: 90%;">  
                        <label>Ville :</label>
                        <input id="ville" type="text" name="ville">
                    </div>

                    <!-- Détails des places à reserver -->
                    <div>
                        <h5>Séléction des places nécessaires :</h5>
                        <h6>Passager</h6>
                        <div>
                            <label>Adultes :</label>
                            <input id="A1" type="number" name="A1" value="0">                       
                        </div>
                        <div>
                            <label>Junior 8-18 ans :</label>
                            <input id="A2" type="number" name="A2" value="0">                       
                        </div>
                        <div>
                            <label>Enfant 0-7 ans :</label>
                            <input id="A3" type="number" name="A3" value="0">                       
                        </div>

                        <h6>Véhicule</h6>
                        <div>
                            <label>Voiture inf 4m :</label>
                            <input id="B1" type="number" name="B1" value="0">                       
                        </div>
                        <div>
                            <label>Voiture inf 5m :</label>
                            <input id="B2" type="number" name="B2" value="0">                       
                        </div>
                        <div>
                            <label>Fourgon :</label>
                            <input id="C1" type="number" name="C1" value="0">                       
                        </div>
                        <div>
                            <label>Camping-car :</label>
                            <input id="C2" type="number" name="C2" value="0">                       
                        </div>
                        <div>
                            <label>Camion :</label>
                            <input id="C3" type="number" name="C3" value="0">                       
                        </div>
                    </div>

                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer">
                    <button id="btn_add_resa" type="submit" class="btn btn-primary" data-dismiss="modal">Valider la réservation</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>

                <!-- REQUETE ENVOYEE -->
                <input id="request_php_resa" type="hidden" name="action_php">

                <!-- HIDDEN ID -->
                <input id="hidden_id_resa" type="hidden" name="hidden_id_resa">                    
            </form>
        </div>
    </div>
</div>

<!-- Modale confirmation RESERVATION-->
<div class="modal fade" id="message_bdd_resa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="message_modale_resa">
            </div>
            <div class="modal-footer" id="btn_conf_resa">
                <!-- <button id="btn_delete_resa" type="submit" class="btn btn-danger" data-dismiss="modal">Supprimer</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button> -->
            </div>
        </div>
    </div>
</div>

<!-- REQUIRE DU FOOTER -->
<?php require 'includes/footer.php' ?>
