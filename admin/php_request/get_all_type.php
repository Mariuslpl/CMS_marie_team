<?php

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
// les deux point sont pour amener vers le ROOT folder
require '../../includes/init.php';

$conn = require '../../includes/db.php';

//déclaration de la requête SQL
$sql = "SELECT * FROM type";

//puis on requête avec la méthode query() 
$sql = $conn->query($sql);

//test du retour (boolean)
if ($sql === false) {
    var_dump($conn->errorInfo());
} else {
    //fetch le résultat sous forme de tableau associatif
    $les_types = $sql->fetchAll(PDO::FETCH_ASSOC);
}

//création de l'output
$output = '
<table class="table table-striped table-bordered">
    <tr>
        <th>Numéro</th>
        <th>Libellé</th>
        <th>Catégorie</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
';

$tot_types = $sql->rowCount();
//test si le résultat est vide
if ($tot_types > 0) {
    //on boucle sur tableau associatif renvoyé par la BDD
    foreach ($les_types as $type) {
        // on concaténe l'output
        $output .= '
        <tr>
            <td>' .$type["num_type"]. '</td>
            <td>' .$type["libelle_type"]. '</td>
            <td>' .$type["lettre_categorie_classe"]. '</td>
            
            <td>
                <button id="' .$type["num_type"]. '"
                        libelle= "' .$type["libelle_type"]. '"
                        type="button"
                        name="edit"
                        class="btn btn-primary btn-xs edit_type"> MODIFIER
                </button>
            </td>

            <td>
                <button id="' .$type["num_type"]. '"
                        type="button"
                        name="delete"
                        class="btn btn-danger btn-xs delete_type"> SUPPRIMER
                </button>
            </td>
        </tr>
        ';
    }
} else {
    $output .= '
    <tr>
        <td colspan="5" align="center">Pas de type enregistré</td>
    </tr>
    ';
}

$output .= '</table>';

echo $output;

?>