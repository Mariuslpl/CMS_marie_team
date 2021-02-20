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
        <button id="get_all_port" type="button" name="button">Ports</button>
        <button id="get_all_secteur" type="button" name="button">Secteurs</button>

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
        <div id="table_data" class="table-responsive">

        </div>
    </div>

    <!-- ************************************************ La MODALE PORT -->
    <div class="modal fade" id="modale_port">
        <div class="modal-dialog">
            <div class="modal-content">

                <form id="modale_port_contenu" method="post">
                    <!-- MODAL HEADER -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>
                    </div>

                    <!-- MODAL BODY -->
                    <div class="modal-body">
                        <label>Enter le nom du port :</label>
                        <input id="nom_port" type="text" name="nom_port">
                    </div>

                    <!-- MODAL FOOTER -->
                    <div class="modal-footer">
                        <button id="btn_add_port" type="submit" class="btn btn-primary" data-dismiss="modal">Ajouter</button>
                        <button id="btn_update_port" type="submit" class="btn btn-primary" data-dismiss="modal">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>

                    <!-- REQUETE ENVOYEE -->
                    <input id="request_php_port" type="hidden" name="action_php">

                    <!-- HIDDEN ID -->
                    <input id="hidden_id_port" type="hidden" name="hidden_id_port">                    
                </form>

            </div>
        </div>
    </div>

    <!-- ************************************************ La MODALE SECTEUR -->
    <div class="modal fade" id="modale_secteur">
        <div class="modal-dialog">
            <div class="modal-content">

                <form id="modale_secteur_contenu" method="post">
                    <!-- MODAL HEADER -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>
                    </div>

                    <!-- MODAL BODY -->
                    <div class="modal-body">
                        <label>Enter le nom du secteur :</label>
                        <input id="nom_secteur" type="text" name="nom_secteur">
                    </div>

                    <!-- MODAL FOOTER -->
                    <div class="modal-footer">
                        <button id="btn_add_secteur" type="submit" class="btn btn-primary" data-dismiss="modal">Ajouter</button>
                        <button id="btn_update_secteur" type="submit" class="btn btn-primary" data-dismiss="modal">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>

                    <!-- REQUETE ENVOYEE -->
                    <input id="request_php_secteur" type="hidden" name="action_php">

                    <!-- HIDDEN ID -->
                    <input id="hidden_id_secteur" type="hidden" name="hidden_id_secteur">                    
                </form>

            </div>
        </div>
    </div>


    <!-- Modale message BDD // confirmation suppression PORT-->
    <div class="modal fade" id="message_bdd_port">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="message_modale_port">
                </div>
                <div class="modal-footer" id="btn_conf_port">
                    <button id="btn_delete_port" type="submit" class="btn btn-danger" data-dismiss="modal">Supprimer</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale message BDD // confirmation suppression SECTEUR-->
    <div class="modal fade" id="message_bdd_secteur">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="message_modale_secteur">
                </div>
                <div class="modal-footer" id="btn_conf_secteur">
                    <button id="btn_delete_secteur" type="submit" class="btn btn-danger" data-dismiss="modal">Supprimer</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>



<!-- REQUIRE DU FOOTER -->
<?php require '../includes/footer.php'; ?>