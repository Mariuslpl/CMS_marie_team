<?php

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
// les deux point sont pour amener vers le ROOT folder
require '../../includes/init.php';

$conn = require '../../includes/db.php';

//déclaration de la requête SQL
$sql = "
SELECT
liaison.code_liaison, liaison.distance,
sectnom.nom_secteur AS 'nom_secteur_concerne',
portarr.nom_port AS 'nom_port_arrivee', 
portdep.nom_port AS 'nom_port_depart'

FROM liaison
INNER JOIN secteur sectnom
ON liaison.id_secteur_concerne = sectnom.id_secteur
INNER JOIN port portarr
ON liaison.id_port_arrivee = portarr.id_port
INNER JOIN port portdep
ON liaison.id_port_depart = portdep.id_port ";

//puis on requête avec la méthode query() 
$sql = $conn->query($sql);

//test du retour (boolean)
if ($sql === false) {
    var_dump($conn->errorInfo());
} else {
    //fetch le résultat sous forme de tableau associatif
    $les_liaisons = $sql->fetchAll(PDO::FETCH_ASSOC);
}

//création de l'output
$output = '
<table class="table table-striped table-bordered">
    <tr>
        <th>Code</th>
        <th>Distance</th>
        <th>Départ</th>
        <th>Arrivée</th>
        <th>Secteur</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
';

$tot_liaisons = $sql->rowCount();
//test si le résultat est vide
if ($tot_liaisons > 0) {
    //on boucle sur tableau associatif renvoyé par la BDD
    foreach ($les_liaisons as $liaison) {
        // on concaténe l'output
        $output .= '
        <tr>
            <td>' .$liaison["code_liaison"]. '</td>
            <td>' .$liaison["distance"]. '</td>
            <td>' .$liaison["nom_port_depart"]. '</td>
            <td>' .$liaison["nom_port_arrivee"]. '</td>
            <td>' .$liaison["nom_secteur_concerne"]. '</td>
            
            <td>
                <button id="' .$liaison["code_liaison"]. '"
                        distance="' .$liaison["distance"]. '"
                        type="button"
                        name="edit"
                        class="btn btn-primary btn-xs edit_liaison"> MODIFIER
                </button>
            </td>

            <td>
                <button id="' .$liaison["code_liaison"]. '"
                        type="button"
                        name="delete"
                        class="btn btn-danger btn-xs delete_liaison"> SUPPRIMER
                </button>
            </td>
        </tr>
        ';
    }
} else {
    $output .= '
    <tr>
        <td colspan="7" align="center">Pas de liaison enregistrée</td>
    </tr>
    ';
}

$output .= '</table>';

echo $output;

?>