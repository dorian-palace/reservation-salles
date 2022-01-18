<?php
require_once('bdd/bdd_log.php');

class Event{
    public $id;
    public $bdd;
    public $login;
    public $titre;
    public $description;
    public $debut;
    public $fin;


    public function __construct($id, $login, $titre, $description, $debut, $fin)
    {
        $this->bdd = Database::connexion_db();
        $this->id = $id;
        $this->login = $login;
        $this->titre = $titre;
        $this->description = $description;
        $this->debut = $debut;
        $this->fin = $fin;
    }

    public function user_event(){

        $res = $this->bdd->prepare("SELECT * FROM reservations");
    }
}