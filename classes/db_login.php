<?php
session_start();
include('bdd_log.php');

class Login
{
    private $id;
    public $login;
    public $password;
    protected $db;

    function __construct()
    {
        $this->db = \Dblog::connexion_db();
    }

    public function Connexion($login)
    {

        $login = $_POST['login'];
        $connect = $this->db->prepare("SELECT * FROM utilisateurs WHERE login = '$login' ");
        $connect->execute(array($login));
        $result_log = $connect->fetch();

        return $result_log;
    }
}
