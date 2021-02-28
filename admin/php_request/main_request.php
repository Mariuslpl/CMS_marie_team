<?php

require '../../includes/init.php';

$conn = require '../../includes/db.php';

if(isset($_POST["action_php"]))
{
    //********************************************************************************************
    // ************************ ALL SQL PORT RELATED **********************************
    //********************************************************************************************
    //********************************* ADD PORT  
    if($_POST["action_php"] == "add_port")
    {
        $query = "INSERT INTO port (nom_port)
                  VALUES ('".$_POST["nom_port"]."')";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>Le port a bien été ajouté !</p>';
    }

    //********************************* GET ONE PORT
    if($_POST["action_php"] == "get_one_port")
    {
        $query = "SELECT *
                  FROM port
                  WHERE id_port = '".$_POST["id"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach($result as $row)
        {
            $output['nom_port'] = $row['nom_port'];
        }
        // ici l'encodege en fichier JSON est à décoder par la page inerte
        echo json_encode($output);
    }
    
    //********************************* UPDATE PORT
    if($_POST["action_php"] == "update_port")
    {
        $query = "UPDATE port
                  SET nom_port = '".$_POST["nom_port"]."'
                  WHERE id_port = '".$_POST["hidden_id_port"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>Le nom du port à été mis à jour !</p>';
    }
    
    //********************************* DELETE PORT
    if($_POST["action_php"] == "delete_port")
    {
        $query = "DELETE FROM port
                  WHERE id_port = '".$_POST["id"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
    }



    //********************************************************************************************
    // ************************ ALL SQL SECTEUR RELATED **********************************
    //********************************************************************************************
    //********************************* ADD SECTEUR
    if($_POST["action_php"] == "add_secteur")
    {
        $query = "INSERT INTO secteur (nom_secteur)
                  VALUES ('".$_POST["nom_secteur"]."')";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>Le secteur a bien été ajouté !</p>';
    }

    //********************************* GET ONE SECTEUR
    if($_POST["action_php"] == "get_one_secteur")
    {
        $query = "SELECT *
                  FROM secteur
                  WHERE id_secteur = '".$_POST["id"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach($result as $row)
        {
            $output['nom_secteur'] = $row['nom_secteur'];
        }
        // ici l'encodege en fichier JSON est à décoder par la page inerte
        echo json_encode($output);
    }
    
    //********************************* UPDATE SECTEUR
    if($_POST["action_php"] == "update_secteur")
    {
        $query = "UPDATE secteur
                  SET nom_secteur = '".$_POST["nom_secteur"]."'
                  WHERE id_secteur = '".$_POST["hidden_id_secteur"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>Le nom du secteur à été mis à jour !</p>';
    }

    //********************************* DELETE SECTEUR
    if($_POST["action_php"] == "delete_secteur")
    {
        $query = "DELETE FROM secteur
                  WHERE id_secteur = '".$_POST["id"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
    }

    //********************************************************************************************
    // ************************ ALL SQL LIAISON RELATED **********************************
    //********************************************************************************************
    // add modale 
    if($_POST["action_php"] == "drop_add_liaison")
    {
        drop_down_liaison($conn, "", "", "");
    }
    
    //********************************* ADD LIAISON
    if($_POST["action_php"] == "add_liaison")
    {
        $query = "INSERT INTO liaison (code_liaison, distance, id_port_depart, id_port_arrivee, id_secteur_concerne)
                  VALUES ('".$_POST["code_liaison"]."', '".$_POST["distance"]."', '".$_POST["drop_port_depart"]."', '".$_POST["drop_port_arrivee"]."', '".$_POST["drop_secteur_concerne"]."')";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>La liaison a bien été ajoutée !</p>';
    }

    //********************************* GET ONE LIAISON
    if($_POST["action_php"] == "get_one_liaison")
    {

        $query = "SELECT * FROM liaison WHERE code_liaison ='".$_POST["id"]."'";    

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
      
        $port_dep = $result['id_port_depart'];
        $port_arr = $result['id_port_arrivee'];
        $secteur = $result['id_secteur_concerne'];
        drop_down_liaison($conn, $port_dep, $port_arr, $secteur);
        
    }

    //********************************* UPDATE LIAISON
    if($_POST["action_php"] == "update_liaison")
    {
        $query = "UPDATE liaison 
                    SET code_liaison = '".$_POST["code_liaison"]."', 
                        distance = '".$_POST["distance"]."', 
                        id_port_depart = '".$_POST["drop_port_depart"]."', 
                        id_port_arrivee = '".$_POST["drop_port_arrivee"]."', 
                        id_secteur_concerne = '".$_POST["drop_secteur_concerne"]."' 
                   WHERE liaison.code_liaison = '".$_POST["hidden_id_liaison"]."'"; 
        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>La liaison à été mise à jour !</p>';
    }

    //********************************* DELETE LIAISON
    if($_POST["action_php"] == "delete_liaison")
    {
        $query = "DELETE FROM liaison
                  WHERE code_liaison = '".$_POST["id"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
    }



    //********************************************************************************************
    // ************************ ALL SQL TRAVERSEE RELATED **********************************
    //********************************************************************************************
    // add modale 
    if($_POST["action_php"] == "drop_add_traversee")
    {
        drop_down_traversee($conn, "", "");
    }  
    //********************************* ADD TRAVERSEE
    if($_POST["action_php"] == "add_traversee")
    {
        $query = "INSERT INTO traversee (num_traversee, date_traversee, 
                                         heure_traversee, code_liaison_realise,
                                         id_bateau_effectue)
                  VALUES ('".$_POST["num_traversee"]."', 
                          '".$_POST["date_traversee"]."', 
                          '".$_POST["heure_traversee"]."', 
                          '".$_POST["drop_code_liaison"]."', 
                          '".$_POST["drop_bateau_effectue"]."')";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>La liaison a bien été ajoutée !</p>';
    }
    //********************************* GET ONE TRAVERSEE
    if($_POST["action_php"] == "get_one_traversee")
    {

        $query = "SELECT * FROM traversee WHERE num_traversee ='".$_POST["id"]."'";    

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
      
        $liaison = $result['code_liaison_realise'];
        $bateau = $result['id_bateau_effectue'];
        drop_down_traversee($conn, $liaison, $bateau);
        
    }
    //********************************* UPDATE TRAVERSEE
    if($_POST["action_php"] == "update_traversee")
    {
        $query = "UPDATE traversee 
                    SET num_traversee = '".$_POST["num_traversee"]."', 
                        date_traversee = '".$_POST["date_traversee"]."', 
                        heure_traversee = '".$_POST["heure_traversee"]."', 
                        code_liaison_realise = '".$_POST["drop_code_liaison"]."', 
                        id_bateau_effectue = '".$_POST["drop_bateau_effectue"]."' 
                   WHERE traversee.num_traversee = '".$_POST["hidden_id_traversee"]."'"; 
        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>La traversée à été mise à jour !</p>';
    }
    //********************************* DELETE TRAVERSEE
    if($_POST["action_php"] == "delete_traversee")
    {
        $query = "DELETE FROM traversee
                  WHERE num_traversee = '".$_POST["id"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
    }



    //********************************************************************************************
    // ************************ ALL SQL BATEAU RELATED **********************************
    //********************************************************************************************
    //********************************* ADD BATEAU
    if($_POST["action_php"] == "add_bateau")
    {
        $query = "INSERT INTO bateau (nom_bateau)
                  VALUES ('".$_POST["nom_bateau"]."')";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>Le bateau a bien été ajouté !</p>';
    }
    //********************************* UPDATE BATEAU
    if($_POST["action_php"] == "update_bateau")
    {
        $query = "UPDATE bateau
                  SET nom_bateau = '".$_POST["nom_bateau"]."'
                  WHERE id_bateau = '".$_POST["hidden_id_bateau"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>Le nom du bateau à été mis à jour !</p>';
    }
    //********************************* DELETE BATEAU
    if($_POST["action_php"] == "delete_bateau")
    {
        $query = "DELETE FROM bateau
                  WHERE id_bateau = '".$_POST["id"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
    }




    //********************************************************************************************
    // ************************ ALL SQL CATEGORIE RELATED **********************************
    //********************************************************************************************
    //********************************* ADD CATEGORIE
    if($_POST["action_php"] == "add_categorie")
    {
        $query = "INSERT INTO categorie (lettre_categorie, libelle_categorie)
                  VALUES ('".$_POST["lettre_categorie"]."', '".$_POST["libelle_categorie"]."')";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>La catégorie a bien été ajoutée !</p>';
    }
    //********************************* UPDATE CATEGORIE
    if($_POST["action_php"] == "update_categorie")
    {
        $query = "UPDATE categorie
                  SET lettre_categorie = '".$_POST["lettre_categorie"]."', 
                      libelle_categorie = '".$_POST["libelle_categorie"]."'
                  WHERE lettre_categorie = '".$_POST["hidden_id_categorie"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>La catégorie à été mise à jour !</p>';
    }
    //********************************* DELETE CATEGORIE
    if($_POST["action_php"] == "delete_categorie")
    {
        $query = "DELETE FROM categorie
                  WHERE lettre_categorie = '".$_POST["id"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
    }



    //********************************************************************************************
    // ************************ ALL SQL TYPE RELATED **********************************
    //********************************************************************************************
    // add modale 
    if($_POST["action_php"] == "drop_add_type")
    {
        drop_down_type($conn, "");
    }  
    //********************************* ADD TYPE
    if($_POST["action_php"] == "add_type")
    {
        $query = "INSERT INTO type (num_type, libelle_type, 
                                    lettre_categorie_classe)
                  VALUES ('".$_POST["num_type"]."', 
                          '".$_POST["libelle_type"]."', 
                          '".$_POST["drop_categorie_classe"]."')";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>Le type a bien été ajouté !</p>';
    }
    //********************************* GET ONE TYPE
    if($_POST["action_php"] == "get_one_type")
    {
        $query = "SELECT * FROM type WHERE num_type ='".$_POST["id"]."'";    

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
      
        $categorie = $result['lettre_categorie_classe'];
        drop_down_type($conn, $categorie);
        
    }
    //********************************* UPDATE TYPE
    if($_POST["action_php"] == "update_type")
    {
        $query = "UPDATE type 
                    SET num_type = '".$_POST["num_type"]."', 
                        libelle_type = '".$_POST["libelle_type"]."', 
                        lettre_categorie_classe = '".$_POST["drop_categorie_classe"]."'
                   WHERE type.num_type = '".$_POST["hidden_id_type"]."'"; 
        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>Le type à été mis à jour !</p>';
    }
    //********************************* DELETE TYPE
    if($_POST["action_php"] == "delete_type")
    {
        $query = "DELETE FROM type
                  WHERE num_type = '".$_POST["id"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
    }



    //********************************************************************************************
    // ************************ ALL SQL RESERVATION RELATED **********************************
    //********************************************************************************************
    // add modale 
    if($_POST["action_php"] == "drop_add_reservation")
    {
        drop_down_reservation($conn, "");
    }  
    //********************************* ADD RESERVATION
    if($_POST["action_php"] == "add_reservation")
    {
        $query = "INSERT INTO reservation (nom, adresse, 
                                          cp, ville,
                                          num_traversee_reserve)
                  VALUES ('".$_POST["nom"]."', 
                          '".$_POST["adresse"]."', 
                          '".$_POST["cp"]."', 
                          '".$_POST["ville"]."', 
                          '".$_POST["drop_traversee_reserve"]."')";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>La réservation a bien été ajoutée !</p>';
    }
    //********************************* GET ONE RESERVATION
    if($_POST["action_php"] == "get_one_reservation")
    {
        $query = "SELECT * FROM reservation WHERE num_reservation ='".$_POST["id"]."'";    

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
      
        $num_trav = $result['num_traversee_reserve'];
        drop_down_reservation($conn, $num_trav);
    }
    //********************************* UPDATE RESERVATION
    if($_POST["action_php"] == "update_reservation")
    {
        $query = "UPDATE reservation 
                    SET nom = '".$_POST["nom"]."', 
                        adresse = '".$_POST["adresse"]."',
                        cp = '".$_POST["cp"]."',
                        ville = '".$_POST["ville"]."', 
                        num_traversee_reserve = '".$_POST["drop_traversee_reserve"]."'
                   WHERE reservation.num_reservation = '".$_POST["hidden_id_reservation"]."'"; 
        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>La réservation à été mise à jour !</p>';
    }
    //********************************* DELETE RESERVATION
    if($_POST["action_php"] == "delete_reservation")
    {
        $query = "DELETE FROM reservation
                  WHERE num_reservation = '".$_POST["id"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
    }


    

    //********************************************************************************************
    // ************************ ALL SQL PERIODE RELATED **********************************
    //********************************************************************************************
    //********************************* ADD PERIODE
    if($_POST["action_php"] == "add_periode")
    {
        $query = "INSERT INTO periode (debut_periode, fin_periode)
                  VALUES ('".$_POST["date_deb_periode"]."', 
                          '".$_POST["date_fin_periode"]."')";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>La période a bien été ajoutée !</p>';
    }
    //********************************* UPDATE PERIODE
    if($_POST["action_php"] == "update_periode")
    {
        $query = "UPDATE periode 
                    SET debut_periode = '".$_POST["date_deb_periode"]."', 
                        fin_periode = '".$_POST["date_fin_periode"]."' 
                   WHERE periode.debut_periode = '".$_POST["hidden_id_periode"]."'"; 
        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>La période à été mise à jour !</p>';
    }
    //********************************* DELETE PERIODE
    if($_POST["action_php"] == "delete_periode")
    {
        $query = "DELETE FROM periode
                  WHERE debut_periode = '".$_POST["id"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
    }



    //********************************************************************************************
    // ************************ ALL SQL CONTENIR RELATED **********************************
    //********************************************************************************************
    // add modale 
    if($_POST["action_php"] == "drop_add_contenir")
    {
        drop_down_contenir($conn, "", "");
    }  
    //********************************* ADD CONTENIR
    if($_POST["action_php"] == "add_contenir")
    {
        $query = "INSERT INTO contenir (id_bateau_contient, lettre_categorie_contient, 
                                         capacite)
                  VALUES ('".$_POST["drop_bateau_contient"]."', 
                          '".$_POST["drop_categorie_contient"]."', 
                          '".$_POST["capacite"]."')";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>La capacité du bateau a bien été ajoutée !</p>';
    }
    //********************************* GET ONE CONTENIR
    if($_POST["action_php"] == "get_one_contenir")
    {

        $id_bat = $_POST["id"];
        $let_cat = $_POST["lettre"];
        drop_down_contenir($conn, $id_bat, $let_cat);
        
    }
    //********************************* UPDATE CONTENIR
    if($_POST["action_php"] == "update_contenir")
    {
        $query = "UPDATE contenir 
                    SET id_bateau_contient = '".$_POST["drop_bateau_contient"]."', 
                        lettre_categorie_contient = '".$_POST["drop_categorie_contient"]."', 
                        capacite = '".$_POST["capacite"]."'
                   WHERE contenir.id_bateau_contient = '".$_POST["hidden_id_contenir"]."' 
                    AND contenir.lettre_categorie_contient = '".$_POST["hidden_lettre_contenir"]."'"; 
        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>La capacité à été mise à jour !</p>';
    }
    //********************************* DELETE CONTENIR
    if($_POST["action_php"] == "delete_contenir")
    {
        $query = "DELETE FROM contenir
                  WHERE id_bateau_contient = '".$_POST["id"]."' 
                  AND lettre_categorie_contient = '".$_POST["lettre"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
    }

    

    //********************************************************************************************
    // ************************ ALL SQL TARIF RELATED **********************************
    //********************************************************************************************
    // add modale 
    if($_POST["action_php"] == "drop_add_tarif")
    {
        drop_down_tarif($conn, "", "", "");
    }
    
    //********************************* ADD TARIF
    if($_POST["action_php"] == "add_tarif")
    {
        $query = "INSERT INTO tarif (debut_periode_tarif, code_liaison_tarif, 
                              num_type_tarif, tarif)
                  VALUES ('".$_POST["drop_periode_tarif"]."', 
                          '".$_POST["drop_cdelia_tarif"]."', 
                          '".$_POST["drop_type_tarif"]."', 
                          '".$_POST["tarif"]."')";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>Le tarif a bien été ajouté !</p>';
    }

    //********************************* GET ONE TARIF
    if($_POST["action_php"] == "get_one_tarif")
    {
        $date_deb_tar = $_POST["id"];
        $cde_liai_tar = $_POST["code"];
        $num_typ_tar = $_POST["num"];
        drop_down_tarif($conn, $date_deb_tar, $cde_liai_tar, $num_typ_tar);
    }

    //********************************* UPDATE TARIF
    if($_POST["action_php"] == "update_tarif")
    {
        $query = "UPDATE tarif 
                    SET debut_periode_tarif = '".$_POST["drop_periode_tarif"]."', 
                        code_liaison_tarif = '".$_POST["drop_cdelia_tarif"]."', 
                        num_type_tarif = '".$_POST["drop_type_tarif"]."', 
                        tarif = '".$_POST["tarif"]."' 
                  WHERE tarif.debut_periode_tarif = '".$_POST["hidden_id_tarif"]."' 
                    AND tarif.code_liaison_tarif = '".$_POST["hidden_cdeliai_tarif"]."'
                    AND tarif.num_type_tarif = '".$_POST["hidden_type_tarif"]."'"; 

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>Le tarif à été mis à jour !</p>';
    }

    //********************************* DELETE TARIF
    if($_POST["action_php"] == "delete_tarif")
    {
        $query = "DELETE FROM tarif
                  WHERE debut_periode_tarif = '".$_POST["id"]."' 
                  AND code_liaison_tarif = '".$_POST["code"]."'
                  AND num_type_tarif = '".$_POST["num"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
    }

    
    
    //********************************************************************************************
    // ************************ ALL SQL ENREGISTRE RELATED **********************************
    //********************************************************************************************
    // add modale 
    if($_POST["action_php"] == "drop_add_enregistre")
    {
        drop_down_enregistre($conn, "", "");
    }  
    //********************************* ADD ENREGISTRE
    if($_POST["action_php"] == "add_enregistre")
    {
        $query = "INSERT INTO enregistre (num_reservation_enregistre, 
                                         num_type_enregistre, 
                                         quantite)
                  VALUES ('".$_POST["drop_resa_enregistre"]."', 
                          '".$_POST["drop_type_enregistre"]."', 
                          '".$_POST["quantite"]."')";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>L\'enregistrement a bien été ajouté !</p>';
    }
    //********************************* GET ONE ENREGISTRE
    if($_POST["action_php"] == "get_one_enregistre")
    {
        $id_enr = $_POST["id"];
        $typ_enr = $_POST["type_enr"];
        drop_down_enregistre($conn, $id_enr, $typ_enr);   
    }
    //********************************* UPDATE ENREGISTRE
    if($_POST["action_php"] == "update_enregistre")
    {
        $query = "UPDATE enregistre 
                    SET num_reservation_enregistre = '".$_POST["drop_resa_enregistre"]."', 
                        num_type_enregistre = '".$_POST["drop_type_enregistre"]."', 
                        quantite = '".$_POST["quantite"]."'
                   WHERE enregistre.num_reservation_enregistre = '".$_POST["hidden_id_enregistre"]."' 
                    AND enregistre.num_type_enregistre = '".$_POST["hidden_type_enregistre"]."'"; 
        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>L\'enregistrement à été mis à jour !</p>';
    }
    //********************************* DELETE ENREGISTRE
    if($_POST["action_php"] == "delete_enregistre")
    {
        $query = "DELETE FROM enregistre
                  WHERE num_reservation_enregistre = '".$_POST["id"]."' 
                  AND num_type_enregistre = '".$_POST["type_enr"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
    }
}



