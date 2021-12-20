<?php
class Dblog{
    function __construct()
    {
        require_once('bdd.php');
        $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles','root','root');
        if(!$bdd){
            die ("Connexion a la bdd impossible");
        }
        return $bdd;
    }
    public function Close(){
        $bdd = null;
    }
}