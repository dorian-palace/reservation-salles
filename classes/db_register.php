<?php
session_start();
require_once 'bdd_log.php';

class Register
{
    //proprietés

    private $id;
    public $login;
    public $password;

    function __construct()
    {
        // connexion a la bdd
        $db = new Dblog();
    }

    public function UserRegister($login, $password)
    {
        //inscription utilisateurs

        $password = password_hash($password, PASSWORD_BCRYPT);


        $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $register = $bdd->prepare("INSERT INTO utilisateurs (login, password) VALUES (:login, :password)");

        $register->bindValue(':login', $login, PDO::PARAM_STR);
        $register->bindValue(':password', $password, PDO::PARAM_STR);
        //PDO::PARAM_STR (int) Représente les types de données CHAR, VARCHAR ou les autres types de données sous forme de chaîne de caractères SQL.
        $register->execute();

        return $register;
    }
    public function Login($login)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', 'root');

        $result = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $result->bindValue(':login', $login, PDO::PARAM_STR);
        $user_data = $result->fetch();
        $etat = $result->rowCount();

        if ($etat == 1) {
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user_data['id'];
            return true;
        } else {
            return false;
        }
    }
    public function UserExist($login)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', 'root');
        $sql = "SELECT COUNT(login) AS num FROM utilisateurs WHERE login = :login";
        $stmt = $bdd->prepare($sql);
        $stmt->bindValue(':login', $login);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row > 0) {
            return true;
        } else {
            return false;
        }
    }
}
