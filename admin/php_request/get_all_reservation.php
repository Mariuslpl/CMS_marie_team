<?php

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
// les deux point sont pour amener vers le ROOT folder
require '../../includes/init.php';

$conn = require '../../includes/db.php';

//déclaration de la requête SQL
$sql = "SELECT * FROM reservation";

//puis on requête avec la méthode query() 
$sql = $conn->query($sql);

//test du retour (boolean)
if ($sql === false) {
    var_dump($conn->errorInfo());
} else {
    //fetch le résultat sous forme de tableau associatif
    $les_reservations = $sql->fetchAll(PDO::FETCH_ASSOC);
}

//création de l'output
$output = '
<table class="table table-striped table-bordered">
    <tr>
        <th>Numéro</th>
        <th>Nom</th>
        <th>Adresse</th>
        <th>Code Postal</th>
        <th>Ville</th>
        <th>Num Traversée</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
';

$tot_reservations = $sql->rowCount();
//test si le résultat est vide
if ($tot_reservations > 0) {
    //on boucle sur tableau associatif renvoyé par la BDD
    foreach ($les_reservations as $reservation) {
        // on concaténe l'output
        $output .= '
        <tr>
            <td>' .$reservation["num_reservation"]. '</td>   
            <td>' .$reservation["nom"]. '</td>        
            <td>' .$reservation["adresse"]. '</td>
            <td>' .$reservation["cp"]. '</td>
            <td>' .$reservation["ville"]. '</td>
            <td>' .$reservation["num_traversee_reserve"]. '</td>
            
            <td>
                <button id="' .$reservation["num_reservation"]. '"
                        nom= "' .$reservation["nom"]. '"
                        adresse= "' .$reservation["adresse"]. '"
                        cp= "' .$reservation["cp"]. '"
                        ville= "' .$reservation["ville"]. '"
                        type="button"
                        name="edit"
                        class="btn btn-primary btn-xs edit_reservation"> MODIFIER
                </button>
            </td>

            <td>
                <button id="' .$reservation["num_reservation"]. '"
                        type="button"
                        name="delete"
                        class="btn btn-danger btn-xs delete_reservation"> SUPPRIMER
                </button>
            </td>
        </tr>
        ';
    }
} else {
    $output .= '
    <tr>
        <td colspan="8" align="center">Pas de réservation enregistrée</td>
    </tr>
    ';
}

$output .= '</table>';

echo $output;

?>