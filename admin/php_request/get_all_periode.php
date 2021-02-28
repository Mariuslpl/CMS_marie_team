<?php

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
// les deux point sont pour amener vers le ROOT folder
require '../../includes/init.php';

$conn = require '../../includes/db.php';

//déclaration de la requête SQL
$sql = "SELECT * FROM periode";

//puis on requête avec la méthode query() 
$sql = $conn->query($sql);

//test du retour (boolean)
if ($sql === false) {
    var_dump($conn->errorInfo());
} else {
    //fetch le résultat sous forme de tableau associatif
    $les_periodes = $sql->fetchAll(PDO::FETCH_ASSOC);
}

//création de l'output
$output = '
<table class="table table-striped table-bordered">
    <tr>
        <th>Date de début</th>
        <th>Date de fin</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
';

$tot_periodes = $sql->rowCount();
//test si le résultat est vide
if ($tot_periodes > 0) {
    //on boucle sur tableau associatif renvoyé par la BDD
    foreach ($les_periodes as $periode) {
        // on concaténe l'output
        $output .= '
        <tr>
            <td>' .date("d-m-Y", strtotime($periode["debut_periode"])). '</td>
            <td>' .date("d-m-Y", strtotime($periode["fin_periode"])). '</td>
            
            <td>
                <button id="' .$periode["debut_periode"]. '"
                        date_fin="' .$periode["fin_periode"]. '"
                        type="button"
                        name="edit"
                        class="btn btn-primary btn-xs edit_periode"> MODIFIER
                </button>
            </td>

            <td>
                <button id="' .$periode["debut_periode"]. '"
                        type="button"
                        name="delete"
                        class="btn btn-danger btn-xs delete_periode"> SUPPRIMER
                </button>
            </td>
        </tr>
        ';
    }
} else {
    $output .= '
    <tr>
        <td colspan="4" align="center">Pas de période enregistrée</td>
    </tr>
    ';
}

$output .= '</table>';

echo $output;

?>