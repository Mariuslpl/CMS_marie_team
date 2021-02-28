<?php

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
// les deux point sont pour amener vers le ROOT folder
require '../../includes/init.php';

$conn = require '../../includes/db.php';

//déclaration de la requête SQL
$sql = "SELECT *
        FROM bateau";

//puis on requête avec la méthode query() 
$sql = $conn->query($sql);

//test du retour (boolean)
if ($sql === false) {
    var_dump($conn->errorInfo());
} else {
    //fetch le résultat sous forme de tableau associatif
    $les_bateaux = $sql->fetchAll(PDO::FETCH_ASSOC);
}

//création de l'output
$output = '
<table class="table table-striped table-bordered">
    <tr>
        <th>Id du bateau</th>
        <th>Nom</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
';

$tot_bateaux = $sql->rowCount();
//test si le résultat est vide
if ($tot_bateaux > 0) {
    //on boucle sur tableau associatif renvoyé par la BDD
    foreach ($les_bateaux as $bateau) {
        // on concaténe l'output
        $output .= '
        <tr>
            <td>' .$bateau["id_bateau"]. '</td>
            <td>' .$bateau["nom_bateau"]. '</td>
            
            <td>
                <button id="' .$bateau["id_bateau"]. '"
                        nom_bat="' .$bateau["nom_bateau"].'"
                        type="button"
                        name="edit"
                        class="btn btn-primary btn-xs edit_bateau"> MODIFIER
                </button>
            </td>

            <td>
                <button id="' .$bateau["id_bateau"]. '"
                        type="button"
                        name="delete"
                        class="btn btn-danger btn-xs delete_bateau"> SUPPRIMER
                </button>
            </td>
        </tr>
        ';
    }
} else {
    $output .= '
    <tr>
        <td colspan="4" align="center">Pas de bateau enregistré</td>
    </tr>
    ';
}

$output .= '</table>';

echo $output;

?>