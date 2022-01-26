<?php
require_once('bdd/bdd_log.php');

class Form_reservation
{

    public function __construct( $titre, $description, $debut, $fin, $id)
    {
        $this->bdd = Database::connexion_db();
       
    }

    public function envent_exist($debut)
    {
        $req = $this->bdd->prepare("SELECT debut FROM reservations where debut = ? ");
        $req->execute(array($debut));
        $result = $req->rowCount();
        if ($result == 0) {
            return true;
        } else {
            return false;
        }

    }

    public function reserve($titre, $description, $debut, $fin, $id_utilisateur)
    {
        $req = $this->bdd->prepare("INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES (:titre, :description, :debut, :fin, :id_utilisateur)");
        $req->bindValue(':titre', $titre);
        $req->bindValue(':description', $description);
        $req->bindValue(':debut', $debut);
        $req->bindValue(':fin', $fin);
        $req->bindValue(':id_utilisateur', $id_utilisateur);
        $req->execute();
        return $req;
    }
}
