<?php

/**
 * Classe DATABASE
 *
 *  connecte à la base de données en production ==> along phpmyadmin
 */

class Database
{
    /**
     * Attributs d'un objet DATABASE
     *
     * @var string => Hostname,
     * @var string => Database name,
     * @var string => Username,
     * @var string => Password,
     */
    protected $db_host;
    protected $db_name;
    protected $db_user;
    protected $db_pass;


    /**
     * Constructeur de la classe DATABASE
     *
     * @param string => Hostname,
     * @param string => Database Name,
     * @param string => Username,
     * @param string => Password,
     */
     public function __construct($host, $name, $user, $pass)
     {
        $this->db_host = $host;
        $this->db_name = $name;
        $this->db_user = $user;
        $this->db_pass = $pass;
     }


     /**
      * Donne la connexion à la DATABASE
      *
      * @return PDO object => Connexion au serveur de la DATABASE
      */
      public function getConn()
      {
          // $db_host = 'localhost';
          // $db_name = 'marie_team_bdd';
          // $db_user = 'marius';
          // $db_pass = 'hY92RYx8fYDn17D1';

          // DSN string qui permet de se connecter en utilisant PDO
          $dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . ';charset=utf8';

          // Exception handler de connexion à la DATABASE
          try {
              $db = new PDO($dsn, $this->db_user, $this->db_pass);
              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              return $db;

          } catch (PDOException $e) {
              echo $e->getMessage();
              exit;
          }

          // // on crée l'objet PDO en même temps qu'on le retourne
          // return new PDO($dsn, $db_user, $db_pass)
      }
}
 ?>
