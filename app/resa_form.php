<?php
require_once('bdd/bdd_log.php');

class Form_reservation
{
    public $id;
    public $id_utilisateur;
    public $titre;
    public $description;
    public $debut;
    public $fin;
    public $bdd;

    public function __construct($id, $titre, $description, $debut, $fin)
    {
        $this->bdd = Database::connexion_db();
        $this->id = $id;
        // $this->id_utilisateur = $id_utilisateur;
        $this->titre = $titre;
        $this->description = $description;
        $this->debut = $debut;
        $this->fin = $fin;
    }

    public function reserve()
    {
        $req = $this->bdd->prepare("INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES (:titre, :description, :debut, :fin, :id_utilisateur)");
        $req->bindValue(':titre', $this->titre);
        $req->bindValue(':description', $this->description);
        $req->bindValue(':debut', $this->debut);
        $req->bindValue(':fin', $this->fin);
        $req->bindValue(':id_utilisateur', $this->id);
        $req->execute();
        return $req;
    }
}
