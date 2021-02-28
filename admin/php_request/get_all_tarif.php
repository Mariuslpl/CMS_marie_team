<?php

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
// les deux point sont pour amener vers le ROOT folder
require '../../includes/init.php';

$conn = require '../../includes/db.php';

//déclaration de la requête SQL
//$sql = "SELECT * FROM tarif";


$sql = "SELECT tarif.debut_periode_tarif, tarif.code_liaison_tarif, tarif.num_type_tarif, tarif.tarif,
               typlib.libelle_type AS 'lib_type_tarif'
        FROM tarif
            INNER JOIN type typlib
        ON tarif.num_type_tarif = typlib.num_type";


//puis on requête avec la méthode query() 
$sql = $conn->query($sql);

//test du retour (boolean)
if ($sql === false) {
    var_dump($conn->errorInfo());
} else {
    //fetch le résultat sous forme de tableau associatif
    $les_tarifs = $sql->fetchAll(PDO::FETCH_ASSOC);
}

//création de l'output
$output = '
<table class="table table-striped table-bordered">
    <tr>
        <th>Date de début</th>
        <th>Code Liaison</th>
        <th>Type</th>
        <th>Libellé</th>
        <th>Tarif</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
';

$tot_tarifs = $sql->rowCount();
//test si le résultat est vide
if ($tot_tarifs > 0) {
    //on boucle sur tableau associatif renvoyé par la BDD
    foreach ($les_tarifs as $tarif) {
        // on concaténe l'output
        $output .= '
        <tr>
            <td>' .date("d-m-Y", strtotime($tarif["debut_periode_tarif"])). '</td>
            <td>' .$tarif["code_liaison_tarif"]. '</td>
            <td>' .$tarif["num_type_tarif"]. '</td>
            <td>' .$tarif["lib_type_tarif"]. '</td>
            <td>' .$tarif["tarif"]. ' € </td>
            
            <td>
                <button cleTar1="' .$tarif["debut_periode_tarif"]. '"
                        cleTar2="' .$tarif["code_liaison_tarif"]. '"
                        cleTar3="' .$tarif["num_type_tarif"]. '"
                        tarif="' .$tarif["tarif"]. '"
                        type="button"
                        name="edit"
                        class="btn btn-primary btn-xs edit_tarif"> MODIFIER
                </button>
            </td>

            <td>
                <button cleTar1="' .$tarif["debut_periode_tarif"]. '"
                        cleTar2="' .$tarif["code_liaison_tarif"]. '"
                        cleTar3="' .$tarif["num_type_tarif"]. '"
                        type="button"
                        name="delete"
                        class="btn btn-danger btn-xs delete_tarif"> SUPPRIMER
                </button>
            </td>
        </tr>
        ';
    }
} else {
    $output .= '
    <tr>
        <td colspan="7" align="center">Pas de tarif enregistré</td>
    </tr>
    ';
}

$output .= '</table>';

echo $output;

?>