//******************
//DROPDOWN LIAISON
//******************
function drop_down_liaison($conn, $id_port_dep, $id_port_arr, $id_secteur) {

    $sql_port_dep = "SELECT * FROM port";
    $sql_port_dep = $conn->query($sql_port_dep);
    if ($sql_port_dep === false) {
        var_dump($conn->errorInfo());
    } else {
        $les_ports_dep = $sql_port_dep->fetchAll(PDO::FETCH_ASSOC);
    }
    
    $sql_port_arr = "SELECT * FROM port";
    $sql_port_arr = $conn->query($sql_port_arr);
    if ($sql_port_arr === false) {
        var_dump($conn->errorInfo());
    } else {
        $les_ports_arr = $sql_port_arr->fetchAll(PDO::FETCH_ASSOC);
    }
    
    $sql_secteur = "SELECT * FROM secteur";
    $sql_secteur = $conn->query($sql_secteur);
    if ($sql_secteur === false) {
        var_dump($conn->errorInfo());
    } else {
        $les_secteurs = $sql_secteur->fetchAll(PDO::FETCH_ASSOC);
    }

    // dropdown port départ
    $output['drop_down'] = ' <div>        
                    <label>Port de départ :</label>
                        <select onchange="logIdPortDep(value);" name="drop_port_depart" size="1">
                            <option></option> ';
    $tot_ports_dep = $sql_port_dep->rowCount();
    if ($tot_ports_dep > 0) {
        foreach ($les_ports_dep as $port_dep) {
            if($port_dep["id_port"] == $id_port_dep) {
                $output['drop_down'] .= '<option selected value="'.$port_dep["id_port"].'"> '.$port_dep["nom_port"].'</option>';    
            } else {
                $output['drop_down'] .= '<option value="'.$port_dep["id_port"].'"> '.$port_dep["nom_port"].'</option>';
            }
        }
    } else {
        $output['drop_down'] .= '<option>Pas de port enregistré</option>';
    }
    $output['drop_down'] .= ' </select> </div>';

    // dropdown port arrivée
    $output['drop_down'] .= ' <div>         
                    <label>Port d\'arrivée :</label>
                        <select onchange="logIdPortArr(value);" name="drop_port_arrivee" size="1">
                            <option></option>';
    $tot_ports_arr = $sql_port_arr->rowCount();
    if ($tot_ports_arr > 0) {
        foreach ($les_ports_arr as $port_arr) {
            if($port_arr['id_port'] == $id_port_arr) {
                $output['drop_down'] .= '<option selected value="'.$port_arr["id_port"].'"> '.$port_arr["nom_port"].'</option>';    
            } else {
                $output['drop_down'] .= '<option value="'.$port_arr["id_port"].'"> '.$port_arr["nom_port"].'</option>';
            }
        }
    } else {
        $output['drop_down'] .= '<option>Pas de port enregistré</option>';
    }
    $output['drop_down'] .= '</select> </div>'; 

    // dropdown secteur
    $output['drop_down'] .= ' <div>         
                    <label>Secteur concerné par la liaison :</label>
                        <select onchange="logIdSectCon(value);" name="drop_secteur_concerne" size="1">
                            <option></option> ';
    $tot_secteurs = $sql_secteur->rowCount();
    if ($tot_secteurs > 0) {
        foreach ($les_secteurs as $secteur) {
            if($secteur['id_secteur'] == $id_secteur) {
                $output['drop_down'] .= '<option selected value="'.$secteur["id_secteur"].'"> '.$secteur["nom_secteur"].'</option>';    
            } else {
                $output['drop_down'] .= '<option value="'.$secteur["id_secteur"].'"> '.$secteur["nom_secteur"].'</option>';
            }
        }
    } else {
        $output['drop_down'] .= '<option>Pas de secteur enregistré</option>';
    }
    $output['drop_down'] .= '</select> </div>'; 

    echo $output['drop_down'];
}

