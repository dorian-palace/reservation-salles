<?php
require_once('bdd_log.php');

class User
{
    public $id;
    public $login;
    public $password;
    public $bdd;

    public function __construct()
    {
        $this->bdd = Database::connexion_db();
        if (isset($_SESSION['id'])) {
            $this->id = $_SESSION['id'];
            $req = $this->bdd->prepare("SELECT * FROM utilisateurs where id = ?");
            $req->execute(array($this->id));
            $result = $req->fetch();
            $this->login = $result['login'];
            $this->password = $result['password'];
        }
    }


    public function Profil_update($login)
    {
        $new_login = htmlspecialchars(trim($_POST['newlogin']));
        $req = $this->bdd->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
        $req->execute(array($new_login, $this->id));
        $this->login = $new_login;
        return $req;
    }

    public function Password_update($id, $password)
    {   

        $this->password = $password;
        $password = password_hash($password, PASSWORD_BCRYPT);
        $req = $this->bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
        $req->execute(array($password, $id));
        return $req;
    }

    public function Inscription($login, $password)
    {
        //inscription utilisateurs

        //Hash password
        $password = password_hash($password, PASSWORD_BCRYPT);

        //Requete SQL
        $register = $this->bdd->prepare("INSERT INTO utilisateurs (login, password) VALUES (:login, :password)");


        $register->bindValue(':login', $login, PDO::PARAM_STR);
        $register->bindValue(':password', $password, PDO::PARAM_STR);
        //PDO::PARAM_STR (int) Représente les types de données CHAR, VARCHAR ou les autres types de données sous forme de chaîne de caractères SQL.
        $register->execute();
        $this->password = $password;
        $this->login = $login;
        return $register;
    }


    public function Login_exist($login)
    {
        //Login déjà pris

        $login = $_POST['login'];
        //Database::connexion_db()-> appel la bdd pour la requete 
        $result = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $result->execute(array($login));
        $this->login = $login;
        $user_data = $result->rowCount();
        if ($user_data == 1) {
            return false; // si l'utilisateurs est déjà pris return true
        } else {
            return true;
        }
    }
}
