<?php
require_once('bdd/bdd_log.php');

class Form_reservation
{
    public $id;
    public $titre;
    public $description;
    public $debut;
    public $fin;
    public $bdd;


    public function __construct($id, $titre, $description, $debut, $fin)
    {
        $this->bdd = Database::connexion_db();
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->debut = $debut;
        $this->fin = $fin;
    }

    public function reserve($titre, $description, $debut, $fin, $id)
    {

      

        $req = $this->bdd->prepare("INSERT INTO reservations (titre, description, debut, fin) VALUES (:titre, :description, :debut, :fin)");
        $req->bindValue(':titre', $titre);
        $req->bindValue(':description', $description);
        $req->bindValue(':debut', $debut);
        $req->bindValue(':fin', $fin);
        $req->execute();
        return $req;
    }
}
