<?php

require '../../includes/init.php';

$conn = require '../../includes/db.php';

if(isset($_POST["action_php"]))
{
    if($_POST["action_php"] == "get_btn_secteur")
    {
        $sql = "SELECT * FROM secteur";
        $sql = $conn->query($sql);

        if ($sql === false) {
            var_dump($conn->errorInfo());
        } else {
            $les_secteurs = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        $tot_secteurs = $sql->rowCount();

        $output = '';

        if($tot_secteurs > 0) {
            foreach($les_secteurs as $secteur) {
                $output .= '<button id="' .$secteur['id_secteur']. '" class="btn_secteur"> ' .$secteur['nom_secteur']. ' </button>';
            }
        } else {
            $output .= '<p>pas de secteurs définis </p>';
        }

        echo $output;
    }

    if($_POST["action_php"] == "get_resa_liaison")
    {
        $sql_liaison = "SELECT liaison.code_liaison, liaison.distance,
                                portarr.nom_port AS 'nom_port_arrivee', 
                                portdep.nom_port AS 'nom_port_depart'
                        FROM liaison
                            INNER JOIN port portarr
                        ON liaison.id_port_arrivee = portarr.id_port
                            INNER JOIN port portdep
                        ON liaison.id_port_depart = portdep.id_port 
                        WHERE liaison.id_secteur_concerne = '".$_POST["id"]."'";

        $sql_liaison = $conn->query($sql_liaison);
        if ($sql_liaison === false) {
            var_dump($conn->errorInfo());
        } else {
            $les_liaisons = $sql_liaison->fetchAll(PDO::FETCH_ASSOC);
        }

        $tot_liaisons= $sql_liaison->rowCount();

        $output= ' <div>        
                        <label>Séléctionner une liaison :</label>
                            <select id="test_val" onchange="logResaCodLia(value);" name="drop_code_liaison" size="1">
                                <option></option> ';
        if ($tot_liaisons> 0) {
            foreach ($les_liaisons as $liaison) {
                $output .= '<option value="'.$liaison["code_liaison"].'"> '.$liaison["nom_port_depart"].' - '.$liaison["nom_port_arrivee"].'</option>';
            }
        } else {
            $output .= '<option>Pas de liaison enregistrée</option>';
        }
        $output .= ' </select> </div>';

        echo $output;
    }

    if($_POST["action_php"] == "get_resa_traversee")
    {
        $sql_traversee = "SELECT traversee.num_traversee,  
                            traversee.heure_traversee,
                            traversee.id_bateau_effectue, 
                            batnom.nom_bateau AS 'nom_bateau_effectue'
                        FROM traversee
                            INNER JOIN bateau batnom
                        ON traversee.id_bateau_effectue = batnom.id_bateau
                        WHERE traversee.date_traversee = '".$_POST["date"]."'
                        AND traversee.code_liaison_realise = '".$_POST["code"]."'
                        ";

        $sql_traversee = $conn->query($sql_traversee);

        if ($sql_traversee === false) {
            var_dump($conn->errorInfo());
        } else {
            $les_traversees = $sql_traversee->fetchAll(PDO::FETCH_ASSOC);
        }

        // début de l'output
        $output = '
        <table class="table table-striped table-bordered">
            <tr>
                <th>Numéro</th>
                <th>Heure</th>       
                <th>Nom du bateau</th>
                <th>Places A</th>
                <th>Places B</th>
                <th>Places C</th>            
                <th>Choix</th>
            </tr>
        ';

        // créer une variable qui reprend l'id du bateau 
        foreach($les_traversees as $traversee) {
           
            $placesA = "0";
            $placesB = "0";
            $placesC = "0";

            $num_traversee = $traversee["num_traversee"];
            $id_bat = $traversee["id_bateau_effectue"];

            setPlaces($id_bat, $num_traversee, $placesA, $placesB, $placesC);

            $output .= '
            <tr>
                <td>' .$traversee["num_traversee"]. '</td>           
                <td>' .date("h:i", strtotime($traversee["heure_traversee"])). '</td>          
                <td>' .$traversee["nom_bateau_effectue"]. '</td>             
                <td>'.$placesA.'</td>            
                <td>'.$placesB.'</td>               
                <td>'.$placesC.'</td>

                <td>
                    <button id="' .$traversee["num_traversee"]. '"
                        
                            time="' .date("h:i", strtotime($traversee["heure_traversee"])). '"
                            type="button"
                            name="edit"
                            class="btn btn-primary btn-xs select_traversee"> Selectionner
                    </button>
                </td>
            </tr>
            ';
        }
        $output .= '</table>';
        echo $output;
    }

    if($_POST["action_php"] == "add_resa") 
    {
        $sql = "INSERT INTO reservation(nom, adresse, cp, ville, num_traversee_reserve, id_user) 
                VALUES ('".$_POST["nom"]."', 
                          '".$_POST["adresse"]."', 
                          '".$_POST["cp"]."', 
                          '".$_POST["ville"]."', 
                          '".$_POST["hidden_id_resa"]."',
                          '".$_SESSION["id"]."')";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $req = $conn->query("SELECT MAX(`num_reservation`) FROM reservation");
        $data = $req->fetch();
        $num_reservation = $data[0];

        $categorie = ["A1", "A2", "A3", "B1", "B2", "C1", "C2", "C3"];

        foreach($categorie as $cat) 
        {
            if($_POST["$cat"] != "0") 
            {
                $sql_enregistre = "INSERT INTO enregistre (num_reservation_enregistre, num_type_enregistre, quantite)
                                    VALUES ('$num_reservation', 
                                            '$cat', 
                                            '".$_POST["$cat"]."')";
                $stmt = $conn->prepare($sql_enregistre);
                $stmt->execute();
            }
        }

        echo '<p>La réservation a bien été ajoutée !</p>';
    }
}

function setPlaces($boatId, $num, &$placesA, &$placesB, &$placesC) {

    $dbh = require '../../includes/db.php';

    // capacité max pour catégorie A du bateau 
    $sql = "SELECT capacite FROM contenir WHERE id_bateau_contient = ".$boatId." AND lettre_categorie_contient = 'A';";
    $res = $dbh->query($sql);
    $fet = $res->fetch();
    $max_A = $fet["capacite"];
    $res->closeCursor();
    
    // capacité max pour catégorie B du bateau 
    $sql = "SELECT capacite FROM contenir WHERE id_bateau_contient = ".$boatId." AND lettre_categorie_contient = 'B';";
    $res = $dbh->query($sql);
    $fet = $res->fetch();
    $max_B = $fet["capacite"];
    $res->closeCursor();

    // capacité max pour catégorie C du bateau 
    $sql = "SELECT capacite FROM contenir WHERE id_bateau_contient = ".$boatId." AND lettre_categorie_contient = 'C';";
    $res = $dbh->query($sql);
    $fet = $res->fetch();
    $max_C = $fet["capacite"];
    $res->closeCursor();


    // réservation catégorie B
    $sql = "SELECT quantite FROM enregistre WHERE (num_type_enregistre = 'A1' OR num_type_enregistre = 'A2' OR num_type_enregistre = 'A3') 
            AND num_reservation_enregistre IN (SELECT num_reservation FROM reservation WHERE num_traversee_reserve = ".$num.");";
    $res = $dbh->query($sql);
    $reservedA = 0;
    while ($a = $res->fetch()) {
        $Qte = $a["quantite"];
        $reservedA = $reservedA + $Qte;
    }
    $res->closeCursor();

    // réservation catégorie B
    $sql = "SELECT quantite FROM enregistre WHERE (num_type_enregistre = 'B1' OR num_type_enregistre = 'B2')
            AND num_reservation_enregistre IN (SELECT num_reservation FROM reservation WHERE num_traversee_reserve = ".$num.");";
    $res = $dbh->query($sql);
    $reservedB = 0;
    while ($a = $res->fetch()) {
        $Qte = $a["quantite"];
        $reservedB = $reservedB + $Qte;
    }
    $res->closeCursor();

    // réservation catégorie B
    $sql = "SELECT quantite FROM enregistre WHERE (num_type_enregistre = 'C1' OR num_type_enregistre = 'C2' OR num_type_enregistre = 'C3') 
            AND num_reservation_enregistre IN (SELECT num_reservation FROM reservation WHERE num_traversee_reserve = ".$num.");";
    $res = $dbh->query($sql);
    $reservedC = 0;
    while ($a = $res->fetch()) {
        $Qte = $a["quantite"];
        $reservedC = $reservedC + $Qte;
    }
    $res->closeCursor();

    $placesA = $max_A - $reservedA;
    $placesB = $max_B - $reservedB;
    $placesC = $max_C - $reservedC;
}

?>