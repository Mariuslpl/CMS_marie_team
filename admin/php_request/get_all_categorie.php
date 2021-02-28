<?php

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
// les deux point sont pour amener vers le ROOT folder
require '../../includes/init.php';

$conn = require '../../includes/db.php';

//déclaration de la requête SQL
$sql = "SELECT *
        FROM categorie";

//puis on requête avec la méthode query() 
$sql = $conn->query($sql);

//test du retour (boolean)
if ($sql === false) {
    var_dump($conn->errorInfo());
} else {
    //fetch le résultat sous forme de tableau associatif
    $les_categories = $sql->fetchAll(PDO::FETCH_ASSOC);
}

//création de l'output
$output = '
<table class="table table-striped table-bordered">
    <tr>
        <th>Lettre Cat</th>
        <th>Libellé</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
';

$tot_categories = $sql->rowCount();
//test si le résultat est vide
if ($tot_categories > 0) {
    //on boucle sur tableau associatif renvoyé par la BDD
    foreach ($les_categories as $categorie) {
        // on concaténe l'output
        $output .= '
        <tr>
            <td>' .$categorie["lettre_categorie"]. '</td>
            <td>' .$categorie["libelle_categorie"]. '</td>
            
            <td>
                <button id="' .$categorie["lettre_categorie"]. '"
                        libelle="' .$categorie["libelle_categorie"].'"
                        type="button"
                        name="edit"
                        class="btn btn-primary btn-xs edit_categorie"> MODIFIER
                </button>
            </td>

            <td>
                <button id="' .$categorie["lettre_categorie"]. '"
                        type="button"
                        name="delete"
                        class="btn btn-danger btn-xs delete_categorie"> SUPPRIMER
                </button>
            </td>
        </tr>
        ';
    }
} else {
    $output .= '
    <tr>
        <td colspan="4" align="center">Pas de catégorie enregistrée</td>
    </tr>
    ';
}

$output .= '</table>';

echo $output;

?>