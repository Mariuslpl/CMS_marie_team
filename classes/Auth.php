<?php

/**
 * Classe AUTH
 * 
 * Gére le login et logout 
 */
class Auth
{
    /**
     * Retourne le statut d'autehentification utilisateur
     *
     * @return boolean True si l'user est loggé, False sinon
     */
    public static function estConnecte()
    {
        return isset($_SESSION['est_connecte']) && $_SESSION['est_connecte'];
    }


    /**
     * Retourne le statut d'autehentification ADMIN
     *
     * @return boolean True si l'admin est loggé, False sinon
     */
    public static function estConnecteAdmin()
    {
        return isset($_SESSION['est_connecte_admin']) && $_SESSION['est_connecte_admin'];
    }


    /**
     * login ADMIN en utilisant la session
     *
     * @return void
     */
    public static function loginAdmin()
    {
        // appel de la fonction gi génére un nouvel ID de session
        // (mais maintient la donnée) ==> prevent from CROSS attacks
        session_regenerate_id(true);
        $_SESSION['est_connecte_admin'] = true;
    }

    /**
     * login UTILISATEUR en utilisant la session
     *
     * @return void
     */
    public static function login()
    {
        session_regenerate_id(true);
        $_SESSION['est_connecte'] = true;
    }

    /**
     * Logout et destruction de session
     * 
     * @return void
     */
    public static function logout()
    {
        //initie les variables de la SESSION à vide
        $_SESSION = [];
        
        // efface le cookie de session.
        // Note : cela détruira la session et pas seulement les données de session !
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        // pour détruire toute les données de la session au logout; MAIS code up necessaire
        session_destroy();

    }
}