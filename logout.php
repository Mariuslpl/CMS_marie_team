<?php

//inclus du fichier d'initialisation du spl auto loader pour les accéder aux fichiers de classes
require 'includes/init.php';

//appel de la méthode logout() de la classe Auth
Auth::logout();

//on redirige vers l'index du ROOT 
Url::redirect('/');

?>