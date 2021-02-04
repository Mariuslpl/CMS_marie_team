<?php

/**
 * Initialisation des fichiers de classes du projets
 *
 * Enregistre un autoloader pour les classes ou fichiers stockés dans les dossier "INCLUDES"
 * Ensuite;    commencer ou repprendre un session
 */
spl_autoload_register(function ($class)
{
    require dirname(__DIR__) . "/classes/{$class}.php";
});

// commence ou poursuit la session existante
session_start();

 ?>
