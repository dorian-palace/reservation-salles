<?php
require('bdd_log.php');

class Login
{
    private $password_verify;
    private $login;
    private $password;

    function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    public static function Connexion($login, $password)
    {

        $login = $_POST['login'];
        $req = "SELECT * FROM utilisateurs WHERE login = :login";
        $req_prepare = Database::connexion_db()->prepare($req);
        $req_prepare->execute(array(
            ":login" => "$login"
        ));
        $resultat = $req_prepare->fetch();

        return $resultat;
    }
}
