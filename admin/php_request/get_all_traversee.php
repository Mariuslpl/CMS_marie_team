<?php

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
// les deux point sont pour amener vers le ROOT folder
require '../../includes/init.php';

$conn = require '../../includes/db.php';

//déclaration de la requête SQL
$sql = "SELECT traversee.num_traversee, traversee.date_traversee, 
               traversee.heure_traversee, traversee.code_liaison_realise,
               batnom.nom_bateau AS 'nom_bateau_effectue'
        FROM traversee
            INNER JOIN bateau batnom
        ON traversee.id_bateau_effectue = batnom.id_bateau";


//puis on requête avec la méthode query() 
$sql = $conn->query($sql);

//test du retour (boolean)
if ($sql === false) {
    var_dump($conn->errorInfo());
} else {
    //fetch le résultat sous forme de tableau associatif
    $les_traversees = $sql->fetchAll(PDO::FETCH_ASSOC);
}

//création de l'output
$output = '
<table class="table table-striped table-bordered">
    <tr>
        <th>Numéro</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Liaison</th>
        <th>Nom du bateau</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
';

$tot_traversees = $sql->rowCount();
//test si le résultat est vide
if ($tot_traversees > 0) {
    //on boucle sur tableau associatif renvoyé par la BDD
    foreach ($les_traversees as $traversee) {
        // on concaténe l'output
        $output .= '
        <tr>
            <td>' .$traversee["num_traversee"]. '</td>
            <td>' .date("d-m-Y", strtotime($traversee["date_traversee"])). '</td>
            <td>' .date("h:i", strtotime($traversee["heure_traversee"])). '</td>
            <td>' .$traversee["code_liaison_realise"]. '</td>
            <td>' .$traversee["nom_bateau_effectue"]. '</td>
            
            <td>
                <button id="' .$traversee["num_traversee"]. '"
                        date="' .$traversee["date_traversee"]. '"
                        time="' .date("h:i", strtotime($traversee["heure_traversee"])). '"
                        type="button"
                        name="edit"
                        class="btn btn-primary btn-xs edit_traversee"> MODIFIER
                </button>
            </td>

            <td>
                <button id="' .$traversee["num_traversee"]. '"
                        type="button"
                        name="delete"
                        class="btn btn-danger btn-xs delete_traversee"> SUPPRIMER
                </button>
            </td>
        </tr>
        ';
    }
} else {
    $output .= '
    <tr>
        <td colspan="7" align="center">Pas de traversée enregistrée</td>
    </tr>
    ';
}

$output .= '</table>';

echo $output;

?>