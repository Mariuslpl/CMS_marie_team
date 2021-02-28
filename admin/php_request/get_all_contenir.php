<?php

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
// les deux point sont pour amener vers le ROOT folder
require '../../includes/init.php';

$conn = require '../../includes/db.php';

//déclaration de la requête SQL
$sql = "SELECT contenir.capacite, contenir.lettre_categorie_contient, contenir.id_bateau_contient,
               batnom.nom_bateau AS 'nom_bateau_contient',
               catlib.libelle_categorie AS 'lib_cat_contient'
        FROM contenir
            INNER JOIN bateau batnom
        ON contenir.id_bateau_contient = batnom.id_bateau
            INNER JOIN categorie catlib
        ON contenir.lettre_categorie_contient = catlib.lettre_categorie";


//puis on requête avec la méthode query() 
$sql = $conn->query($sql);

//test du retour (boolean)
if ($sql === false) {
    var_dump($conn->errorInfo());
} else {
    //fetch le résultat sous forme de tableau associatif
    $les_capacites = $sql->fetchAll(PDO::FETCH_ASSOC);
}

//création de l'output
$output = '
<table class="table table-striped table-bordered">
    <tr>
        <th>Nom du bateau</th>
        <th>Catégorie</th>
        <th>Capacité</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
';

$tot_capacites = $sql->rowCount();
//test si le résultat est vide
if ($tot_capacites > 0) {
    //on boucle sur tableau associatif renvoyé par la BDD
    foreach ($les_capacites as $contenir) {
        // on concaténe l'output
        $output .= '
        <tr>
            <td>' .$contenir["nom_bateau_contient"]. '</td>
            <td>' .$contenir["lettre_categorie_contient"]. ' - ' .$contenir["lib_cat_contient"]. '</td>
            <td>' .$contenir["capacite"]. '</td>
            
            <td>
                <button id="' .$contenir["id_bateau_contient"]. '"
                        lettre="' .$contenir["lettre_categorie_contient"]. '"
                        capacite="' .$contenir["capacite"]. '"
                        type="button"
                        name="edit"
                        class="btn btn-primary btn-xs edit_contenir"> MODIFIER
                </button>
            </td>

            <td>
                <button id="' .$contenir["id_bateau_contient"]. '"
                        lettre="' .$contenir["lettre_categorie_contient"]. '"
                        type="button"
                        name="delete"
                        class="btn btn-danger btn-xs delete_contenir"> SUPPRIMER
                </button>
            </td>
        </tr>
        ';
    }
} else {
    $output .= '
    <tr>
        <td colspan="5" align="center">Pas de capacité enregistrée</td>
    </tr>
    ';
}

$output .= '</table>';

echo $output;

?>