<?php

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
// les deux point sont pour amener vers le ROOT folder
require '../../includes/init.php';

$conn = require '../../includes/db.php';

//déclaration de la requête SQL
$sql = "SELECT * FROM port";
//puis on requête avec la méthode query() 
$sql = $conn->query($sql);

//test du retour (boolean)
if ($sql === false) {
    var_dump($conn->errorInfo());
} else {
    //fetch le résultat sous forme de tableau associatif
    $les_ports = $sql->fetchAll(PDO::FETCH_ASSOC);
}

//création de l'output
$output = '
<table class="table table-striped table-bordered">
    <tr>
        <th>Id</th>
        <th>Nom du port</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
';

$tot_ports = $sql->rowCount();
//test si le résultat est vide
if ($tot_ports > 0) {
    //on boucle sur tableau associatif renvoyé par la BDD
    foreach ($les_ports as $port) {
        // on concaténe l'output
        $output .= '
        <tr>
            <td>' .$port["id_port"]. '</td>
            <td>' .$port["nom_port"]. '</td>
            
            <td>
                <button id="' .$port["id_port"]. '"
                        type="button"
                        name="edit"
                        class="btn btn-primary btn-xs edit_port"> MODIFIER
                </button>
            </td>

            <td>
                <button id="' .$port["id_port"]. '"
                        type="button"
                        name="delete"
                        class="btn btn-danger btn-xs delete_port"> SUPPRIMER
                </button>
            </td>
        </tr>
        ';
    }
} else {
    $output .= '
    <tr>
        <td colspan="4" align="center">Pas de port enregistré</td>
    </tr>
    ';
}

$output .= '</table>';

echo $output;

?>