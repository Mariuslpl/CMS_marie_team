<?php

require '../../includes/init.php';

$conn = require '../../includes/db.php';

if(isset($_POST["action_php"]))
{
    // ************************ ALL SQL PORT RELATED **********************************
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



    // ************************ ALL SQL SECTEUR RELATED **********************************
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

    
    // ************************ ALL SQL LIAISON RELATED **********************************
    // add modale 
    if($_POST["action_php"] == "drop_add_liaison")
    {
        drop_down_modal($conn, "", "", "");
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
        $result = $stmt->fetchAll();

        foreach($result as $row)
        {
            $port_dep = $row['id_port_depart'];
            $port_arr = $row['id_port_arrivee'];
            $secteur = $row['id_secteur_concerne'];
            drop_down_modal($conn, $port_dep, $port_arr, $secteur);
        }
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
}

function drop_down_modal($conn, $id_port_dep, $id_port_arr, $id_secteur) {

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
 ?>

