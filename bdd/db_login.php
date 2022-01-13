<?php
include('bdd_log.php');

class Login
{
    /*    private $id;
    public $login;
    public $password;
    protected $db; */

    /*    function __construct()
    {
        $this->db = \Database::connexion_db();
    } */

    public static function Connexion($login/* , $password */)
    {

        $login = $_POST['login'];
        /*  $password = $_POST['password']; */
        $req = "SELECT * FROM utilisateurs WHERE login = :login";
        $req_prepare = Database::connexion_db()->prepare($req);
        $req_prepare->execute(array(
            ":login" => "$login"
        ));
        $resultat = $req_prepare->fetch();
        return $resultat;
        $_SESSION['login'] = $resultat['login'];
        $_SESSION['id'] = $resultat['id'];

        if (password_verify($_POST['password'], $resultat['password'])) {

            $msg2 =  'vous êtes connecté';
            header("refresh:2;url=index.php");
        } else {

            $msg =  'identifiant ou mot de pass incorrect';
        }
    }
}
