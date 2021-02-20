<?php

require '../../includes/init.php';

$conn = require '../../includes/db.php';

if(isset($_POST["action_php"]))
{
    // ************************ ALL SQL PORT RELATED **********************************
    //********************************* ADD      
    if($_POST["action_php"] == "add_port")
    {
        $query = "INSERT INTO port (nom_port)
                  VALUES ('".$_POST["nom_port"]."')";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>Le port a bien été ajouté !</p>';
    }

    //********************************* GET ONE
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
    
    //********************************* UPDATE
    if($_POST["action_php"] == "update_port")
    {
        $query = "UPDATE port
                  SET nom_port = '".$_POST["nom_port"]."'
                  WHERE id_port = '".$_POST["hidden_id_port"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>Le nom du port à été mis à jour !</p>';
    }
    
    //********************************* DELETE
    if($_POST["action_php"] == "delete_port")
    {
        $query = "DELETE FROM port
                  WHERE id_port = '".$_POST["id"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
    }



    // ************************ ALL SQL secteur RELATED **********************************
    //********************************* ADD      
    if($_POST["action_php"] == "add_secteur")
    {
        $query = "INSERT INTO secteur (nom_secteur)
                  VALUES ('".$_POST["nom_secteur"]."')";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>Le secteur a bien été ajouté !</p>';
    }

    //********************************* GET ONE
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
    
    //********************************* UPDATE
    if($_POST["action_php"] == "update_secteur")
    {
        $query = "UPDATE secteur
                  SET nom_secteur = '".$_POST["nom_secteur"]."'
                  WHERE id_secteur = '".$_POST["hidden_id_secteur"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo '<p>Le nom du secteur à été mis à jour !</p>';
    }

    //********************************* DELETE
    if($_POST["action_php"] == "delete_secteur")
    {
        $query = "DELETE FROM secteur
                  WHERE id_secteur = '".$_POST["id"]."'";

        $stmt = $conn->prepare($query);
        $stmt->execute();
    }




}
 ?>
