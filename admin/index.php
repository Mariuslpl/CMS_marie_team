<?php

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
// les deux point sont pour amener vers le ROOT folder
require '../includes/init.php';

?>



<!-- REQUIRE DU HEADER -->
<?php require '../includes/header.php'; ?>




<h1>Page d'admin</h1>

    <!-- set de boutton pour load les différentes tables -->
    <div class="container">
        <button id="get_all_port" type="button" name="button">Ports</button>
        <button id="get_all_secteur" type="button" name="button">Secteurs</button>
        <button id="get_all_liaison" type="button" name="button">Liaisons</button>    
        <button id="get_all_traversee" type="button" name="button">Traversées</button>
        <button id="get_all_bateau" type="button" name="button">Bateaux</button>
        <button id="get_all_categorie" type="button" name="button">Catégories</button>
        <button id="get_all_type" type="button" name="button">Types</button>
        <button id="get_all_reservation" type="button" name="button">Réservations</button>
        <button id="get_all_periode" type="button" name="button">Périodes</button>
        <button id="get_all_contenir" type="button" name="button">Contenir</button>
        <button id="get_all_enregistre" type="button" name="button">Enregistrements</button>
        <button id="get_all_tarif" type="button" name="button">Tarifs</button>
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

    <!-- ************************************************ La MODALE LIAISON -->
    <div class="modal fade" id="modale_liaison">
        <div class="modal-dialog">
            <div class="modal-content">

                <form id="modale_liaison_contenu" method="post">
                    <!-- MODAL HEADER -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>
                    </div>

                    <!-- MODAL BODY -->
                    <div class="modal-body">
                        <div style="width: 90%;">    
                            <label>Enter le code de la liaison :</label>
                            <input id="code_liaison" type="text" name="code_liaison">
                        </div>

                        <div style="width: 90%;">  
                            <label>Distance de la liaison :</label>
                            <input id="distance" type="text" name="distance">
                        </div>

                        <!-- new drop down test -->
                        <div id="drop_add_liaison" style="width: 90%;">
                        
                        </div>

                    </div>

                    <!-- MODAL FOOTER -->
                    <div class="modal-footer">
                        <button id="btn_add_liaison" type="submit" class="btn btn-primary" data-dismiss="modal">Ajouter</button>
                        <button id="btn_update_liaison" type="submit" class="btn btn-primary" data-dismiss="modal">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>

                    <!-- REQUETE ENVOYEE -->
                    <input id="request_php_liaison" type="hidden" name="action_php">

                    <!-- HIDDEN ID -->
                    <input id="hidden_id_liaison" type="hidden" name="hidden_id_liaison">                    
                </form>

            </div>
        </div>
    </div>

    <!-- ************************************************ La MODALE TRAVERSEE -->
    <div class="modal fade" id="modale_traversee">
        <div class="modal-dialog">
            <div class="modal-content">

                <form id="modale_traversee_contenu" method="post">
                    <!-- MODAL HEADER -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>
                    </div>

                    <!-- MODAL BODY -->
                    <div class="modal-body">
                        <div style="width: 90%;">    
                            <label>Enter le numéro de la traversée :</label>
                            <input id="num_traversee" type="text" name="num_traversee">
                        </div>

                        <div style="width: 90%;">  
                            <label for="date_traversee">Date de la traversée :</label>
                            <input type="date" id="date_traversee" name="date_traversee">
                        </div>

                        <div style="width: 90%;">  
                            <label for="heure_traversee">Heure de la traversée :</label>
                            <input type="time" id="heure_traversee" name="heure_traversee">
                        </div>

                        <!-- DROPDOWN traversée-->
                        <div id="drop_add_traversee" style="width: 90%;">
                        
                        </div>

                    </div>

                    <!-- MODAL FOOTER -->
                    <div class="modal-footer">
                        <button id="btn_add_traversee" type="submit" class="btn btn-primary" data-dismiss="modal">Ajouter</button>
                        <button id="btn_update_traversee" type="submit" class="btn btn-primary" data-dismiss="modal">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>

                    <!-- REQUETE ENVOYEE -->
                    <input id="request_php_traversee" type="hidden" name="action_php">

                    <!-- HIDDEN ID -->
                    <input id="hidden_id_traversee" type="hidden" name="hidden_id_traversee">                    
                </form>

            </div>
        </div>
    </div>

    <!-- ************************************************ La MODALE BATEAU -->
    <div class="modal fade" id="modale_bateau">
        <div class="modal-dialog">
            <div class="modal-content">

                <form id="modale_bateau_contenu" method="post">
                    <!-- MODAL HEADER -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>
                    </div>

                    <!-- MODAL BODY -->
                    <div class="modal-body">
                        <label>Enter le nom du bateau :</label>
                        <input id="nom_bateau" type="text" name="nom_bateau">
                    </div>

                    <!-- MODAL FOOTER -->
                    <div class="modal-footer">
                        <button id="btn_add_bateau" type="submit" class="btn btn-primary" data-dismiss="modal">Ajouter</button>
                        <button id="btn_update_bateau" type="submit" class="btn btn-primary" data-dismiss="modal">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>

                    <!-- REQUETE ENVOYEE -->
                    <input id="request_php_bateau" type="hidden" name="action_php">

                    <!-- HIDDEN ID -->
                    <input id="hidden_id_bateau" type="hidden" name="hidden_id_bateau">                    
                </form>

            </div>
        </div>
    </div>

    <!-- ************************************************ La MODALE CATEGORIE -->
    <div class="modal fade" id="modale_categorie">
        <div class="modal-dialog">
            <div class="modal-content">

                <form id="modale_categorie_contenu" method="post">
                    <!-- MODAL HEADER -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>
                    </div>

                    <!-- MODAL BODY -->
                    <div class="modal-body">
                        <div style="width: 90%;">    
                            <label>Enter la lettre de catégorie :</label>
                            <input id="lettre_categorie" type="text" name="lettre_categorie">
                        </div>

                        <div style="width: 90%;">  
                            <label>Description de la catégorie :</label>
                            <input id="libelle_categorie" type="text" name="libelle_categorie">
                        </div>
                    </div>

                    <!-- MODAL FOOTER -->
                    <div class="modal-footer">
                        <button id="btn_add_categorie" type="submit" class="btn btn-primary" data-dismiss="modal">Ajouter</button>
                        <button id="btn_update_categorie" type="submit" class="btn btn-primary" data-dismiss="modal">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>

                    <!-- REQUETE ENVOYEE -->
                    <input id="request_php_categorie" type="hidden" name="action_php">

                    <!-- HIDDEN ID -->
                    <input id="hidden_id_categorie" type="hidden" name="hidden_id_categorie">                    
                </form>

            </div>
        </div>
    </div>

    <!-- ************************************************ La MODALE TYPE -->
    <div class="modal fade" id="modale_type">
        <div class="modal-dialog">
            <div class="modal-content">

                <form id="modale_type_contenu" method="post">
                    <!-- MODAL HEADER -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>
                    </div>

                    <!-- MODAL BODY -->
                    <div class="modal-body">
                        <div style="width: 90%;">    
                            <label>Enter le numéro du type :</label>
                            <input id="num_type" type="text" name="num_type">
                        </div>

                        <div style="width: 90%;">  
                            <label>Description du type:</label>
                            <input id="libelle_type" type="text" name="libelle_type">
                        </div>
                        
                        <!-- DROPDOWN type -->
                        <div id="drop_add_type" style="width: 90%;">

                        </div>
                    </div>

                    <!-- MODAL FOOTER -->
                    <div class="modal-footer">
                        <button id="btn_add_type" type="submit" class="btn btn-primary" data-dismiss="modal">Ajouter</button>
                        <button id="btn_update_type" type="submit" class="btn btn-primary" data-dismiss="modal">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>

                    <!-- REQUETE ENVOYEE -->
                    <input id="request_php_type" type="hidden" name="action_php">

                    <!-- HIDDEN ID -->
                    <input id="hidden_id_type" type="hidden" name="hidden_id_type">                    
                </form>

            </div>
        </div>
    </div>

    <!-- ************************************************ La MODALE RESERVATION -->
    <div class="modal fade" id="modale_reservation">
        <div class="modal-dialog">
            <div class="modal-content">

                <form id="modale_reservation_contenu" method="post">
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
                        <!-- DROPDOWN réservation -->
                        <div id="drop_add_reservation" style="width: 90%;">

                        </div>
                    </div>

                    <!-- MODAL FOOTER -->
                    <div class="modal-footer">
                        <button id="btn_add_reservation" type="submit" class="btn btn-primary" data-dismiss="modal">Ajouter</button>
                        <button id="btn_update_reservation" type="submit" class="btn btn-primary" data-dismiss="modal">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>

                    <!-- REQUETE ENVOYEE -->
                    <input id="request_php_reservation" type="hidden" name="action_php">

                    <!-- HIDDEN ID -->
                    <input id="hidden_id_reservation" type="hidden" name="hidden_id_reservation">                    
                </form>

            </div>
        </div>
    </div>

    <!-- ************************************************ La MODALE PERIODE -->
    <div class="modal fade" id="modale_periode">
        <div class="modal-dialog">
            <div class="modal-content">

                <form id="modale_periode_contenu" method="post">
                    <!-- MODAL HEADER -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>
                    </div>

                    <!-- MODAL BODY -->
                    <div class="modal-body">

                        <div style="width: 90%;">  
                            <label for="date_deb_periode">Date début de période :</label>
                            <input type="date" id="date_deb_periode" name="date_deb_periode">
                        </div>

                        <div style="width: 90%;">  
                            <label for="date_fin_periode">Date fin de période :</label>
                            <input type="date" id="date_fin_periode" name="date_fin_periode">
                        </div>

                    </div>

                    <!-- MODAL FOOTER -->
                    <div class="modal-footer">
                        <button id="btn_add_periode" type="submit" class="btn btn-primary" data-dismiss="modal">Ajouter</button>
                        <button id="btn_update_periode" type="submit" class="btn btn-primary" data-dismiss="modal">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>

                    <!-- REQUETE ENVOYEE -->
                    <input id="request_php_periode" type="hidden" name="action_php">

                    <!-- HIDDEN ID -->
                    <input id="hidden_id_periode" type="hidden" name="hidden_id_periode">                    
                </form>

            </div>
        </div>
    </div>

    <!-- ************************************************ La MODALE CONTENIR -->
    <div class="modal fade" id="modale_contenir">
        <div class="modal-dialog">
            <div class="modal-content">

                <form id="modale_contenir_contenu" method="post">
                    <!-- MODAL HEADER -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>
                    </div>

                    <!-- MODAL BODY -->
                    <div class="modal-body">
                        <!-- DROPDOWN contenir-->
                        <div id="drop_add_contenir" style="width: 90%;">
                        
                        </div>
                        
                        <div style="width: 90%;">    
                            <label>Capacité pour cette catégorie :</label>
                            <input id="capacite" type="text" name="capacite">
                        </div>
                    </div>

                    <!-- MODAL FOOTER -->
                    <div class="modal-footer">
                        <button id="btn_add_contenir" type="submit" class="btn btn-primary" data-dismiss="modal">Ajouter</button>
                        <button id="btn_update_contenir" type="submit" class="btn btn-primary" data-dismiss="modal">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>

                    <!-- REQUETE ENVOYEE -->
                    <input id="request_php_contenir" type="hidden" name="action_php">

                    <!-- HIDDEN ID -->
                    <input id="hidden_id_contenir" type="hidden" name="hidden_id_contenir"> 
                    <!-- HIDDEN LETTRE -->
                    <input id="hidden_lettre_contenir" type="hidden" name="hidden_lettre_contenir">                      
                </form>

            </div>
        </div>
    </div>

    <!-- ************************************************ La MODALE TARIF -->
    <div class="modal fade" id="modale_tarif">
        <div class="modal-dialog">
            <div class="modal-content">

                <form id="modale_tarif_contenu" method="post">
                    <!-- MODAL HEADER -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>
                    </div>

                    <!-- MODAL BODY -->
                    <div class="modal-body">
                        <!-- DROPDOWN tarif-->
                        <div id="drop_add_tarif" style="width: 90%;">
                        
                        </div>
                        
                        <div style="width: 90%;">    
                            <label>Tarif appliqué :</label>
                            <input id="tarif" name="tarif" type="number" step="0.01" value="50.00">
                        </div>
                    </div>

                    <!-- MODAL FOOTER -->
                    <div class="modal-footer">
                        <button id="btn_add_tarif" type="submit" class="btn btn-primary" data-dismiss="modal">Ajouter</button>
                        <button id="btn_update_tarif" type="submit" class="btn btn-primary" data-dismiss="modal">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>

                    <!-- REQUETE ENVOYEE -->
                    <input id="request_php_tarif" type="hidden" name="action_php">

                    <!-- HIDDEN ID -> date début tarif -->
                    <input id="hidden_id_tarif" type="hidden" name="hidden_id_tarif"> 
                    <!-- HIDDEN CODE LIAISON -->
                    <input id="hidden_cdeliai_tarif" type="hidden" name="hidden_cdeliai_tarif">                      
                    <!-- HIDDEN TYPE -->
                    <input id="hidden_type_tarif" type="hidden" name="hidden_type_tarif">                      
                </form>

            </div>
        </div>
    </div>

    <!-- ************************************************ La MODALE ENREGISTRE -->
    <div class="modal fade" id="modale_enregistre">
        <div class="modal-dialog">
            <div class="modal-content">

                <form id="modale_enregistre_contenu" method="post">
                    <!-- MODAL HEADER -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">X</button>
                    </div>

                    <!-- MODAL BODY -->
                    <div class="modal-body">
                        <!-- DROPDOWN enregistre-->
                        <div id="drop_add_enregistre" style="width: 90%;">
                        
                        </div>
                        
                        <div style="width: 90%;">    
                            <label>Quantité de l'enregistrement :</label>
                            <input id="quantite" type="number" name="quantite">
                        </div>
                    </div>

                    <!-- MODAL FOOTER -->
                    <div class="modal-footer">
                        <button id="btn_add_enregistre" type="submit" class="btn btn-primary" data-dismiss="modal">Ajouter</button>
                        <button id="btn_update_enregistre" type="submit" class="btn btn-primary" data-dismiss="modal">Modifier</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>

                    <!-- REQUETE ENVOYEE -->
                    <input id="request_php_enregistre" type="hidden" name="action_php">

                    <!-- HIDDEN ID -> date début enregistre -->
                    <input id="hidden_id_enregistre" type="hidden" name="hidden_id_enregistre">                   
                    <!-- HIDDEN TYPE -->
                    <input id="hidden_type_enregistre" type="hidden" name="hidden_type_enregistre">                      
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

    <!-- Modale message BDD // confirmation suppression LIAISON-->
    <div class="modal fade" id="message_bdd_liaison">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="message_modale_liaison">
                </div>
                <div class="modal-footer" id="btn_conf_liaison">
                    <button id="btn_delete_liaison" type="submit" class="btn btn-danger" data-dismiss="modal">Supprimer</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale message BDD // confirmation suppression TRAVERSEE-->
    <div class="modal fade" id="message_bdd_traversee">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="message_modale_traversee">
                </div>
                <div class="modal-footer" id="btn_conf_traversee">
                    <button id="btn_delete_traversee" type="submit" class="btn btn-danger" data-dismiss="modal">Supprimer</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale message BDD // confirmation suppression BATEAU-->
    <div class="modal fade" id="message_bdd_bateau">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="message_modale_bateau">
                </div>
                <div class="modal-footer" id="btn_conf_bateau">
                    <button id="btn_delete_bateau" type="submit" class="btn btn-danger" data-dismiss="modal">Supprimer</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale message BDD // confirmation suppression CATEGORIE-->
    <div class="modal fade" id="message_bdd_categorie">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="message_modale_categorie">
                </div>
                <div class="modal-footer" id="btn_conf_categorie">
                    <button id="btn_delete_categorie" type="submit" class="btn btn-danger" data-dismiss="modal">Supprimer</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale message BDD // confirmation suppression TYPE-->
    <div class="modal fade" id="message_bdd_type">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="message_modale_type">
                </div>
                <div class="modal-footer" id="btn_conf_type">
                    <button id="btn_delete_type" type="submit" class="btn btn-danger" data-dismiss="modal">Supprimer</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale message BDD // confirmation suppression RESERVATIONS-->
    <div class="modal fade" id="message_bdd_reservation">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="message_modale_reservation">
                </div>
                <div class="modal-footer" id="btn_conf_reservation">
                    <button id="btn_delete_reservation" type="submit" class="btn btn-danger" data-dismiss="modal">Supprimer</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale message BDD // confirmation suppression PERIODE-->
    <div class="modal fade" id="message_bdd_periode">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="message_modale_periode">
                </div>
                <div class="modal-footer" id="btn_conf_periode">
                    <button id="btn_delete_periode" type="submit" class="btn btn-danger" data-dismiss="modal">Supprimer</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale message BDD // confirmation suppression CONTENIR-->
    <div class="modal fade" id="message_bdd_contenir">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="message_modale_contenir">
                </div>
                <div class="modal-footer" id="btn_conf_contenir">
                    <button id="btn_delete_contenir" type="submit" class="btn btn-danger" data-dismiss="modal">Supprimer</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale message BDD // confirmation suppression TARIF-->
    <div class="modal fade" id="message_bdd_tarif">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="message_modale_tarif">
                </div>
                <div class="modal-footer" id="btn_conf_tarif">
                    <button id="btn_delete_tarif" type="submit" class="btn btn-danger" data-dismiss="modal">Supprimer</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale message BDD // confirmation suppression ENREGISTRE-->
    <div class="modal fade" id="message_bdd_enregistre">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="message_modale_enregistre">
                </div>
                <div class="modal-footer" id="btn_conf_enregistre">
                    <button id="btn_delete_enregistre" type="submit" class="btn btn-danger" data-dismiss="modal">Supprimer</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>


<!-- REQUIRE DU FOOTER -->
<?php require '../includes/footer.php'; ?>