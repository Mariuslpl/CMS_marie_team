<!DOCTYPE html>
<html>
    <head>
        <title>Marie Team Resort</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
        <!-- ajouter ici lien pour mes feuilles styles -->
        <!-- <link rel="stylesheet" href="/css/styles.css"> -->
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- font et logo -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>

        <link rel="stylesheet" href="/styles.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <!-- <link rel="stylesheet" href="/css/jquery-ui.css"> -->
    </head>

    <body>
        <div class="container">
            <div class="navbar" style="margin-bottom:50px; margin-top:20px">
                    <?php if (Auth::estConnecteAdmin()): ?>
                        <a href="/admin/index.php"><i class="fa fa-fw fa-unlock "></i> ADMIN</a>
                        <a href="/index.php"><i class="fa fa-fw fa-home"></i> Acceuil</a>
                        <a href="/reservation.php"><i class="fa fa-fw fa-ship"></i> Réservations</a>
                        <a href="/trajet.php"><i class="fa fa-fw fa-map-marker get_les_trajets"></i> Trajets</a>
                        <a href="/logout.php"><i class="fa fa-fw fa-sign-out"></i> Se déconnecter.</a>
                    <?php elseif(Auth::estConnecte()): ?>
                        <a href="/index.php"><i class="fa fa-fw fa-home"></i> Acceuil</a>
                        <a href="/reservation.php"><i class="fa fa-fw fa-ship"></i> Réservations</a>
                        <a href="/trajet.php"><i class="fa fa-fw fa-map-marker get_les_trajets"></i> Trajets</a>
                        <a href="/compte.php"><i class="fa fa-fw fa-address-book get_infos_compte"></i> Mon compte</a>
                        <a href="/logout.php"><i class="fa fa-fw fa-sign-out"></i> Se déconnecter.</a>
                    <?php else: ?>
                        <a href="/index.php"><i class="fa fa-fw fa-home"></i> Acceuil</a>
                        <a href="/login.php"><i class="fa fa-fw fa-sign-in"></i> Se Connecter.</a>
                    <?php endif; ?>
                </div>

            <main>
