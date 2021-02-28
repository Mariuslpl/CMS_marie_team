<?php

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
// les deux point sont pour amener vers le ROOT folder
require '../../includes/init.php';

$conn = require '../../includes/db.php';

//déclaration de la requête SQL
$sql = "SELECT enregistre.num_reservation_enregistre, enregistre.num_type_enregistre, enregistre.quantite,
               resaenr.nom AS 'nom_resa_enr',
               typenr.libelle_type AS 'lib_typ_enr'
        FROM enregistre
            INNER JOIN reservation resaenr
        ON enregistre.num_reservation_enregistre = resaenr.num_reservation
            INNER JOIN type typenr
        ON enregistre.num_type_enregistre = typenr.num_type";


//puis on requête avec la méthode query() 
$sql = $conn->query($sql);

//test du retour (boolean)
if ($sql === false) {
    var_dump($conn->errorInfo());
} else {
    //fetch le résultat sous forme de tableau associatif
    $les_enregistrements = $sql->fetchAll(PDO::FETCH_ASSOC);
}

//création de l'output
$output = '
<table class="table table-striped table-bordered">
    <tr>
        <th>Num / Nom réservation</th>
        <th>Type</th>
        <th>Libellé</th>
        <th>Quantité</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
';

$tot_enregistrements = $sql->rowCount();
//test si le résultat est vide
if ($tot_enregistrements > 0) {
    //on boucle sur tableau associatif renvoyé par la BDD
    foreach ($les_enregistrements as $enregistrement) {
        // on concaténe l'output
        $output .= '
        <tr>
            <td>' .$enregistrement["num_reservation_enregistre"]. ' - ' .$enregistrement["nom_resa_enr"]. '</td>
            <td>' .$enregistrement["num_type_enregistre"]. '</td>
            <td>' .$enregistrement["lib_typ_enr"]. '</td>
            <td>' .$enregistrement["quantite"]. '</td>
            
            <td>
                <button id="' .$enregistrement["num_reservation_enregistre"]. '"
                        type_enr="' .$enregistrement["num_type_enregistre"]. '"
                        quantite="' .$enregistrement["quantite"]. '"
                        type="button"
                        name="edit"
                        class="btn btn-primary btn-xs edit_enregistre"> MODIFIER
                </button>
            </td>

            <td>
                <button id="' .$enregistrement["num_reservation_enregistre"]. '"
                        type_enr="' .$enregistrement["num_type_enregistre"]. '"
                        type="button"
                        name="delete"
                        class="btn btn-danger btn-xs delete_enregistre"> SUPPRIMER
                </button>
            </td>
        </tr>
        ';
    }
} else {
    $output .= '
    <tr>
        <td colspan="6" align="center">Pas d\'enregistrements</td>
    </tr>
    ';
}

$output .= '</table>';

echo $output;

?>