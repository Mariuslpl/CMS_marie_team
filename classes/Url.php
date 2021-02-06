<?php

/**
 * Classe URL
 *
 * Méthodes de redirection entre différentes URL 
 */
class Url
{
    /**
     * Redirige à une autre URL sur le même site
     *
     * @param string => Chemin vers lequel rediriger
     *
     * @return void
     */
    public static function redirect($path)
    {
        // façon standart de tester si le serveur utilise HTTP ou HTTPS
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
            $protocol = 'https';
        } else {
            $protocol = 'http';
        }

        // on peut ainsi rediriger vers une URL absolue           ici le chemin
        header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . $path);
        exit;
    }
}