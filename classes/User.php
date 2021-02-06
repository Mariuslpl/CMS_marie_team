<?php

/**
 * Classe USER
 * 
 * Une personne qui peux se log au site
 */

 class User
 {
    /**
     * Attributs d'un objet USER
     * 
     * @var int => Id d'utilisateur (inacessible)
     * @var string => Username string
     * @var string => Password (Hash)
     */
    protected $id;
    protected $username;
    protected $password;


    /**
      * Authentifie un ADMIN avec username et password
      *
      * @param object => Un objet DATABASE
      * @param string => username
      * @param string => password
      *
      * @return boolean True si ses identifiants correct, Null sinon
      */
     public static function authentifieAdmin($conn, $username, $password)
     {
         //sql qui va interroger la présence de l'utiisateur dans la base
         $sql = "SELECT * FROM admin WHERE username = :username";

         // le prepare statment empêche les injections sql
         $stmt = $conn->prepare($sql);

         // on binde la valeur de username ==> placeholder
         $stmt->bindValue(':username', $username, PDO::PARAM_STR);

         //retourne un objet de la classe USER
         $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

         // execution du sql
         $stmt->execute();

         //on verifie le password en retour (hash)
         if ($user = $stmt->fetch()) {
             return password_verify($password, $user->password);
         }
     } 

 }
?>