<?php

require '../../includes/init.php';

$conn = require '../../includes/db.php';

if(isset($_POST["action_php"]))
{
    if($_POST["action_php"] == "get_all_trajet")
    {

        $sql = "SELECT liaison.code_liaison, liaison.distance,
                    sectnom.nom_secteur AS 'nom_secteur_concerne',
                    portarr.nom_port AS 'nom_port_arrivee', 
                    portdep.nom_port AS 'nom_port_depart'
                FROM liaison
                    INNER JOIN secteur sectnom
                ON liaison.id_secteur_concerne = sectnom.id_secteur
                    INNER JOIN port portarr
                ON liaison.id_port_arrivee = portarr.id_port
                    INNER JOIN port portdep
                ON liaison.id_port_depart = portdep.id_port ";

        $sql = $conn->query($sql);

        if ($sql === false) {
        var_dump($conn->errorInfo());
        } else {
        $les_liaisons = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        $output = '
        <table class="table table-striped table-bordered">
        <tr>
        <th>Secteur</th>
        <th>Code</th>
        <th>Distance</th>
        <th>Départ</th>
        <th>Arrivée</th>
        <th>Tarifs</th>
        </tr>
        ';

        $tot_liaisons = $sql->rowCount();

        if ($tot_liaisons > 0) {
            foreach ($les_liaisons as $liaison) {

                $output .= '
                    <tr>
                    <td>' .$liaison["nom_secteur_concerne"]. '</td>
                    <td>' .$liaison["code_liaison"]. '</td>
                    <td>' .$liaison["distance"]. '</td>
                    <td>' .$liaison["nom_port_depart"]. '</td>
                    <td>' .$liaison["nom_port_arrivee"]. '</td>

                    <td>
                    <button id="' .$liaison["code_liaison"]. '"
                            type="button"
                            name="edit"
                            class="btn btn-primary btn-xs get_tarifs"> Tarifs
                    </button>
                    </td>
                </tr>
                ';
            }
        } else {
        $output .= '
        <tr>
            <td colspan="6" align="center">Pas de liaison enregistrée</td>
        </tr>
        ';
        }

        $output .= '</table>';

        echo $output;
    }

    if($_POST["action_php"] == "get_one_tarif")
    {

        $sql = "SELECT liaison.code_liaison, liaison.distance,
                    sectnom.nom_secteur AS 'nom_secteur_concerne',
                    portarr.nom_port AS 'nom_port_arrivee', 
                    portdep.nom_port AS 'nom_port_depart'
                FROM liaison
                    INNER JOIN secteur sectnom
                ON liaison.id_secteur_concerne = sectnom.id_secteur
                    INNER JOIN port portarr
                ON liaison.id_port_arrivee = portarr.id_port
                    INNER JOIN port portdep
                ON liaison.id_port_depart = portdep.id_port ";

        $sql = $conn->query($sql);

        if ($sql === false) {
        var_dump($conn->errorInfo());
        } else {
        $les_liaisons = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        $output = '
        <table class="table table-striped table-bordered">
        <tr>
        <th>Secteur</th>
        <th>Code</th>
        <th>Distance</th>
        <th>Départ</th>
        <th>Arrivée</th>
        <th>Tarifs</th>
        </tr>
        ';

        $tot_liaisons = $sql->rowCount();

        if ($tot_liaisons > 0) {
            foreach ($les_liaisons as $liaison) {

                $output .= '
                    <tr>
                    <td>' .$liaison["nom_secteur_concerne"]. '</td>
                    <td>' .$liaison["code_liaison"]. '</td>
                    <td>' .$liaison["distance"]. '</td>
                    <td>' .$liaison["nom_port_depart"]. '</td>
                    <td>' .$liaison["nom_port_arrivee"]. '</td>

                    <td>
                    <button id="' .$liaison["code_liaison"]. '"
                            type="button"
                            name="edit"
                            class="btn btn-primary btn-xs get_tarifs"> Tarifs
                    </button>
                    </td>
                </tr>
                ';
            }
        } else {
        $output .= '
        <tr>
            <td colspan="6" align="center">Pas de liaison enregistrée</td>
        </tr>
        ';
        }

        $output .= '</table>';

        echo $output;
    }

}

?>