<?php
session_start();
include 'bdd_log.php';

class User
{


    public function Inscription($login, $password)
    {
        //inscription utilisateurs

        //Hash password
        $password = password_hash($password, PASSWORD_BCRYPT);

        //Requete SQL
        $register = Database::connexion_db()->prepare("INSERT INTO utilisateurs (login, password) VALUES (:login, :password)");


        $register->bindValue(':login', $login, PDO::PARAM_STR);
        $register->bindValue(':password', $password, PDO::PARAM_STR);
        //PDO::PARAM_STR (int) Représente les types de données CHAR, VARCHAR ou les autres types de données sous forme de chaîne de caractères SQL.
        $register->execute();

        return $register;
    }


    public function Login_exist($login)
    {
        //Login déjà pris

        $login = $_POST['login'];
        //Database::connexion_db()-> appel la bdd pour la requete 
        $result = Database::connexion_db()->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $result->execute(array($login));
        $user_data = $result->fetch();
        if ($user_data) {
            return true; // si l'utilisateurs est déjà pris return true
        }
    }
}
