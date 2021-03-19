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
    public $id;
    public $username;
    public $password;
    /**
    * Attribut d'utilisateur
    *
    *
    */
    public $nom;
    public $prenom;
    public $adresse;
    public $cp;
    public $ville;


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
             $_SESSION["id"] = $user->id;
             $_SESSION["user_name"] = $user->username;
             return password_verify($password, $user->password);
         }
     } 

    /**
      * Authentifie un UTILISATEUR avec username et password
      *
      * @param object => Un objet DATABASE
      * @param string => username
      * @param string => password
      *
      * @return boolean True si ses identifiants correct, Null sinon
      */
      public static function authentifie($conn, $username, $password)
      {
        $sql = "SELECT *
                FROM user
                WHERE username = :username";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

        $stmt->execute();

        if ($user = $stmt->fetch()) {
            $_SESSION["id"] = $user->id;
            $_SESSION["user_name"] = $user->username;
            $_SESSION["nom"] = $user->nom;
            $_SESSION["prenom"] = $user->prenom;
            $_SESSION["adresse"] = $user->adresse;
            $_SESSION["cp"] = $user->cp;
            $_SESSION["ville"] = $user->ville;
            return password_verify($password, $user->password);
        }
      } 
 
    /**
     * Ajout d'un nouvel utilisateur
     *
     * @param object Connexion à la BDD
     *
     *
     */
    public function creerUser($conn)
    {
      $sql = "INSERT INTO user (username, password, nom, prenom, adresse, cp, ville)
              VALUES (:username, :password, :nom, :prenom, :adresse, :cp, :ville);";

      $stmt = $conn->prepare($sql);

      $stmt->bindValue(':username', $this->username, PDO::PARAM_STR);
      $stmt->bindValue(':password', $this->password, PDO::PARAM_STR);
      $stmt->bindValue(':nom', $this->nom, PDO::PARAM_STR);
      $stmt->bindValue(':prenom', $this->prenom, PDO::PARAM_STR);
      $stmt->bindValue(':adresse', $this->adresse, PDO::PARAM_STR);
      $stmt->bindValue(':cp', $this->cp, PDO::PARAM_INT);
      $stmt->bindValue(':ville', $this->ville, PDO::PARAM_STR);

      if ($stmt->execute()) {
          return true;
      } else {
          return false;
      }
    }
 }
?>