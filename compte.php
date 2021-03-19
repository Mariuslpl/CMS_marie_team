<?php 

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
require 'includes/init.php';

//Varibale qui récupére la connexion à la DATABASE
$conn = require 'includes/db.php';

if(isset($_SESSION["id"]) && isset($_SESSION["user_name"])) {
    $test_id = $_SESSION["id"];
    $test_username = $_SESSION["user_name"];
    $test_nom = $_SESSION["nom"];
    $test_prenom = $_SESSION["prenom"];
    $test_adresse = $_SESSION["adresse"];
    $test_cp = $_SESSION["cp"];
    $test_ville = $_SESSION["ville"];
    
    $sql = " SELECT reservation.nom,
                    reservation.adresse,
                    trav.num_traversee AS num_trav,
                    liai.code_liaison AS cde_liai,
                    p.nom_port AS nom_port_dep,
                    pr.nom_port AS nom_port_arr
                FROM reservation
                    INNER JOIN traversee trav
                    ON reservation.num_traversee_reserve = trav.num_traversee
                    INNER JOIN liaison liai
                    ON trav.code_liaison_realise = liai.code_liaison
                    INNER JOIN port p
                    ON liai.id_port_depart = p.id_port
                    INNER JOIN port pr
                    ON liai.id_port_arrivee = pr.id_port
                WHERE reservation.id_user = $test_id";

    $sql = $conn->query($sql);

    if ($sql === false) {
        var_dump($conn->errorInfo());
    } else {
        $les_resa_par_id = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


        
    //création de l'output
    $output = '
    <table class="table table-striped table-bordered">
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Num traversée</th>
            <th>Code liaison</th>
            <th>Départ</th>
            <th>Arrivée</th>
        </tr>
    ';

    $tot_resa = $sql->rowCount();
    //test si le résultat est vide
    if ($tot_resa > 0) {
        //on boucle sur tableau associatif renvoyé par la BDD
        foreach ($les_resa_par_id as $resa) {
            // on concaténe l'output
            $output .= '
            <tr>
                <td>' .$resa["nom"]. '</td>
                <td>' .$resa["adresse"]. '</td>
                <td>' .$resa["num_trav"]. '</td>
                <td>' .$resa["cde_liai"]. '</td>
                <td>' .$resa["nom_port_dep"]. '</td>
                <td>' .$resa["nom_port_arr"]. '</td>  
            </tr>
            ';
        }
    } else {
        $output .= '
        <tr>
            <td colspan="6" align="center">Pas de réservation pour ce compte</td>
        </tr>
        ';
    }

    $output .= '</table>';
}
?>


<!-- REQUIRE DU HEADER -->
 <?php require 'includes/header.php' ?>


<?php if (!empty($test_id)): ?>
    <h1>Bienvenu <?= $test_username ?> sur votre page de compte</h1>
<?php endif; ?>

<h3>Information du compte</h3>
<h6>NOM : <?= $test_nom ?></h6>
<h6>PRENOM : <?= $test_prenom ?></h6>
<h6>ADRESSE : <?= $test_adresse ?></h6>
<h6>CODE POSTAL : <?= $test_cp ?></h6>
<h6>VILLE : <?= $test_ville ?></h6>

<div>
    <h3>Récapitulatif de vos réservations</h3>
    <?= $output ?>
</div>
<!-- REQUIRE DU FOOTER -->
<?php require 'includes/footer.php' ?>