//******************
//DROPDOWN TRAVERSEE
//******************
function drop_down_traversee($conn, $code_liaison, $id_bateau) {

    $sql_liaison = "SELECT * FROM liaison";
    $sql_liaison = $conn->query($sql_liaison);
    if ($sql_liaison === false) {
        var_dump($conn->errorInfo());
    } else {
        $les_liaisons = $sql_liaison->fetchAll(PDO::FETCH_ASSOC);
    }
    
    $sql_bateau = "SELECT * FROM bateau";
    $sql_bateau = $conn->query($sql_bateau);
    if ($sql_bateau === false) {
        var_dump($conn->errorInfo());
    } else {
        $les_bateaux = $sql_bateau->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // dropdown liaison
    $output['drop_down'] = ' <div>        
                    <label>Code de Liaison:</label>
                        <select onchange="logIdCodLia(value);" name="drop_code_liaison" size="1">
                            <option></option> ';
    $tot_liaisons= $sql_liaison->rowCount();
    if ($tot_liaisons> 0) {
        foreach ($les_liaisons as $liaison) {
            if($liaison["code_liaison"] == $code_liaison) {
                $output['drop_down'] .= '<option selected value="'.$liaison["code_liaison"].'"> '.$liaison["code_liaison"].'</option>';    
            } else {
                $output['drop_down'] .= '<option value="'.$liaison["code_liaison"].'"> '.$liaison["code_liaison"].'</option>';
            }
        }
    } else {
        $output['drop_down'] .= '<option>Pas de liaison enregistrée</option>';
    }
    $output['drop_down'] .= ' </select> </div>';

    // dropdown bateau
    $output['drop_down'] .= ' <div>         
                    <label>Nom du bateau :</label>
                        <select onchange="logIdBatEff(value);" name="drop_bateau_effectue" size="1">
                            <option></option>';
    $tot_bateaux = $sql_bateau->rowCount();
    if ($tot_bateaux > 0) {
        foreach ($les_bateaux as $bateau) {
            if($bateau['id_bateau'] == $id_bateau) {
                $output['drop_down'] .= '<option selected value="'.$bateau["id_bateau"].'"> '.$bateau["nom_bateau"].'</option>';    
            } else {
                $output['drop_down'] .= '<option value="'.$bateau["id_bateau"].'"> '.$bateau["nom_bateau"].'</option>';
            }
        }
    } else {
        $output['drop_down'] .= '<option>Pas de bateau enregistré</option>';
    }
    $output['drop_down'] .= '</select> </div>'; 

    echo $output['drop_down'];
}



//******************
//DROPDOWN TYPE
//******************
function drop_down_type($conn, $lettre_categorie) {

    $sql_categorie = "SELECT * FROM categorie";
    $sql_categorie = $conn->query($sql_categorie);
    if ($sql_categorie === false) {
        var_dump($conn->errorInfo());
    } else {
        $les_categories = $sql_categorie->fetchAll(PDO::FETCH_ASSOC);
    }

    // dropdown catégorie
    $output['drop_down'] = ' <div>         
                    <label>Lettre de catégorie :</label>
                        <select onchange="logIdCat(value);" name="drop_categorie_classe" size="1">
                            <option></option>';
    $tot_categories = $sql_categorie->rowCount();
    if ($tot_categories > 0) {
        foreach ($les_categories as $categorie) {
            if($categorie['lettre_categorie'] == $lettre_categorie) {
                $output['drop_down'] .= '<option selected value="'.$categorie["lettre_categorie"].'"> '.$categorie["lettre_categorie"].'</option>';    
            } else {
                $output['drop_down'] .= '<option value="'.$categorie["lettre_categorie"].'"> '.$categorie["lettre_categorie"].'</option>';
            }
        }
    } else {
        $output['drop_down'] .= '<option>Pas de categorie enregistré</option>';
    }
    $output['drop_down'] .= '</select> </div>'; 

    echo $output['drop_down'];
}



//******************
//DROPDOWN RESERVATION
//******************
function drop_down_reservation($conn, $num_trav) {

    $sql_traversee = "SELECT * FROM traversee";
    $sql_traversee = $conn->query($sql_traversee);
    if ($sql_traversee === false) {
        var_dump($conn->errorInfo());
    } else {
        $les_traversees = $sql_traversee->fetchAll(PDO::FETCH_ASSOC);
    }

    // dropdown traversées
    $output['drop_down'] = ' <div>         
                    <label>Numéro de la traversée :</label>
                        <select onchange="logNumTrav(value);" name="drop_traversee_reserve" size="1">
                            <option></option>';
    $tot_traversees = $sql_traversee->rowCount();
    if ($tot_traversees > 0) {
        foreach ($les_traversees as $traversee) {
            if($traversee['num_traversee'] == $num_trav) {
                $output['drop_down'] .= '<option selected value="'.$traversee["num_traversee"].'"> '.$traversee["num_traversee"].'</option>';    
            } else {
                $output['drop_down'] .= '<option value="'.$traversee["num_traversee"].'"> '.$traversee["num_traversee"].'</option>';
            }
        }
    } else {
        $output['drop_down'] .= '<option>Pas de traversée enregistrée</option>';
    }
    $output['drop_down'] .= '</select> </div>'; 

    echo $output['drop_down'];
}



//******************
//DROPDOWN CONTENIR
//******************
function drop_down_contenir($conn, $id_bateau_cont, $lettre_categorie_cont) {

    $sql_categorie = "SELECT * FROM categorie";
    $sql_categorie = $conn->query($sql_categorie);
    if ($sql_categorie === false) {
        var_dump($conn->errorInfo());
    } else {
        $les_categories = $sql_categorie->fetchAll(PDO::FETCH_ASSOC);
    }
    
    $sql_bateau = "SELECT * FROM bateau";
    $sql_bateau = $conn->query($sql_bateau);
    if ($sql_bateau === false) {
        var_dump($conn->errorInfo());
    } else {
        $les_bateaux = $sql_bateau->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // dropdown catégorie
    $output['drop_down'] = ' <div>        
                    <label>Lettre de catégorie:</label>
                        <select onchange="logLetCatCont(value);" name="drop_categorie_contient" size="1">
                            <option></option> ';
    $tot_categories= $sql_categorie->rowCount();
    if ($tot_categories> 0) {
        foreach ($les_categories as $categorie) {
            if($categorie["lettre_categorie"] == $lettre_categorie_cont) {
                $output['drop_down'] .= '<option selected value="'.$categorie["lettre_categorie"].'"> '.$categorie["lettre_categorie"].' - '.$categorie["libelle_categorie"].'</option>';    
            } else {
                $output['drop_down'] .= '<option value="'.$categorie["lettre_categorie"].'"> '.$categorie["lettre_categorie"].' - '.$categorie["libelle_categorie"].'</option>';
            }
        }
    } else {
        $output['drop_down'] .= '<option>Pas de catégorie enregistrée</option>';
    }
    $output['drop_down'] .= ' </select> </div>';

    // dropdown bateau
    $output['drop_down'] .= ' <div>         
                    <label>Nom du bateau :</label>
                        <select onchange="logIdBatCont(value);" name="drop_bateau_contient" size="1">
                            <option></option>';
    $tot_bateaux = $sql_bateau->rowCount();
    if ($tot_bateaux > 0) {
        foreach ($les_bateaux as $bateau) {
            if($bateau['id_bateau'] == $id_bateau_cont) {
                $output['drop_down'] .= '<option selected value="'.$bateau["id_bateau"].'"> '.$bateau["nom_bateau"].'</option>';    
            } else {
                $output['drop_down'] .= '<option value="'.$bateau["id_bateau"].'"> '.$bateau["nom_bateau"].'</option>';
            }
        }
    } else {
        $output['drop_down'] .= '<option>Pas de bateau enregistré</option>';
    }
    $output['drop_down'] .= '</select> </div>'; 

    echo $output['drop_down'];
}



//******************
//DROPDOWN TARIF
//******************
function drop_down_tarif($conn, $dat_deb, $cde_liai, $typ_tar) {

    $sql_periode = "SELECT * FROM periode";
    $sql_periode = $conn->query($sql_periode);
    if ($sql_periode === false) {
        var_dump($conn->errorInfo());
    } else {
        $les_periodes= $sql_periode->fetchAll(PDO::FETCH_ASSOC);
    }
    
    $sql_liaison = "SELECT * FROM liaison";
    $sql_liaison = $conn->query($sql_liaison);
    if ($sql_liaison === false) {
        var_dump($conn->errorInfo());
    } else {
        $les_liaisons = $sql_liaison->fetchAll(PDO::FETCH_ASSOC);
    }
    
    $sql_type = "SELECT * FROM type";
    $sql_type = $conn->query($sql_type);
    if ($sql_type === false) {
        var_dump($conn->errorInfo());
    } else {
        $les_types = $sql_type->fetchAll(PDO::FETCH_ASSOC);
    }

    // dropdown périodes
    $output['drop_down'] = ' <div>        
                    <label>Période de début :</label>
                        <select onchange="logTarifPeriode(value);" name="drop_periode_tarif" size="1">
                            <option></option> ';
    $tot_periodes = $sql_periode->rowCount();
    if ($tot_periodes > 0) {
        foreach ($les_periodes as $periode) {
            if($periode["debut_periode"] == $dat_deb) {
                $output['drop_down'] .= '<option selected value="'.$periode["debut_periode"].'"> ' .date("d-m-Y", strtotime($periode["debut_periode"])). '</option>';    
            } else {
                $output['drop_down'] .= '<option value="'.$periode["debut_periode"].'"> ' .date("d-m-Y", strtotime($periode["debut_periode"])). '</option>';
            }
        }
    } else {
        $output['drop_down'] .= '<option>Pas de période enregistrée</option>';
    }
    $output['drop_down'] .= ' </select> </div>';

    // dropdown liaisons
    $output['drop_down'] .= ' <div>         
                    <label>Code de liaison :</label>
                        <select onchange="logTarifCode(value);" name="drop_cdelia_tarif" size="1">
                            <option></option>';
    $tot_liaisons = $sql_liaison->rowCount();
    if ($tot_liaisons > 0) {
        foreach ($les_liaisons as $liaison) {
            if($liaison['code_liaison'] == $cde_liai) {
                $output['drop_down'] .= '<option selected value="'.$liaison["code_liaison"].'"> '.$liaison["code_liaison"].'</option>';    
            } else {
                $output['drop_down'] .= '<option value="'.$liaison["code_liaison"].'"> '.$liaison["code_liaison"].'</option>';
            }
        }
    } else {
        $output['drop_down'] .= '<option>Pas de liaison enregistrée</option>';
    }
    $output['drop_down'] .= '</select> </div>'; 

    // dropdown type
    $output['drop_down'] .= ' <div>         
                    <label>Type :</label>
                        <select onchange="logTarifType(value);" name="drop_type_tarif" size="1">
                            <option></option> ';
    $tot_types = $sql_type->rowCount();
    if ($tot_types > 0) {
        foreach ($les_types as $type) {
            if($type['num_type'] == $typ_tar) {
                $output['drop_down'] .= '<option selected value="'.$type["num_type"].'"> '.$type["num_type"].' - '.$type["libelle_type"].'</option>';    
            } else {
                $output['drop_down'] .= '<option value="'.$type["num_type"].'"> '.$type["num_type"].' - '.$type["libelle_type"].'</option>';
            }
        }
    } else {
        $output['drop_down'] .= '<option>Pas de type enregistré</option>';
    }
    $output['drop_down'] .= '</select> </div>'; 

    echo $output['drop_down'];
}



//******************
//DROPDOWN ENREGISTRE
//******************
function drop_down_enregistre($conn, $resa_enr, $type_enr) {

    $sql_resa_enr = "SELECT * FROM reservation";
    $sql_resa_enr = $conn->query($sql_resa_enr);
    if ($sql_resa_enr === false) {
        var_dump($conn->errorInfo());
    } else {
        $les_reservations = $sql_resa_enr->fetchAll(PDO::FETCH_ASSOC);
    }
    
    $sql_type_enr = "SELECT * FROM type";
    $sql_type_enr = $conn->query($sql_type_enr);
    if ($sql_type_enr === false) {
        var_dump($conn->errorInfo());
    } else {
        $les_types = $sql_type_enr->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // dropdown réservation
    $output['drop_down'] = ' <div>        
                    <label>Numéro de la réseravtion :</label>
                        <select onchange="logNumResEnr(value);" name="drop_resa_enregistre" size="1">
                            <option></option> ';
    $yoy_resa_enr= $sql_resa_enr->rowCount();
    if ($yoy_resa_enr> 0) {
        foreach ($les_reservations as $reservation) {
            if($reservation["num_reservation"] == $resa_enr) {
                $output['drop_down'] .= '<option selected value="'.$reservation["num_reservation"].'"> '.$reservation["num_reservation"].' - '.$reservation["nom"].'</option>';    
            } else {
                $output['drop_down'] .= '<option value="'.$reservation["num_reservation"].'"> '.$reservation["num_reservation"].' - '.$reservation["nom"].'</option>';
            }
        }
    } else {
        $output['drop_down'] .= '<option>Pas de catégorie enregistrée</option>';
    }
    $output['drop_down'] .= ' </select> </div>';

    // dropdown type
    $output['drop_down'] .= ' <div>         
                    <label>Type de L\'enregistrement :</label>
                        <select onchange="logTypEnr(value);" name="drop_type_enregistre" size="1">
                            <option></option>';
    $tot_typ_enr = $sql_type_enr->rowCount();
    if ($tot_typ_enr > 0) {
        foreach ($les_types as $type) {
            if($type['num_type'] == $type_enr) {
                $output['drop_down'] .= '<option selected value="'.$type["num_type"].'"> '.$type["num_type"].' - '.$type["libelle_type"].'</option>';    
            } else {
                $output['drop_down'] .= '<option value="'.$type["num_type"].'"> '.$type["num_type"].' - '.$type["libelle_type"].'</option>';
            }
        }
    } else {
        $output['drop_down'] .= '<option>Pas de type enregistré</option>';
    }
    $output['drop_down'] .= '</select> </div>'; 

    echo $output['drop_down'];
}
 ?>

